<?php

	$con =mysqli_connect("localhost","root",""); // To connect the server ("sever name","UserID","Password")
	
	if(!$con) // works if the server is not connected
	{
		die('Could not Connect'.mysqli_connect_error());
	}
	
	mysqli_select_db($con,"future_it");
	
	$sql = "INSERT INTO student(RegNumber,Name,Address,DOB,NIC,Mobile,Email,Course)
	VALUES ('$_POST[regNo]','$_POST[stname]','$_POST[address]',
	'$_POST[dob]','$_POST[nic]','$_POST[pno]','$_POST[email]','$_POST[crsInfo]')"; 

	if(!mysqli_query($con,$sql)) // To execute the (connection,Mysql query)
	{
		die('Error '.mysqli_connect_error($con));
	}
	
	echo "<h1> Record Added Successfully !</h1>";
	
	mysqli_close($con);
?>
