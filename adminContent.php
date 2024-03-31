<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Uploaded Content</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('your-background-image.jpg') fixed; /* Specify your live wallpaper background */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the background image */
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 10px; /* Rounded corners */
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Soft shadow */
            max-width: 100%;
            overflow-x: auto; /* Enable horizontal scrolling if needed */
            flex: 1; /* Allow container to grow to fill remaining space */
        }

        h2 {
            text-align: center;
        }

        .table {
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Hide overflow content */
        }

        .table th,
        .table td {
            vertical-align: middle; /* Vertically center table content */
        }

        img {
            max-width: 100px; /* Limit image width */
            height: auto; /* Maintain aspect ratio */
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for navbar */
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .navbar-brand {
            font-size: 1.0rem;
            font-weight: bold;
        }

        .navbar-toggler {
            order: -1; /* Move toggler to the beginning */
        }

        footer {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for footer */
            text-align: center;
            padding: 20px;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .back-to-homepage {
            position: absolute;
            top: 10px;
            right: 20px;
        }
    </style>
</head>


<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="adminMenu.php">Back to Homepage</a>
        </div>
    </nav>

    <div class="container">
        <h2>All Uploaded Content</h2>
        <?php
        session_start();
        // Establish connection to the database
        $conn = mysqli_connect('localhost', 'root', '', 'hcs');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch all content from the database
        $adminID = $_SESSION['Admin_id'];
        $contentQuery = "SELECT * FROM tbl_content WHERE fk_AdminID = $adminID";
        $result = $conn->query($contentQuery);

        if ($result && $result->num_rows > 0) {
            echo '<div class="table-responsive">'; // Make table responsive
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Image</th>'; // Add new column for image
            echo '<th>Title</th>';
            echo '<th>Description</th>';
            echo '<th>Talking Points</th>';
            echo '<th>Extra Facts</th>';
            echo '<th>Content Type</th>';
            echo '<th>Link</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>';
                if (empty($row["Image"])) {
                    echo "<div class='error'>Image not Added.</div>";
                } else {
                    echo '<img src="Image/' . $row["Image"] . '" alt="Image" width="100" height="100"><br>';
                }
                echo '</td>'; // Display image
                echo '<td>' . $row["Title"] . '</td>';
                echo '<td>' . $row["Description"] . '</td>';
                echo '<td>' . $row["TalkPoints"] . '</td>';
                echo '<td>' . $row["Extra"] . '</td>';
                echo '<td>' . $row["Content_type"] . '</td>';
                echo '<td>' . $row["Link"] . '</td>';
                echo '<td><a href="editContent.php?ContentID=' . $row["ContentID"] . '&Title=' . urlencode($row["Title"]) . '&Description=' . urlencode($row["Description"]) . '&TalkPoints=' . urlencode($row["TalkPoints"]) . '&Extra=' . urlencode($row["Extra"]) . '&Content_type=' . urlencode($row["Content_type"]) . '&Link=' . urlencode($row["Link"]) . '&Image=' . urlencode($row["Image"]) . '" class="btn btn-primary">Edit</a></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>'; // End of table-responsive
        } else {
            echo '<p class="text-muted">No content uploaded yet.</p>';
        }

        $conn->close(); // Close the database connection
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 HCS. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>