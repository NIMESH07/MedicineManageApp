<!DOCTYPE HTML>
<html>
<head>
<script>

window.onload = function () {


var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 10 Medicine - till 2020"
	},
	axisY: {
		title: "Number of Stoke"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
	}]
});
chart.render();

}
</script>
</head>
<body>
      <a href="{{ url()->previous() }}">Back</a>
    <div id="chartContainer" style="height: 370px; width: 100%;">
        <!-- helo-->
    </div>


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
