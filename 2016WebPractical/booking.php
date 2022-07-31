<?php 
	
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysqli_connect_error());
	}
	mysqli_select_db($con,"customers_booking");

	$sql1 = "INSERT INTO customer(NIC,Name,Address,Email,Mobile) 
	VALUES('$_POST[nic]','$_POST[cname]','$_POST[address]','$_POST[email]','$_POST[mobile]')";

	$sql2 ="INSERT INTO booking(NIC,Service_Type,Vehicle_Type,Start_Date,End_Date,Currency_Type) 
	VALUES('$_POST[nic]','$_POST[stype]','$_POST[vtype]','$_POST[sdate]','$_POST[rdate]','$_POST[ctype]')";
	
	if((!mysqli_query($con,$sql1)) || (!mysqli_query($con,$sql2))) //to execute the query "mysqli_query" 
	{
		die(mysqli_error($con));
	}
	echo ("<script>alert('Record Added successful!')</script>");
	header('location:index.php?booking=success');
	exit();
	
	mysqli_close($con);
?>


 ?>