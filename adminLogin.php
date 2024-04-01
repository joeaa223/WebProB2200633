<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom CSS -->
    <link href="style4.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" >Admin Login</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index1.php">Homepage</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title text-center">Login</h1>
                        <form id="login-form" action="" method="POST">
                            <div class="mb-3">
                                <label for="AEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="AEmail" id="AEmail" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="APassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="APassword" id="APassword" placeholder="Password" required>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                            <p class="text-center mt-3">
                                Don't have an account? <a href="adminRegistration.php" id="register">Register</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-5">
        <div class="social-links text-center">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="contentValidation.js"></script>
</body>
</html>


<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "hcs";

// Establishing a connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AEmail = $_POST['AEmail'];
    $APassword = $_POST['APassword'];

    // Prepare a SQL statement with placeholders for user inputs
    $query = "SELECT * FROM tbl_admin WHERE AEmail = ? AND APassword = ?";
    $stmt = $mysqli->prepare($query);

    // Bind parameters to the placeholders
    $stmt->bind_param("ss", $AEmail, $APassword);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there's a row with the given email and password
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (isset($row['AdminID'])) {
            $_SESSION['Admin_id'] = $row['AdminID'];
            // Redirect to the desired page upon successful login
            $redirect_page = "adminMenu.php"; // Change this to the appropriate page
            header("Location: $redirect_page");
            exit;
        } 
    } else {
        echo "Wrong User. Please try again.";
    }

    $stmt->close();
}

$mysqli->close();
?>
