<?php
// Check if signup was successful
session_start();
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $message = "Your profile has been successfully created. Thank you for signing up!";
} else {
    $message = "An error occurred during signup. Please try again later.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Created</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reduce Carbon Emissions</h1>
        <nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="dailylog.php">Daily Log</a></li>
                <li><a href="editprofile.php">Edit Profile</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Profile Created Successfully</h2>
        <p><?php echo $message; ?></p>
    </section>
    <footer>
        <p>&copy; 2024 Reduce Carbon Emissions</p>
    </footer>
</body>
</html>
