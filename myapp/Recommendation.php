<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Recommendation.css">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=65feb22c36e2d30019200901&product=inline-share-buttons&source=platform" async="async"></script>

    <!--font type-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        
        <h1 class="logo">foodprint </h1>
        
        <!--navbar-->
        <nav class="nav">
            <h1 class="logo">foodprint </h1>
            <div class="divider"></div>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Service</a>
            <a href="#">Contact</a>
            
        </nav>

        <div class="user-form-group">
            <a class="login" href="#">Login</a>
            <a class="signup" href="#" >Sign up</a>

        </div>

    </header>
    <div class="chartsContainer">
        <div class="charts">
            <div class="chart-container">
                <div class="charts-card">
                    <h2 class="chart-title">Per capita greenhouse gas emissions by sector, United
States, 2020</h2>
                    <div id="bar-chart"></div>
                </div>
            </div>



            <div class="chart-container">
                <div class="charts-card">
                    <h2 class="chart-title">Per capita CO₂ emissions by sector, World, 2020</h2>
                    <div id="bar-chart2"></div>
                </div>
            </div>

            
        </div>

        <div class="chartDetails">
            <div class="chart-container1">
                <li class="chartText">you</li>
            </div>

            <div class="chart-container2">
                <li class="chartText">you</li>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js"></script>
    <script src="Recommendation.js"></script>

    <button><a href="SocialMediaSharing.html" class="button-back">back</a></button>
</body>
</html>