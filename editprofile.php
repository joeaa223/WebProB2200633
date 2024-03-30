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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reduce Carbon Emissions</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="dailylog.php">Daily Log</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="editprofile.php">Edit Profile</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Edit Profile</h2>
        <?php
        // Fetch user's existing profile information from the database
        // Perform database connection and query here
        // Example:
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "your_database_name";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Assuming user authentication is implemented and user ID is available
        $user_id = 1; // Replace with actual user ID

        $sql = "SELECT * FROM user_profiles WHERE id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
        <form action="editprofile_process.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br>

            <label for="contact_number">Contact Number:</label><br>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo $row['contact_number']; ?>"><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

            <label for="commuting_methods">Preferred Commuting Methods:</label><br>
            <input type="text" id="commuting_methods" name="commuting_methods" value="<?php echo $row['commuting_methods']; ?>"><br>

            <label for="energy_sources">Preferred Energy Sources:</label><br>
            <input type="text" id="energy_sources" name="energy_sources" value="<?php echo $row['energy_sources']; ?>"><br>

            <label for="dietary_preferences">Dietary Preferences:</label><br>
            <input type="text" id="dietary_preferences" name="dietary_preferences" value="<?php echo $row['dietary_preferences']; ?>"><br>

            <input type="submit" value="Update Profile">
        </form>
        <?php
        } else {
            echo "No profile found.";
        }

        $conn->close();
        ?>
    </section>
    <footer>
        <p>&copy; 2024 Reduce Carbon Emissions</p>
    </footer>
</body>
</html>
