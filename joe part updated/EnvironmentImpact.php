<?php
 


$link =mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "chart_db");

$test=array();
$count=0;

$res=mysqli_query($link, "SELECT * FROM chart02");
while($row=mysqli_fetch_array($res)){
    $test[$count] ["label"] = $row["Type name"];
    $test[$count] ["y"] = $row["percentage"];
    $count=$count+1;
}

$adviceData = [
    "Transportation" => [
        70 => "Transportation~ Use advanced information technology to improve traffic efficiency and reduce unnecessary emissions.",
        50 => "Transportation~ Implement low-carbon transport policies: for example, congestion charges or carbon taxes.",
        30 => "Transportation~ Encourage the purchase and use of electric and hybrid vehicles and other energy-saving and environmentally friendly vehicles.",
        10 => "Transportation~ Encourage the use of public transport, such as buses and subways."
    ],
    "Energy" => [
        70 => "Energy~ Including electric vehicles, electric buses and electric bicycles to reduce the consumption of traditional fossil fuels.",
        50 => "Energy~ A carbon tax or carbon trading system that makes carbon emissions costless and incentivizes businesses and individuals to reduce carbon emissions.",
        30 => "Energy~ Encourage the adoption of green building standards, such as better insulation, solar water heaters, etc., to reduce building energy consumption.",
        10 => "Energy~ Improve energy efficiency and reduce energy waste through the use of energy-saving light bulbs and high-efficiency home appliances."
    ],
    "Diet" => [
        70 => "Diet~ Increase public awareness of the carbon footprint of food production through education and social campaigns to encourage the adoption of more environmentally friendly eating habits.",
        50 => "Diet~ Drastically reduce food waste by planning meal purchases, storing food properly, and using surplus food.",
        30 => "Diet~ Choose foods that are certified organic and sustainably produced, which tend to be more environmentally friendly and use fewer fossil fuels and chemicals.",
        10 => "Diet~ By reducing the consumption of red meat (especially beef and lamb), switch to chicken and fish, as well as plant-based protein sources such as beans and soy products."
    ]
];

$adviceList = array();
foreach ($test as $data) {
    $label = $data['label']; // 比如 "Transportation"
    $percentage = $data['y']; // 比如 45

    if (array_key_exists($label, $adviceData)) {
        foreach ($adviceData[$label] as $threshold => $advice) {
            if ($percentage >= $threshold) {
                $adviceList[] = $advice;
                break; // 找到第一个满足条件的建议后停止循环
            }
        }
    }
}

	
?>
<!DOCTYPE HTML>
<html>
<head>  
<link rel="stylesheet" href="EnvironmentImpact.css">



<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: false,
	title:{
		text: "Carbon Footprint Data"
	},

    backgroundColor: "transparent",

	data: [{
		type: "column",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>,

        click: function(e) {
                var category = e.dataPoint.label;
                var percentage = e.dataPoint.y;
                var advice = "";

                // 使用 PHP 输出的 $adviceData
                var adviceData = <?php echo json_encode($adviceData); ?>;

                if (adviceData[category]) {
                    var keys = Object.keys(adviceData[category]).reverse();
                    for (var i = 0; i < keys.length; i++) {
                        var key = keys[i];
                        if (percentage >= key) {
                            advice = adviceData[category][key];
                            break;
                        }
                    }
                }

                if (advice) {
                    document.getElementById("advice-container").style.display = 'block';
                    document.getElementById("advice-content").innerHTML = advice;
                }
            }
	}]


});
chart.render();
 
}
</script>
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
<div class="container-flex">
    <div id="advice-container">
        <h2>Advice to Reduce Carbon Footprint</h2>
        <div id="advice-content">
            <?php foreach ($adviceList as $advice): ?>
                <p class="advice-text"><?php echo htmlspecialchars($advice); ?></p>
            <?php endforeach; ?>
        </div>

    </div>
    <div id="chartContainer" style="height: 370px; width: 50%;"></div>
</div>


<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<button><a href="SocialMediaSharing.html" class="button-back">back</a></button>
</body>
</html>  