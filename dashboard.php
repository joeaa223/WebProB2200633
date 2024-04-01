<?php
// Start the session
session_start();

// Connect to your database
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user profile data
$user_id = 1; // Assuming user authentication is implemented and user ID is available
$sql_profile = "SELECT * FROM tbl_profile WHERE ID = $user_id";
$result_profile = $conn->query($sql_profile);

if ($result_profile->num_rows > 0) {
    $row_profile = $result_profile->fetch_assoc();
    // Retrieve user profile data
    $username = $row_profile["username"];
} else {
    echo "No user profile found.";
}

$activity_message = ""; // Initialize $activity_message to an empty string

// Fetch recent activity data
$currentDate = date("Y-m-d");

// SQL query with current date and user ID
$sql_activity = "SELECT * FROM daily_log WHERE Id = $user_id AND log_date = '$currentDate' ORDER BY log_date DESC LIMIT 1";

$result_activity = $conn->query($sql_activity);

if ($result_activity->num_rows > 0) {
    $row_activity = $result_activity->fetch_assoc();
    // Retrieve recent activity data
    $activity_message = $row_activity["message"];
} else {
    echo "No recent activity found for user ID: $user_id on $currentDate.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Dashboard</title>
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Carbon Footprint Dashboard</h1>
        <nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="dailylog.php">Daily Log</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="editprofile.php">Edit Profile</a></li>
                <li><a href="history.php">History</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Calculate Your Carbon Footprint</h2>
        <p>Welcome, <?php echo $username; ?>!</p>
        <?php if (!empty($activity_message)) : ?>
            <p>Your recent activity: <?php echo $activity_message; ?></p>
        <?php endif; ?>
        <p>Based on your profile and recent activity, your carbon footprint is being calculated...</p>

        <!-- Additional content or form for displaying the calculated carbon footprint -->
        <div class="dashboard-container">
            <!-- Carbon Footprint Overview -->
            <h2>Carbon Footprint Overview</h2>
            <div class="carbon-footprint-chart">
                <canvas id="carbonFootprintChart"></canvas>
            </div>

            <!-- Emissions Breakdown -->
            <h2>Emissions Breakdown</h2>
            <div class="emissions-breakdown">
                <div class="category">
                    <h3>Transportation</h3>
                    <p>Details about transportation emissions...</p>
                </div>
                <div class="category">
                    <h3>Energy</h3>
                    <p>Details about energy emissions...</p>
                </div>
                <div class="category">
                    <h3>Diet</h3>
                    <p>Details about diet emissions...</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Sample data for carbon footprint (replace with real-time data)
        var data = {
            labels: ["Transport", "Energy", "Meal"],
            datasets: [{
                label: "Carbon Footprint",
                data: [300, 200, 100], // Sample carbon footprint values for each category
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Configure chart options
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Create and render the chart
        var ctx = document.getElementById('carbonFootprintChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>
