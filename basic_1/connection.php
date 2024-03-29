<?php

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_DATABASE', 'post_its');

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

	if(mysqli_connect_errno()){
		echo "error connecting to database:<br>";
		echo mysqli_connect_errno();
	}

	//fetches all records from the query and returns an array with the fetched records
	function fetchAll($connection, $query){
		$data = array();

		$result = mysqli_query($connection, $query);
		if ($result == NULL){
			return NULL;
		}

		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}

		return $data;
	}

	//fetchRecord()
	//-------------
	//Fetches the first record obtained from the query.
	//Either returns the result of the query, or null if no data was received. 
	function fetchRecord($connection, $query){
		$result = mysqli_query($connection, $query);
		if ($result == NULL){
			return NULL;
		}
		return mysqli_fetch_assoc($result);
	}

?>