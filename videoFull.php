<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap">

    <style>
    /* Add custom CSS styles */
    body {
        font-family: 'Roboto', sans-serif; /* Use Roboto font */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        position: relative; /* Added for proper stacking */
        background-color: #f8f9fa; /* Light background color */
    }

    #video-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%; 
        height: 100%;
        z-index: -1; /* Pushed to background */
        overflow: hidden;
    }

    #video-background {
        width: 100%;
        height: auto;
    }

    /* Adjust main content to appear above the video */
    main {
        position: relative;
        z-index: 1; /* Ensure it's above the video */
    }

    header {
        background-color: #343a40;
        z-index: 2; /* Ensure it's above the video */
        position: relative; /* Added for proper stacking */
        padding: 1rem 0; /* Add padding to the header */
    }
    .navbar {
        padding: 0;
    }
    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        color: #fff; /* White color for navbar brand */
    }
    .navbar-nav .nav-link {
        color: #fff; /* White color for navbar links */
    }
    .content-details {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 30px; /* Increased separation */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .content-details img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        margin-bottom: 15px; /* Increased separation */
    }
    .content-details h2 {
        margin-top: 0;
        margin-bottom: 15px; /* Increased separation */
        font-size: 1.8rem; /* Larger font size for headings */
        color: #333; /* Darker color for headings */
    }
    .content-details p {
        font-size: 1.1rem; /* Medium font size for paragraphs */
        color: #555; /* Slightly darker color for paragraphs */
    }
    .youtube-btn {
        background-color: #ff0000;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s;
    }
    .youtube-btn:hover {
        background-color: #cc0000;
    }
    footer {
        background-color: #343a40;
        color: #fff;
        padding: 20px 0;
        text-align: center;
        position: relative; /* Added for proper stacking */
        z-index: 2; /* Ensure it's above the video */
    }
    footer p {
        margin-bottom: 0;
    }
</style>

</head>
<body>
<div id="video-container">
        <video autoplay loop muted playsinline id="video-background">
            <source src="https://motionbgs.com/media/4254/foggy-forest.960x540.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Video</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="videoMain.php">Main Video Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <?php
            // Establish connection to the database
            $conn = mysqli_connect('localhost', 'root', '', 'hcs');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get the ContentID from the URL
            $selectedContentID = isset($_GET['ContentID']) ? intval($_GET['ContentID']) : 0;

            // Fetch the details of the selected content
            $contentDetailsQuery = "SELECT Title, Description, Image, Content_Type, Link, TalkPoints, Extra ,BLink FROM tbl_content WHERE ContentID = $selectedContentID";

            $result = $conn->query($contentDetailsQuery);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Loop through each content and display them in individual bubbles
                    while ($contentRow = $result->fetch_assoc()) {
                        echo '<div class="content-details">';
                        echo '<img src="/hcs/Image/' . $contentRow["Image"] . '" alt="' . $contentRow["Title"] . '" class="img-fluid">';
                        echo '<h2>' . $contentRow["Title"] . '</h2>';
                        echo '<p><strong>Description: </strong>' . $contentRow["Description"] . '</p>';
                        echo '<p><strong>Content Type: </strong>' . $contentRow["Content_Type"] . '</p>';
                        if ($contentRow["Content_Type"] == 'video' && strpos($contentRow["Link"], 'youtube.com') !== false) {
                            // Button for YouTube video
                            echo '<a href="' . $contentRow["Link"] . '" class="youtube-btn" target="_blank">Watch on YouTube</a>';
                        } else {
                            // If it's not a YouTube video, provide a link
                            echo '<p><strong>Link to the video: </strong><a href="' . $contentRow["Link"] . '">' . $contentRow["Link"] . '</a></p>';
                            echo '<div class="embed-responsive embed-responsive-16by9">';
                            echo '<iframe class="embed-responsive-item" src="' . $contentRow["BLink"] . '" allowfullscreen></iframe>';
                            echo '</div>';
                        }
                        
                        echo '<p><strong>More Talking Points: </strong>' . $contentRow["TalkPoints"] . '</p>';
                        echo '<p><strong>Extra Points: </strong>' . $contentRow["Extra"] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "No content found with ID: $selectedContentID";
                }
            } else {
                echo "Error fetching content details: " . $conn->error;
            }

            $conn->close(); // Close the database connection
            ?>
        </div>
    </main>

    <footer class="bg-dark text-light py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="text-uppercase">About Us</h6>
                    <p class="small">We aim to provide top-notch services and experiences for our users at HCS Survey.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase">Contact Us</h6>
                    <ul class="list-unstyled">
                        <li><a href="https://www.instagram.com/hcssurvey/" target="_blank" class="text-light"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://twitter.com/hcssurvey" target="_blank" class="text-light"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=123456789" target="_blank" class="text-light"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <!-- Additional contact information can be added here if needed -->
                </div>
            </div>
            <hr>
            <p class="text-center mb-0 small">&copy; 2024 HCS Survey</p>
        </div>
    </footer>

  <!-- Link Bootstrap JS (optional, for certain features like dropdowns) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>