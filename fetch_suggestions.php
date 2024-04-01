<?php
$questionId = $_GET['question_id'];

$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve suggestions from the database for the selected question
$sql = "SELECT suggestion FROM tbl_survey WHERE question_id = $questionId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output suggestions
    while ($row = $result->fetch_assoc()) {
        echo $row["suggestion"] . "<br>";
    }
} else {
    echo "No suggestions available for this question.";
}

$conn->close();
?>

