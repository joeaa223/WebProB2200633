<?php
// Start the session
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated'])) {
    // Redirect to the sign-up page or login page
    header("Location: signup.php");
    exit(); // Stop script execution
}

// Connect to your database
$servername = "localhost"; // Replace with your server name
$username = "username"; // Replace with your username
$password = "password"; // Replace with your password
$dbname = "your_database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user profile data
$user_id = 1; // Assuming user authentication is implemented and user ID is available
$sql_profile = "SELECT * FROM user_profiles WHERE id = $user_id";
$result_profile = $conn->query($sql_profile);

if ($result_profile->num_rows > 0) {
    $row_profile = $result_profile->fetch_assoc();
    // Retrieve user profile data
    $username = $row_profile["username"];
    $contact_number = $row_profile["contact_number"];
    $email = $row_profile["email"];
    $commuting_methods = $row_profile["commuting_methods"];
    $energy_sources = $row_profile["energy_sources"];
    $dietary_preferences = $row_profile["dietary_preferences"];
} else {
    echo "No user profile found.";
}

// Fetch recent activity data
$sql_activity = "SELECT * FROM activity_log WHERE user_id = $user_id ORDER BY timestamp DESC LIMIT 1";
$result_activity = $conn->query($sql_activity);

if ($result_activity->num_rows > 0) {
    $row_activity = $result_activity->fetch_assoc();
    // Retrieve recent activity data
    $activity_message = $row_activity["message"];
} else {
    echo "No recent activity found.";
}

// Close the database connection
$conn->close();
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
                <li><a href="index.php">Home</a></li>
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
        <p>Your recent activity: <?php echo $activity_message; ?></p>
        <p>Based on your profile and recent activity, your carbon footprint is being calculated...</p>

        <!-- Additional content or form for displaying the calculated carbon footprint -->
        <div class="dashboard-container">
            <?php
            // Check if there is sufficient data available
            $sufficient_data = true; // Assuming sufficient data by default

            // Check if there are recent activity data
            if ($result_activity->num_rows == 0) {
                $sufficient_data = false;
                echo "<p class='error-message'>No recent activity found. Please update your activity log.</p>";
            }

            // Check if there is user profile data
            if (empty($username)) {
                $sufficient_data = false;
                echo "<p class='error-message'>No user profile found. Please update your profile.</p>";
            }

            // Render the dashboard content if there is sufficient data
            if ($sufficient_data) {
                // Render carbon footprint overview and emissions breakdown
                // ...
            }
            ?>
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
            labels: ["Transport", "Energy", "Diet"],
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
