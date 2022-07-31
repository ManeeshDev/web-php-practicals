<?php
	$servername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "2018";

	$con = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

	if (!$con) {
	  die("Connection Failed:" .mysqli_connect_error());
	}
	
?>