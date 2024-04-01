<?php
    session_start(); // Start the session
     // Check if a customer is logged in
     $userInfo = "";

     if (isset($_SESSION['Admin_id'])) {
         $userInfo = "Admin ID: " . $_SESSION['Admin_id'];
     } else {
         $userInfo = "No user is currently logged in.";
     }
     
     echo $userInfo;
?>    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #f8f9fa; /* Background color for the body */
        }

        header, footer {
            background-color: rgba(52, 58, 64, 0.8); /* Semi-transparent background */
            color: #ffffff;
            padding: 20px 0; /* Padding for header and footer */
        }

        header {
            text-align: center;
        }

        .back-to-home {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 30px;
            background-color: rgba(0, 0, 0, 0.6); /* Transparent background */
            transition: background-color 0.3s ease;
        }

        .back-to-home:hover {
            background-color: rgba(0, 0, 0, 0.8); /* Darken on hover */
        }

        .header-title {
            margin-bottom: 20px;
            font-size: 36px; /* Increase font size */
            letter-spacing: 2px; /* Add some letter spacing */
        }

        .category-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px; /* Increase top margin */
        }

        .category-buttons .btn {
            margin: 10px;
            padding: 15px 30px;
            border-radius: 30px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
            color: #ffffff;
            background-color: #07532a; /* Darker background color */
            border: none; /* Remove border */
            font-size: 18px; /* Increase font size */
            letter-spacing: 1px; /* Add some letter spacing */
        }

        .category-buttons .btn:hover {
            background-color: #07532a; /* Darken on hover */
        }

        footer {
            text-align: center;
            font-size: 14px; /* Increase font size */
            position: fixed; /* Fixed position */
            bottom: 0; /* Stick to the bottom */
            width: 100%; /* Full width */
            background-color: rgba(52, 58, 64, 0.8); /* Semi-transparent background */
            padding: 20px 0; /* Padding for footer */
        }

        footer .list-unstyled {
            margin: 0;
            padding: 0;
            text-align: center; /* Center align the social media buttons */
        }

        footer .list-unstyled li {
            display: inline-block;
            margin: 0 10px; /* Add some space between social media buttons */
        }

        footer .list-unstyled li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        footer .list-unstyled li a:hover {
            color: #dee2e6; /* Lighten color on hover */
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="header-title">Admin Menu</h1>
            <a href="adminLogin.php" class="back-to-home">Logout</a>
        </div>
    </header>

    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="category-buttons text-center">
                        <a href="uplaodContent.php" class="btn btn-primary mb-2">Upload Content</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-buttons text-center">
                        <a href="surveyAnalytics.php" class="btn btn-primary mb-2">Question Survey Analytics</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-buttons text-center">
                        <a href="adminContent.php" class="btn btn-primary mb-2">Update Content</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <ul class="list-unstyled">
                <li><a href="https://www.instagram.com/hcssurvey/" target="_blank">Instagram</a></li>
                <li><a href="https://twitter.com/hcssurvey" target="_blank">Twitter</a></li>
                <li><a href="https://api.whatsapp.com/send?phone=123456789" target="_blank">WhatsApp</a></li>
            </ul>
            <p>&copy; 2024 HCS Survey</p>
        </div>
    </footer>

    <!-- Live wallpaper -->
    <video autoplay loop muted playsinline>
        <source src="https://cdn.pixabay.com/vimeo/220312371/background-9584.mp4?width=640&hash=21888c38363c43fe229260ee66f6c9d8fa85b046" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>
