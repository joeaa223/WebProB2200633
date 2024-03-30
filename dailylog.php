<?php
// Start the session
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated'])) {
    // Redirect to the sign-up page or login page
    header("Location: signup.php");
    exit(); // Stop script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Log</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can link your stylesheet here -->
</head>
<body>
    <header>
        <h1>Daily Log</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="editprofile.php">Edit Profile</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Select Your Choices</h2>
        <form action="submitlog.php" method="post">
            <!-- Transport Type Selection -->
            <label for="transport">Transport Type:</label><br>
            <select id="transport" name="transport">
                <option value="car">Car</option>
                <option value="bus">Bus</option>
                <option value="bicycle">Bicycle</option>
                <!-- Add more options as needed -->
            </select><br><br>
            
            <!-- Meal Type Selection -->
            <label for="meal">Meal Type:</label><br>
            <select id="meal" name="meal">
                <option value="vegetarian">Vegetarian</option>
                <option value="vegan">Vegan</option>
                <option value="omnivore">Omnivore</option>
                <!-- Add more options as needed -->
            </select><br><br>

            <!-- Energy Source Selection -->
            <label for="energy">Energy Source:</label><br>
            <select id="energy" name="energy">
                <option value="solar">Solar</option>
                <option value="wind">Wind</option>
                <option value="hydro">Hydro</option>
                <!-- Add more options as needed -->
            </select><br><br>

            <!-- New fields for consumption -->
            <label for="transport_consumption">Transport Consumption (in miles or units):</label><br>
            <input type="number" id="transport_consumption" name="transport_consumption" required><br><br>

            <label for="meal_consumption">Meal Consumption (in calories or units):</label><br>
            <input type="number" id="meal_consumption" name="meal_consumption" required><br><br>

            <label for="energy_consumption">Energy Consumption (in kWh or units):</label><br>
            <input type="number" id="energy_consumption" name="energy_consumption" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </section>
</body>
</html>
