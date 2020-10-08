<!DOCTYPE HTML>
<html>
<head>

    <script>
        function myFunction()
        {
            var elem = document.getElementById("chartContainer");
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }
    </script>
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
    <a id="chartContaine"  href="{{ url()->previous() }}">Back</a>
    <div id="chartContainer" style="height: 370px; width: 100%;">
        <!-- helo-->
    </div>


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


        <button onclick="myFunction();">hello</button>

</body>
</html>
