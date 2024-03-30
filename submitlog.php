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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transport = $_POST["transport"];
    $meal = $_POST["meal"];
    $energy = $_POST["energy"];

    // Insert data into the database table
    $sql = "INSERT INTO daily_log (transport, meal, energy) VALUES ('$transport', '$meal', '$energy')";

    if ($conn->query($sql) === TRUE) {
        // Record updated in the activity log
        $activity_message = "User selected: Transport - $transport, Meal - $meal, Energy - $energy";
        $activity_sql = "INSERT INTO activity_log (message) VALUES ('$activity_message')";
        $conn->query($activity_sql);

        // Close the database connection
        $conn->close();

        // Redirect back to the daily log page with a success message
        header("Location: dailylog.php?success=true");
        exit();
    } else {
        // Redirect back to the daily log page with an error message
        header("Location: dailylog.php?error=true");
        exit();
    }
}
?>
