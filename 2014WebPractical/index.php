<?php

	if(isset ($_SESSION['username'])) {
		header('Location:result.php');
	}
	elseif(isset ($_POST["sign"])){
		session_start();
		$_SESSION['username']=$_POST['username'];
	}
	elseif(isset ($_POST["cancel"])){
		header('Location:index.php');
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	 
	    // Include database connection settings
	    $con=mysqli_connect("localhost","root","","student_marks");
	      if(!$con)
	      {
	        die('Could Not Connect:'.mysqli_connect_error());
	      }
	    mysqli_select_db($con,"student_marks");

	    // Retrieve username and password from database according to user's input
	    $uname = mysqli_real_escape_string($con,$_POST['username']);
	    $pwrd = mysqli_real_escape_string($con,$_POST['password']); 
	  
	    $login = mysqli_query($con,"SELECT * FROM student 
	            WHERE (UserName = '" . $uname . "') and (Password = '" . $pwrd . "')");

	    // Check username and password match
	    if (mysqli_num_rows($login) == 1) {

	      $q1=mysqli_query($con,"SELECT Name,IndexNo FROM student WHERE (UserName='".$uname."' and Password='".$pwrd."') ");
	      //$result=mysqli_query($con,$q1);
	      $row=mysqli_fetch_array($q1);

	      // echo "<script>alert('You are Successfully Submited !!!')</script>";
	      header('location:result.php?ino='.$row['IndexNo']); 
	    }
	    //If login user name or password is invalid
	    else { 
	      // echo "<script>alert('Your User Name or Password is invalid !!!')</script>";
	       $error="&emsp; Your User Name or Password is invalid !!! &emsp;";
	       ?>
	      <p style="color:#F0FFFF; background-color:#FF0000; padding: 5px; text-align: center; ">
	        <?php echo $error;?></p><?php
	     }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Management System</title>

	<link rel="stylesheet" href="css/main.css">

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  	<style>
		body{
			background-image: url(images/landscape.jpg);
			background-repeat: no-repeat;
			background-attachment: fixed; 
			background-size: 100% 100%;
			/**/
		}
	</style>
</head>
<body >
	<div class="bdydiv">
		<br><br><br><br>
		<h3 align="center">Welcome to the Student Information System</h3>
		<br>
		<center>
		<div class="frmcentr">
			<form  id="frm" name="frm" action="" method="post">
				<table border="0">
					<tr>
						<th colspan="2">Log to the System</th>
					</tr>
					<tr>
						<td style="padding-right:20px;">
							User Name
						</td>
						<td>
							<input type="text" name="username" class="login" placeholder="Your user name..." required>
						</td>
					</tr>
					<tr>
						<td style="padding-right:20px;">
							Password
						</td>
						<td>
							<input type="Password" name="password" class="login" placeholder="Your password..." required>
						</td>
					</tr>
					<tr style="height: 60px;">
						<td colspan="2" align="right" >
							<button type="submit" name="sign" style="margin-right:18px;">Sign In</button>
							<button type="reset" name="cancel">Cancel</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		</center>

		<h5 align="center">Copyright &copy; Collage of Technology 2014</h5>
	</div>
</body>
</html>