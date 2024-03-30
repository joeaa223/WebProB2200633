<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                <li><a href="editprofile.php">Edit Profile</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Sign Up</h2>
        <form action="signup_process.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            
            <label for="contact_number">Contact Number:</label><br>
            <input type="text" id="contact_number" name="contact_number" required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="commuting_methods">Preferred Commuting Methods:</label><br>
            <input type="text" id="commuting_methods" name="commuting_methods"><br>
            
            <label for="energy_sources">Preferred Energy Sources:</label><br>
            <input type="text" id="energy_sources" name="energy_sources"><br>
            
            <label for="dietary_preferences">Dietary Preferences:</label><br>
            <input type="text" id="dietary_preferences" name="dietary_preferences"><br>

            <!-- Reminder Frequency -->
            <label for="reminder">Preferred Reminder Frequency:</label><br>
            <select id="reminder" name="reminder">
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
            </select><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </section>
    <footer>
        <p>&copy; 2024 Reduce Carbon Emissions</p>
    </footer>
</body>
</html>
