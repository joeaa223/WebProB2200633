<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Content: Infographic</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<div id="video-container">
    <!-- Video background -->
    <video autoplay loop muted playsinline id="video-background">
        <source src="https://motionbgs.com/media/4254/foggy-forest.960x540.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<div class="content-overlay">
    <!-- Header section -->
    <header>
        <div class="container">
            <!-- Site title -->
            <h1 class="text-white">Education Content: Infographic</h1>
            <!-- Category buttons -->
            <div class="category-buttons mt-3">
                <a href="learn.php" class="btn btn-primary">Choose Another Category</a>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <main>
     <div class="container">
        <?php
        // Start the session if needed
        session_start();

        // Check for session messages
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        // Database connection and content retrieval
        $conn = mysqli_connect('localhost', 'root', '', 'hcs');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM tbl_content WHERE Content_type = 'infographic'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            die("Query failed: " . mysqli_error($conn));
        }

        $sn = 1;

        if (mysqli_num_rows($res) > 0) {
            echo '<div class="main-content mt-4">';
            echo '<div class="table-responsive" style="max-height: 400px; overflow-y: auto;">';
            echo '<table class="table table-striped">';
            echo '<thead class="thead-light">';
            echo '<tr>';
            echo '<th>Title</th>';
            echo '<th>Image</th>';
            echo '<th>Explore</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($res)) {
                $ContentID = $row['ContentID'];
                $Title = $row['Title'];
                $Image = $row['Image'];

                echo '<tr>';
                echo '<td>' . $Title . '</td>';
                echo '<td>';
                if (empty($Image)) {
                    echo "<div class='error'>Image not Added.</div>";
                } else {
                    echo '<img src="Image/' . $Image . '" alt="Image" width="100" height="100"><br>';
                }
                echo '</td>';
                echo '<td><a href="infographicFull.php?ContentID=' . $ContentID . '" class="btn btn-primary">Explore More</a></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "<div class='main-content mt-4'>";
            echo "<div class='error'>No Content Yet, No Worries, Come Back Later.</div>";
            echo "</div>";
        }

        mysqli_close($conn);
        ?>
    </div>
</main>


    <!-- Footer section -->
    <footer class="py-2">
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
</div>

<!-- Link to Bootstrap JS (optional, only if you need Bootstrap JavaScript features) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
