<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to calculate average ratings
$avgQuery = 'SELECT AVG(q1) AS avg_q1, AVG(q2) AS avg_q2, AVG(q3) AS avg_q3, AVG(q4) AS avg_q4, AVG(q5) AS avg_q5 FROM tbl_survey';
$avgResult = $conn->query($avgQuery);
$avgRow = $avgResult->fetch_assoc();

// Query to fetch survey data
$surveyQuery = 'SELECT SurveyID, q1, q2, q3, q4, q5 FROM tbl_survey';
$surveyResult = $conn->query($surveyQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCS Survey Dashboard</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header, footer {
            background-color: transparent;
            padding: 10px 0;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .rounded-box {
            background-color: #ffffff; /* Background color */
            border-radius: 10px; /* Rounded corners */
            padding: 15px; /* Padding around content */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            margin-top: 20px; /* Spacing from above content */
        }

        header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .section-heading {
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .chart-container, .survey-table, .suggestions {
            background-color: #ffffff; /* Solid white background color */
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            color: #00000;
            text-align: center;
        }

        footer p {
            margin-bottom: 0;
        }

        .data-separator {
            border-top: 1px solid #ddd;
            margin-top: 20px;
            padding-top: 20px;
        }

        .font-background {
            background-color: #f8f9fa; /* Background color for font */
            padding: 20px; /* Padding around font content */
            border-radius: 10px; /* Rounded corners */
        }

        .font-style {
            font-family: 'Georgia', serif; /* Example of adding a different font */
            font-size: 18px; /* Example font size */
            color: #333333; /* Example font color */
        }

        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1000;
        }
    </style>
</head>
<body>
<video autoplay loop muted id="video-background">
    <source src="https://motionbgs.com/media/5026/abstract-white-triangles.960x540.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Survey Analytics</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="adminMenu.php">Back to Admin Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <h1 class="heading">Survey Results</h1>

    <!-- Average Scores Section -->
    <div class="section-heading">
    <h2>Average Scores</h2>
</div>
<div class="rounded-box">
    <div class="row">
        <div class="col-md-6">
            <p><strong>Question 1:</strong> <?php echo isset($avgRow['avg_q1']) ? round($avgRow['avg_q1'], 2) : 'N/A'; ?></p>
        </div>
        <div class="col-md-6">
            <p><strong>Question 2:</strong> <?php echo isset($avgRow['avg_q2']) ? round($avgRow['avg_q2'], 2) : 'N/A'; ?></p>
        </div>
        <div class="col-md-6">
            <p><strong>Question 3:</strong> <?php echo isset($avgRow['avg_q3']) ? round($avgRow['avg_q3'], 2) : 'N/A'; ?></p>
        </div>
        <div class="col-md-6">
            <p><strong>Question 4:</strong> <?php echo isset($avgRow['avg_q4']) ? round($avgRow['avg_q4'], 2) : 'N/A'; ?></p>
        </div>
        <div class="col-md-6">
            <p><strong>Question 5:</strong> <?php echo isset($avgRow['avg_q5']) ? round($avgRow['avg_q5'], 2) : 'N/A'; ?></p>
        </div>
    </div>
</div>
    <hr class="data-separator">

    <!-- Chart for Average Scores -->
    <div class="section-heading">
        <h2>Average Scores Chart</h2>
    </div>
    <div class="chart-container">
        <canvas id="averageChart"></canvas>
    </div>

    <!-- Survey Data Table Section -->
    <div class="section-heading">
        <h2>Survey Data</h2>
    </div>
    <div class="survey-table">
        <?php
        if ($surveyResult->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>SurveyID</th>';
            echo '<th>q1</th>';
            echo '<th>q2</th>';
            echo '<th>q3</th>';
            echo '<th>q4</th>';
            echo '<th>q5</th>';
            // Add more columns for additional items
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $surveyResult->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['SurveyID'] . '</td>';
                echo '<td>' . $row['q1'] . '</td>';
                echo '<td>' . $row['q2'] . '</td>';
                echo '<td>' . $row['q3'] . '</td>';
                echo '<td>' . $row['q4'] . '</td>';
                echo '<td>' . $row['q5'] . '</td>';
                // Add more columns for additional items
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p class="mt-4">No survey responses yet.</p>';
        }
        ?>
    </div>
    <hr class="data-separator">

    <!-- Survey Suggestions Section -->
    <div class="section-heading">
        <h2>Survey Suggestions</h2>
    </div>
    <div class="suggestions">
        <form method="POST">
            <label for="question">Select a Question:</label>
            <select name="question" id="question">
                <option value="q1" <?php if(isset($_POST['question']) && $_POST['question'] == 'q1') echo 'selected="selected"'; ?>>Question 1</option>
                <option value="q2" <?php if(isset($_POST['question']) && $_POST['question'] == 'q2') echo 'selected="selected"'; ?>>Question 2</option>
                <option value="q3" <?php if(isset($_POST['question']) && $_POST['question'] == 'q3') echo 'selected="selected"'; ?>>Question 3</option>
                <option value="q4" <?php if(isset($_POST['question']) && $_POST['question'] == 'q4') echo 'selected="selected"'; ?>>Question 4</option>
                <option value="q5" <?php if(isset($_POST['question']) && $_POST['question'] == 'q5') echo 'selected="selected"'; ?>>Question 5</option>
            </select>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $selectedQuestion = $_POST['question'];
                $conn = mysqli_connect('localhost', 'root', '', 'hcs');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $columnName = $selectedQuestion . "_suggestion";
                $sql = "SELECT $columnName FROM tbl_survey";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<h2>Suggestions for $selectedQuestion:</h2>";
                    while ($row = $result->fetch_assoc()) {
                        echo $row[$columnName] . "<br>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            }
        ?>
    </div>
</div>
<hr class="data-separator">

<script>
    // Chart.js Configuration
    var ctx = document.getElementById('averageChart').getContext('2d');
    var averageChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5'], // Add labels for additional items
            datasets: [{
                label: 'Average Score',
                data: [<?php echo isset($avgRow['avg_q1']) ? round($avgRow['avg_q1'], 2) : '0'; ?>,
                       <?php echo isset($avgRow['avg_q2']) ? round($avgRow['avg_q2'], 2) : '0'; ?>,
                       <?php echo isset($avgRow['avg_q3']) ? round($avgRow['avg_q3'], 2) : '0'; ?>,
                       <?php echo isset($avgRow['avg_q4']) ? round($avgRow['avg_q4'], 2) : '0'; ?>,
                       <?php echo isset($avgRow['avg_q5']) ? round($avgRow['avg_q5'], 2) : '0'; ?>,
                    ],
                backgroundColor: ['#4caf50', '#2196f3'], // Adjust colors for additional items
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5
                }
            }
        }
    });
</script>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h6 class="text-uppercase">About Us</h6>
                <p class="small">We aim to provide top-notch services and experiences for our users at HCS Survey.</p>
            </div>
            <div class="col-md-4">
                <h6 class="text-uppercase">Contact Us</h6>
                <ul class="list-unstyled">
                    <li><a href="https://www.instagram.com/hcssurvey/" target="_blank" class="text-light"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="https://twitter.com/hcssurvey" target="_blank" class="text-light"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="https://api.whatsapp.com/send?phone=123456789" target="_blank" class="text-light"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <!-- Additional contact information can be added here if needed -->
            </div>
        </div>
        <hr>
        <p class="text-center mb-0 small">&copy; 2024 HCS Survey</p>
    </div>
</footer>


<!-- Bootstrap JS and Popper.js CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

