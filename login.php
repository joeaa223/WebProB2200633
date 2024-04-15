<<<<<<< HEAD
<<<<<<< HEAD
<?php
session_start();

// Establishing database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "hcs";
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare a SQL statement with placeholders for user inputs
    $query = "SELECT * FROM tbl_profile WHERE email = ? AND password = ?";
    $stmt = $mysqli->prepare($query);

    // Bind parameters to the placeholders
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there's a row with the given email and password
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (isset($row['username'])) {
            $_SESSION['user'] = $row['username'];
            // Redirect to the desired page upon successful login
            $redirect_page = "index1.php"; // Change this to the appropriate page
            header("Location: $redirect_page");
            exit;
        } 
    } else {
        echo "<div class='alert alert-danger'>Email or password is incorrect. Please try again.</div>";
    }

    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reduce Carbon Emissions</h1>
        <nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
            </ul>
        </nav>
        <div class="profile">
            <p>Welcome, Guest</p>
            <!-- This could be dynamically generated based on whether a user is logged in or not -->
        </div>
    </header>
    <div class="container">
        <form action="" method="post"><br>
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div><br>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div><br>
            <div class="form-btn">
                <input type="submit" value="Login" class="btn btn-primary">
            </div><br>
        </form>
        <div><p>Not registered yet <a href="signup.php">Register Here</a></p></div>
    </div>
</body>
</html>
=======
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index1.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reduce Carbon Emissions</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <div class="profile">
            <p>Welcome, Guest</p>
            <!-- This could be dynamically generated based on whether a user is logged in or not -->
        </div>
    </header>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index1.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post"><br>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div><br>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div><br>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div><br>
      </form>
     <div><p>Not registered yet <a href="signup.php">Register Here</a></p></div>
    </div>
</body>
</html>
>>>>>>> 1c08701bcedd8a8ec032ffe15b6336b57d87f085
=======
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index1.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reduce Carbon Emissions</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <div class="profile">
            <p>Welcome, Guest</p>
            <!-- This could be dynamically generated based on whether a user is logged in or not -->
        </div>
    </header>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index1.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post"><br>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div><br>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div><br>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div><br>
      </form>
     <div><p>Not registered yet <a href="signup.php">Register Here</a></p></div>
    </div>
</body>
</html>
>>>>>>> 1c08701bcedd8a8ec032ffe15b6336b57d87f085
