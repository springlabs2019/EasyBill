<?php
 
$dataPoints = array(
	array("y" =>  5, "label" => "Sunday"),
	array("y" =>  10, "label" => "Monday"),
	array("y" =>  21, "label" => "Tuesday"),
	array("y" =>  15, "label" => "Wednesday"),
	array("y" =>  25, "label" => "Thursday"),
	array("y" =>  20, "label" => "Friday"),
	array("y" =>  0, "label" => "Saturday")
);

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Number of invoice in days"
	},
	axisY: {
		title: "Number of Invoice"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>