<?php
 
 	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysqli_connect_error());
	}
	mysqli_select_db($con,"future_it");
	
	$regNumber=$_GET['ino'];
	$sql="DELETE FROM Student WHERE RegNumber='$regNumber'";
	$result=mysqli_query($con,$sql);
	
	if($result)
	{
		
		$msg="Record Deleted Successfully...";
 		?><font color="#FF0000"><?php
 		echo $msg;?></font><?php
		echo "<br><br>";
		echo "<a href='DeleteListStu.php'>	View Result </a>";
	}
	else
	{     echo "Error";   }
		mysqli_close($con);
 ?>
