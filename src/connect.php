<?php

	$server = "localhost";
	$user = "jumpstartsol";
	$pass = "ZN6BdzqI7DQd";
	$dbname = "jumpstar_mw_db";

	$con = new MySQLi($server, $user, $pass, $dbname);


	if ($con->connect_error) //if database failed to connect
	{
		echo "<script>alert('connection with database failed')</script>";
		echo "Error: ".$con->connect_error;
	}
?>
