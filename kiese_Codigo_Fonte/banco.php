
<?php 
	
	$bdSever = 'localhost';
	$bdUser = 'root';
	$bdPass = '123456789';
	$bdName = 'db_kiese';

	$conn = new mysqli($bdSever, $bdUser, $bdPass, $bdName);

	if ($conn->connect_error) {
   		die( $conn->connect_error);
	}

	function queryMysql($query)
	{
		global $conn;
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		return $result;
	}

	function sanitizeString($var)
	{
		global $conn;
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return $conn->real_escape_string($var);
	}

 ?>