<?php  

if (isset($_POST['submit'])) {
	require_once('connection.php');

	$sql=" INSERT INTO users (FirstName,LastName,Email,Tele,Gender) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[tele]','$_POST[gender]')";

	if (!mysqli_query($con,$sql)) {
		$err = mysqli_error($con);
		header('location:../registration.html?msg=failed&err='.$err);
	}else{
		header('location:../registration.html?msg=success');
	}
}else{
	header('location:../registration.html?msg=access denied');
}

?>