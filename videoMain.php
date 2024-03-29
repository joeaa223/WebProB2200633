<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Content: Video</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
    <div id="video-container">
        <video autoplay loop muted playsinline id="video-background">
            <source src="https://motionbgs.com/media/4254/foggy-forest.960x540.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="content-overlay">
        <header class="py-3">
            <div class="container">
                <h1 class="text-white mb-0">Education Content: Video</h1>
                <div class="category-buttons mt-3">
                    <a href="learn.php" class="btn btn-primary">Choose Another Category</a>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <?php
                //session_start(); // Start the session
                // Check if a customer is logged in
                /*$userInfo = "";

                if (isset($_SESSION['merchant_id'])) {
                    $userInfo = "Merchant ID: " . $_SESSION['merchant_id'];
                } else {
                    $userInfo = "No user is currently logged in.";
                }
                
                echo $userInfo;

                $merchantID = $_SESSION['merchant_id'];*/
                
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                ?>
                <div class="main-content mt-4">
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Explore</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect('localhost', 'root', '', 'hcs');
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT * FROM tbl_content WHERE Content_type = 'video'";
                                $res = mysqli_query($conn, $sql);
                                if (!$res) {
                                    die("Query failed: " . mysqli_error($conn));
                                }

                                $sn = 1;

                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $ContentID = $row['ContentID'];
                                        $Title = $row['Title'];
                                        $Image = $row['Image'];
                                        ?>
                                        <tr>
                                            <td><?php echo $Title; ?></td>
                                            <td>
                                                <?php
                                                if (empty($Image)) {
                                                    echo "<div class='error'>Image not Added.</div>";
                                                } else {
                                                    echo '<img src="Image/' . $Image . '" alt="Image" width="100" height="100"><br>';
                                                }
                                                ?>
                                            </td>
                                            <td> <a href="videoFull.php?ContentID=<?php echo $ContentID; ?>" class="btn btn-primary">Explore More</a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr> <td colspan='2' class='error'>No Content Yet, No Worries, Come Back Later.</td></tr>";
                                }

                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <footer class="py-2">
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
    </div>

    <!-- Link to Bootstrap JS (optional, only if you need Bootstrap JavaScript features) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

