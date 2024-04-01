<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if (isset($_POST['q1']) && isset($_POST['q1_suggestion']) &&
        isset($_POST['q2']) && isset($_POST['q2_suggestion']) &&
        isset($_POST['q3']) && isset($_POST['q3_suggestion']) &&
        isset($_POST['q4']) && isset($_POST['q4_suggestion']) &&
        isset($_POST['q5']) && isset($_POST['q5_suggestion'])) {

        $q1 = $_POST['q1'];
        $q1_suggestion = $_POST['q1_suggestion'];
        $q2 = $_POST['q2'];
        $q2_suggestion = $_POST['q2_suggestion'];
        $q3 = $_POST['q3'];
        $q3_suggestion = $_POST['q3_suggestion'];
        $q4 = $_POST['q4'];
        $q4_suggestion = $_POST['q4_suggestion'];
        $q5 = $_POST['q5'];
        $q5_suggestion = $_POST['q5_suggestion'];

        // Insert data into database
        $sql = "INSERT INTO tbl_survey (q1, q1_suggestion, q2, q2_suggestion, q3, q3_suggestion, q4, q4_suggestion, q5, q5_suggestion)
                VALUES ('$q1', '$q1_suggestion', '$q2', '$q2_suggestion', '$q3', '$q3_suggestion', '$q4', '$q4_suggestion', '$q5', '$q5_suggestion')";
  
                  if ($conn->query($sql) === TRUE) {
                     echo '</select>';
                    echo '<script>alert("Thank You and Congratulations you have earned a new badge of participation");</script>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Form fields are not set.";
    }
} else {
    echo "Form not submitted.";
}

$conn->close();
?>
