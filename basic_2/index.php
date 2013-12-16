<!--
	Jefferson Lam
	12-16-13
	Ajax: Basic 2
-->

<!DOCTYPE html>
<html>
<head>
	<title>Ajax : Basic 2</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			$("form").submit(function(){
				$.get($(this).attr('action')+"?callback=?", 
					$(this).serialize(),
					function(dojo){
						var cityName = dojo.data.nearest_area[0].areaName[0].value;
						var temp_F = dojo.data.current_condition[0].temp_F;
						var temp_C = dojo.data.current_condition[0].temp_C;
						var windspeed = dojo.data.current_condition[0].windspeedMiles;
						var weatherDesc = dojo.data.current_condition[0].weatherDesc[0].value;
						var report = "<h4>Weather for: " + cityName + "</h4>" +
									  "<p>Current temp F: " + temp_F + "</p>" +
									  "<p>Current temp C: " + temp_C + "</p>" +
									  "<p>Current Windspeed: " + windspeed + "</p>" +
									  "<p>Weather Description: " + weatherDesc + "</p>";
						
						$('#weather').html(report);
					}, "json");
				return false;
			});

		});
	</script>
</head>

<body>
<div class="container">
	<h3>The Coding Dojo weather report!!</h3>
	<form action="http://api.worldweatheronline.com/free/v1/weather.ashx" method="get">
		<select name="q">
			<option value="94040">Mountain View</option>
			<option value="98101">Seattle</option>
			<option value="48201">Detroit</option>
			<option value="90001">Los Angeles</option>
		</select>
		<input type="hidden" name="format" value="json">
		<input type="hidden" name="key" value="jtpc4myth9fwxjgwz9fh5fw5">
		<input type="hidden" name="includeLocation" value="yes">
		<input type="submit" value="Submit">
	</form>
	<div id="weather"></div>
</div>
</body>
</html>