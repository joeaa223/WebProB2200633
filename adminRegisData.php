<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AUsername = $_POST['AUsername'];
    $AEmail = $_POST['AEmail'];
    $APassword = $_POST['APassword'];
    $ANumber = $_POST['ANumber'];

        // Database connection
        $conn = mysqli_connect('localhost', 'root', '', 'hcs');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check for existing records
        $CheckQuery = "SELECT * FROM tbl_admin WHERE AUsername='$AUsername' OR AEmail='$AEmail' OR ANumber='$ANumber'";
        $CheckResult = $conn->query($CheckQuery);
        if ($CheckResult) {
            if ($CheckResult->num_rows > 0) {
                echo "<script>alert('You have entered your Username, Email, or Contact information similarly to someone that has been registered previously. Please re-enter your info or log in.');</script>";
            } else {
                // Insert new record
                $sql = "INSERT INTO tbl_admin (AUsername, AEmail, APassword, ANumber) VALUES ('$AUsername', '$AEmail', '$APassword', '$ANumber')";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    echo "<script>alert('Registration successful!');</script>";
                    // Redirect to login page after successful registration
                    echo "<script>window.location.href = 'adminLogin.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Insertion failed: " . mysqli_error($conn) . "');</script>";
                }
            }
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
        mysqli_close($conn);
    }
?>
