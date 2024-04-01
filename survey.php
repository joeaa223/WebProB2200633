<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HCS Survey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="">
  <style>
    body {
      background: url('https://images.pexels.com/photos/1423600/pexels-photo-1423600.jpeg?cs=srgb&dl=pexels-johannes-plenio-1423600.jpg&fm=jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-check-input {
      appearance: none;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid #adb5bd;
      cursor: pointer;
      outline: none;
    }

    .form-check-input:checked {
      background-color: #007bff;
      border-color: #007bff;
    }

    .form-check-input:focus {
      box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
    }

    .form-check-label {
      margin-left: 10px;
    }

    .form-check-input:checked + .form-check-label:before {
      content: '';
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: white;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: block;
    }

    .navbar-nav .nav-link:hover {
      color: rgba(255, 255, 255, 0.7) !important;
    }
  </style>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#" style="margin-right: auto;">HCS Survey</a>
      <a class="nav-link" href="index1.php">Back to Homepage</a>
    </div>
  </nav>
</header>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center">HCS Site Survey Questions</h2>
          <form id="surveyForm" action="surveySub.php" method="post" onsubmit="return validateForm()">
            <div class="mb-3">
              <label for="q1" class="form-label">Question 1: How satisfied are you with our HCS User Interface?</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q1" id="q1.1" value="1">
                <label class="form-check-label" for="q1.1">1</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q1" id="q1.2" value="2">
                <label class="form-check-label" for="q1.2">2</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q1" id="q1.3" value="3">
                <label class="form-check-label" for="q1.3">3</label>
              </div>
              <div class="mt-2">
                <label for="q1_suggestion" class="form-label">Suggestion to improve:</label>
                <textarea class="form-control" id="q1_suggestion" name="q1_suggestion" required minlength="5"></textarea>
              </div>
            </div>
              
              <div class="mb-3">
                <label for="q2" class="form-label">Question 2: How satisfied are you with our HCS CarbonFoot Print Calculator?</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q2" id="q2.1" value="1">
                  <label class="form-check-label" for="q2.1">1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q2" id="q2.2" value="2">
                  <label class="form-check-label" for="q2.2">2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q2" id="q2.3" value="3">
                  <label class="form-check-label" for="q2">3</label>
                </div>
                <div class="mt-2">
                  <label for="q2_suggestion" class="form-label">Suggestion to improve:</label>
                  <textarea class="form-control" id="q2_suggestion" name="q2_suggestion" required minlength="5" ></textarea>
               </div>
              </div>

              <div class="mb-3">
                <label for="q3" class="form-label">Question 3: How satisfied are you with our Educational Content?</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q3" id="q3.1" value="1">
                  <label class="form-check-label" for="q3.1">1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q3" id="q3.2" value="2">
                  <label class="form-check-label" for="q3.2">2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q3" id="q3.3" value="3">
                  <label class="form-check-label" for="q3.3">3</label>
                </div>
                <div class="mt-2">
                  <label for="q3_suggestion" class="form-label">Suggestion to improve:</label>
                  <textarea class="form-control" id="q3_suggestion" name="q3_suggestion" required minlength="5" ></textarea>
               </div>
              </div>

              <div class="mb-3">
                <label for="q4" class="form-label">Question 4: How satisfied are with with CarbonFootprint recommendations?</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q4" id="q4.1" value="1">
                  <label class="form-check-label" for="q4.1">1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q4" id="q4.2" value="2">
                  <label class="form-check-label" for="q4.2">2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q4" id="q4.3" value="3">
                  <label class="form-check-label" for="q4.3">3</label>
                </div>
                <div class="mt-2">
                  <label for="q4_suggestion" class="form-label">Suggestion to improve:</label>
                  <textarea class="form-control" id="q4_suggestion" name="q4_suggestion" required minlength="5" ></textarea>
               </div>
              </div>

              <div class="mb-3">
                <label for="q5" class="form-label">Question 5: How satisfied are with our Historical tracking system?</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q5" id="q5.1" value="1">
                  <label class="form-check-label" for="q5.1">1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q5" id="q5.2" value="2">
                  <label class="form-check-label" for="q5.2">2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q5" id="q5.3" value="3">
                  <label class="form-check-label" for="q5.3">3</label>
                </div>
                <div class="mt-2">
                  <label for="q5_suggestion" class="form-label">Suggestion to improve:</label>
                  <textarea class="form-control" id="q5_suggestion" name="q5_suggestion" required minlength="5" ></textarea>
               </div>
              </div>
              
              <!-- Repeat the above structure for remaining questions -->
              
                 
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="bg-dark text-light py-4 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>About Us</h5>
        <p>We strive to provide the best services and experience for our users at HCS Survey.</p>
      </div>
      <div class="col-md-4">
        <h5>Contact Us</h5>
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
    <p class="text-center mb-0">&copy; 2024 HCS Survey</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function validateForm() {
    var suggestion1 = document.getElementById("q1_suggestion").value;
    var suggestion2 = document.getElementById("q2_suggestion").value;
    var suggestion3 = document.getElementById("q3_suggestion").value;
    var suggestion4 = document.getElementById("q4_suggestion").value;
    var suggestion5 = document.getElementById("q5_suggestion").value;

    if (suggestion1.length < 5 || suggestion2.length < 5 || suggestion3.length < 5 || suggestion4.length < 5 || suggestion5.length < 5) {
      alert("Suggestions must be at least 5 characters long.");
      return false; // Prevent form submission
    } else {
      return true; // Proceed with form submission
    }
  }
</script>
</body>
</html>
