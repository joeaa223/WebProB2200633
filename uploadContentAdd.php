<?php
session_start();

// Function to safely handle user input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user inputs
$Title = sanitizeInput($_POST['Title']);
$Description = sanitizeInput($_POST['Description']);
$TalkPoints = sanitizeInput($_POST['TalkPoints']);
$Extra = sanitizeInput($_POST['Extra']);
$Image = $_FILES['Image']['name'];
$Content_type = sanitizeInput($_POST['Content_type']);
$Link = sanitizeInput($_POST['Link']);

// Function to get YouTube video ID from URL
function getYouTubeVideoId($url) {
    $videoId = '';
    if (strpos($url, 'youtube.com') !== false) {
        parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
        if (isset($queryParams['v'])) {
            $videoId = $queryParams['v'];
        }
    } elseif (strpos($url, 'youtu.be') !== false) {
        $videoId = substr(parse_url($url, PHP_URL_PATH), 1);
    }
    return $videoId;
}

// Extract YouTube video ID from the provided YouTube link
$videoId = getYouTubeVideoId($Link);

// Construct BLink (embedded URL) and ALink (specific YouTube link/URL)
$BLink = '';
$ALink = '';
if (!empty($videoId)) {
    $BLink = "https://www.youtube.com/embed/$videoId"; // Embedded URL
    $ALink = "https://www.youtube.com/watch?v=$videoId"; // Specific YouTube link/URL
}

// Upload image file
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/';
move_uploaded_file($_FILES['Image']['tmp_name'], $uploadDir . $Image);

// Prepare SQL statement with prepared statement
$sql = "INSERT INTO tbl_content (Title, Description, Image, Content_type, Link, TalkPoints, Extra, BLink, ALink)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $Title, $Description, $Image, $Content_type, $Link, $TalkPoints, $Extra, $BLink, $ALink);

if ($stmt->execute()) {
    echo "New record successfully added!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

