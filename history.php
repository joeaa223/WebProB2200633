<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Log Activity</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can link your stylesheet here -->
</head>
<body>
    <header>
        <h1>Daily Log Activity</h1>
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
        <h2>User Submissions</h2>
        <?php
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

        // Fetch data from the database table
        $sql = "SELECT * FROM daily_log";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Transport: " . $row["transport"] . ", Meal: " . $row["meal"] . ", Energy: " . $row["energy"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No submissions yet.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>
</body>
</html>
