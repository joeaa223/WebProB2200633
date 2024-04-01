<?php
// Establish database connection (replace placeholders with your actual database credentials)
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check connection

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    $commuting_methods = $_POST["commuting_methods"];
    $energy_sources = $_POST["energy_sources"];
    $dietary_preferences = $_POST["dietary_preferences"];

    // Assuming user authentication is implemented and user ID is available
    $user_id = 1; // Replace with actual user ID

    // Update user profile in database
    $sql = "UPDATE tbl_profile 
            SET username='$username', contact_number='$contact_number', email='$email',
                commuting_methods='$commuting_methods', energy_sources='$energy_sources', dietary_preferences='$dietary_preferences'
            WHERE id=$user_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect user to a confirmation page or back to the edit profile page with a success message
        header("Location: editprofile.php?success=true");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>
