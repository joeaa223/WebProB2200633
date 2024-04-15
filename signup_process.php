<?php
// Connect to your database
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    $commuting_methods = $_POST["commuting_methods"];
    $energy_sources = $_POST["energy_sources"];
    $dietary_preferences = $_POST["dietary_preferences"];
    $reminder = $_POST['reminder']
    // Add more fields as needed for the sign-up form

    // Check if username or email already exists
    $check_username_sql = "SELECT * FROM tbl_profile WHERE username = '$username'";
    $check_email_sql = "SELECT * FROM tbl_profile WHERE email = '$email'";
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
        $insert_sql = "INSERT INTO tbl_profile (username, password, contact_number, email, commuting_methods, energy_sources, dietary_preferences, reminder) VALUES ('$username', '$password', '$contact_number', '$email', '$commuting_methods', '$energy_sources', '$dietary_preferences', '$reminder')";

        if ($conn->query($insert_sql) == TRUE) {
            // Redirect to confirmation page with success message
            header("Location: confirmation.php?success=true");
            exit(); // Exit after redirection
        } else {
            $error_message = "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

