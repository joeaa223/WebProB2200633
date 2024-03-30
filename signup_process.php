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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    // Add more fields as needed for the sign-up form

    // Check if username or email already exists
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $username_result = $conn->query($check_username_sql);
    $email_result = $conn->query($check_email_sql);

    if ($username_result->num_rows > 0) {
        $username_error = "Username already exists. Please choose a different one.";
    }

    if ($email_result->num_rows > 0) {
        $email_error = "Email already registered. Please use a different email.";
    }

    // If no errors, insert data into the database
    if (empty($username_error) && empty($email_error)) {
        // Insert data into the database table
        $insert_sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

        if ($conn->query($insert_sql) === TRUE) {
            // Redirect to confirmation page with success message
            header("Location: confirmation.php?success=true");
            exit();
        } else {
            $error_message = "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>