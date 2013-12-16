<?php
	// session_start();
	require('connection.php');

	$data = array();

	if (isset($_POST['action']) && $_POST['action']== 'post_it' ){
		if (!empty($_POST['text'])){
			$query = 'INSERT INTO posts (content, created_at, updated_at)
				  	  VALUES ("'.$_POST["text"].'", NOW(), NOW())';
			mysqli_query($connection, $query);
		}
		
		$query = 'SELECT content FROM posts';
		$result = fetchAll($connection, $query);

		$data['html'] = '';
		foreach($result as $post){
			$data['html'] .= '<div class="post-it">
							 	 '.$post['content'].'
							 </div>
							 ';
		}
	}

	echo json_encode($data);
?>