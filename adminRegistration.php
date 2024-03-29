<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom CSS -->
    <link href="style4.css" rel="stylesheet">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" >Admin Registration</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Homepage</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form id="registration-form" action="adminRegisData.php" method="POST">
                    <h1 class="text-center mb-4">Admin Registration</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="AUsername" name="AUsername" placeholder="Username" required>
                        <label for="AUsername">Admin Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="AEmail" name="AEmail" placeholder="name@example.com" required>
                        <label for="AEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="APassword" name="APassword" placeholder="Password" required>
                        <label for="APassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ANumber" name="ANumber" placeholder="Number" required>
                        <label for="ANumber">Number</label>
                    </div>
                    <button class="btn btn-primary w-100" type="submit" name="submit">Register</button>
                    <p id="message" class="text-center mt-3"></p>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("registration-form").addEventListener("submit", function(e) {
            const AUsername = document.getElementById("AUsername").value.trim();
            const AEmail = document.getElementById("AEmail").value.trim();
            const APassword = document.getElementById("APassword").value.trim();
            const ANumber = document.getElementById("ANumber").value.trim();

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const alphanumericPattern = /^[a-zA-Z0-9]*$/;

            if (!AUsername || !AEmail || !APassword || !ANumber) {
                showMessage("Please fill out all fields.", "red");
                e.preventDefault(); // Prevent form submission if validation fails
            } else if (APassword.length < 8) {
                showMessage("Password must be at least 8 characters.", "red");
                e.preventDefault(); // Prevent form submission if validation fails
            } else if (!emailPattern.test(AEmail)) {
                showMessage("Please enter a valid email address.", "red");
                e.preventDefault(); // Prevent form submission if validation fails
            } else if (!alphanumericPattern.test(ANumber)) {
                showMessage("Number must contain only alphanumeric characters.", "red");
                e.preventDefault(); // Prevent form submission if validation fails
            } else if (!/\d/.test(APassword) || !/[a-z]/.test(APassword) || !/[A-Z]/.test(APassword) || !/[!@#$%^&*]/.test(APassword)) {
                showMessage("Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.", "red");
                e.preventDefault(); // Prevent form submission if validation fails
            } else {
                // If validation passes, no need to prevent form submission
            }
        });

        function showMessage(messageText, color) {
            const message = document.getElementById("message");
            message.textContent = messageText;
            message.style.color = color;
        }
    </script>
     <footer class="mt-5">
         <div class="social-links text-center">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
     </footer>

</body>
</html>
