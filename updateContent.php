<?php
// Establish connection to the database
$conn = mysqli_connect('localhost', 'root', '', 'hcs');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get content details from the form
$ContentID = $_POST['ContentID'];
$Title = $_POST['Title'];
$Description = $_POST['Description'];
$Content_type = $_POST['Content_type'];
$Link = $_POST['Link'];
$TalkPoints = isset($_POST['TalkPoints']) ? $_POST['TalkPoints'] : '';
$Extra = isset($_POST['Extra']) ? $_POST['Extra'] : '';

// Handle image update
$targetDir = "Image/";
$imageName = $_FILES['Image']['name'];
$targetFile = $targetDir . basename($imageName);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["Image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["Image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedFormats = ["jpg", "png", "jpeg", "gif"];
if(!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["Image"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["Image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Update the content details in the database using prepared statement
$sql = "UPDATE tbl_content SET 
        Title = ?,
        Description = ?,
        Content_type = ?,
        Link = ?,
        TalkPoints = ?,
        Extra = ?,
        Image = ?
        WHERE ContentID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", $Title, $Description, $Content_type, $Link, $TalkPoints, $Extra, $imageName, $ContentID);

if ($stmt->execute()) {
    // Redirect back to the admin content page or a confirmation page
    header("Location: adminContent.php");
} else {
    echo "Error updating content: " . $stmt->error;
}

$stmt->close(); // Close prepared statement
$conn->close(); // Close the database connection
?>

