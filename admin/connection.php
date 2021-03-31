<?php  
	$connection = mysqli_connect(
		'localhost',
		'root',
		'',
		'db'
	);

	if (!$connection) {
		die("Connection failed. ".mysqli_connect_error());
	} else {
	}
?>