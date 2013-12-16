<?php
	// session_start();
	require('connection.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Ajax : Basic 1 : Post-Its</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
	$(document).ready(function(){

		$("#post_it_form").submit(function(){
            $.post(
                $(this).attr('action'),
                $(this).serialize(),
                function(data){
                    $('#results').html(data.html);
                }, 
                "json"
            );
            $('#textarea').val('');
            return false;
        });
		
		$('#post_it_form').submit();

	});
	</script>
</head>

<body>
<div class="container">
	<h1>My Posts:</h1>
	<div id="results">
	</div>
	<br>
	<div class="add-note">
		<label>Add a note:</label>
		<form id="post_it_form" action="process.php" method="post">
			<input type="hidden" name="action" value="post_it">
			<textarea id="textarea" name="text"></textarea>
			<br>
			<input type="submit" value="Post it!">
		</form>
	</div>
</div>
</body>
</html>