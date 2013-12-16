<?php
	require("connection.php");

	$data = array();
	// var_dump($_POST);

	if (!empty($_POST['name'])){
		$query = "SELECT * FROM leads
				  WHERE first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%'";
		$result = fetchAll($connection, $query);

		$html = "
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>registered_datetime</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
		";
		// var_dump($result);
		foreach($result as $user){
			$html .= "
				<tr>
					<td>{$user['id']}</td>
					<td>{$user['first_name']}</td>
					<td>{$user['last_name']}</td>
					<td>{$user['registered_datetime']}</td>
					<td>{$user['email']}</td>
				</tr>
			";
		}

		$html .= "
			</tbody>
		</table>
		";

		$data['html'] = $html;
	}
	echo json_encode($data);
?>