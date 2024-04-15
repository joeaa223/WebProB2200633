<?php
// Start the session
session_start();

// Check if the user is authenticated
//if (!isset($_SESSION['authenticated'])) {
    // Redirect to the sign-up page or login page
    //header("Location: signup.php");
    //exit(); // Stop script execution
//}

// Connect to your database
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transport = $_POST["transport"];
    $meal = $_POST["meal"];
    $energy = $_POST["energy"];
    $transport_consumption = $_POST["transport_consumption"];
    $meal_consumption = $_POST["meal_consumption"];
    $energy_consumption = $_POST["energy_consumption"];
    

    // Insert data into the database table
    $sql = "INSERT INTO daily_log (transport, meal, energy, transport_consumption, meal_consumption, energy_consumption) VALUES ('$transport', '$meal', '$energy', '$transport_consumption', '$meal_consumption', '$energy_consumption' )";

    if ($conn->query($sql) === TRUE) {
        // Record updated in the activity log
        $activity_message = "User selected: Transport - $transport, Meal - $meal, Energy - $energy, Transport consumption - $Transport_consumption, Meal consumption - $meal_consumption, Energy consumption - $energy_consumption ";
        $activity_sql = "INSERT INTO daily_log (message) VALUES ('$activity_message')";
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
