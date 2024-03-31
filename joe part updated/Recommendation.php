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
                <li class="chartText">
                    This chart shows the distribution of CO2 emissions across sectors.
                    The global breakdown for CO2 is similar to that of total greenhouse gases – electricity and 
                    heat production dominate, followed by transport, manufacturing, and construction. One key difference
                    is that direct agricultural emissions (if we exclude land use change and forestry) are not shown;
                    most direct emissions from agriculture result from methane (production from livestock) and nitrous
                    oxide (released from the application of fertilizers).
                </li>

                <li class="chartText1">
                    Reduce Energy Consumption: Opt for renewable energy sources when possible.  Consider solar 
                    panels for your home and support green energy policies in your community.
                    Adopt Sustainable 
                </li>

                <li class="chartText1">
                    Transportation: Limit the use of personal vehicles.  Opt for public transport, 
                    carpooling, biking, or walking.  Consider investing in an electric or hybrid vehicle if a personal 
                    vehicle is necessary.
                </li>
                
            </div>

            <div class="chart-container2">
                <li class="chartText">
                    This chart shows the breakdown of total greenhouse gases (the sum of all greenhouse gases, measured in tonnes of carbon dioxide equivalents) by sector.
                    Electricity and heat production are the largest contributors to global emissions. This is followed by transport, manufacturing, construction (largely cement and similar materials), and agriculture.
                    But this is not the same everywhere. If we look at the United States, for example, transport is a much larger contributor than the global average. In Brazil, most emissions come from agriculture and land use change.
                </li>

                <li class="chartText1">
                    Support Renewable Energy: Advocate for and use renewable energy sources to reduce reliance on fossil fuels 
                    for electricity and heat production, the largest global emission contributors.
                </li>

                <li class="chartText1">
                    Optimize Transportation Choices: In countries like the United States, where transport emissions are significantly high, 
                    consider using public transportation, carpooling, biking, or electric vehicles to minimize your carbon footprint.
                </li>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js"></script>
    <script src="Recommendation.js"></script>

    <button><a href="SocialMediaSharing.html" class="button-back">back</a></button>
</body>
</html>