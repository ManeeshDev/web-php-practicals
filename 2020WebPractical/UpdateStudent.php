<!doctype html>
<Html><Body> 
<?php

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$con=mysqli_connect("localhost","root","");
		if(!$con)
		{
			die('Could Not Connect:'.mysqli_connect_error());
		}
		mysqli_select_db($con,"future_it");
   
   		$regNumber=$_POST['regNo'];
    	$name=$_POST['stname'];
    	$address=$_POST['address'];
    	$dob=$_POST['dob'];
    	$nic=$_POST['nic'];
    	$mobile=$_POST['pno'];
    	$email=$_POST['email'];
    	$course=$_POST['course'];
    
   	$sql="UPDATE Student SET
  		Name='$name',
  	    Address='$address',
  	    DOB='$dob',
  	    NIC='$nic',
  	    Mobile='$mobile',
  	   	Email='$email',
  	    Course='$course',
	WHERE RegNumber='$regNumber'";

	$result=mysqli_query($con,$sql);

	if($result)
	{
		$msg="Record Updated Successfully...";
 		?><font color="#FF0000"><?php
 		echo $msg;?></font><?php
		echo "<br>";
		echo "<a href='UpdateListStu.php'>	View Students </a>";
	}
	else
	{
		echo "Error";
	}
	mysqli_close($con);
 }
?>


 <form name="form" method="post" action="">

<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysqli_connect_error());
	}
	mysqli_select_db($con,"future_it");
	
    $regNumber=$_GET['ino'];
     $sql="SELECT * FROM Student WHERE RegNumber='$regNumber'";

    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
   ?>

<table border="1" align="center">
<tr>
<td>RegNumber</td>
<td><input type="text" name="regNo" value="<?php echo $row['RegNumber'];?>" readonly ></td>
</tr>

<tr>
<td>Name</td>
<td><input type="text" name="stname" value="<?php echo $row['Name'];?>"></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="address" value="<?php echo $row['Address'];?>"></td>
</tr>

<tr>
<td>DOB</td>
<td><input type="text" name="dob" value="<?php echo $row['DOB'];?>"></td>
</tr>

<tr>
<td>NIC</td>
<td><input type="text" name="nic" value="<?php echo $row['NIC'];?>"></td>
</tr>

<tr>
<td>Mobile</td>
<td><input type="text" name="pno" value="<?php echo $row['Mobile'];?>"></td>
</tr>

<tr>
<td>Email</td>
<td><input type="text" name="email" value="<?php echo $row['Email'];?>"></td>
</tr>

<tr>
<td>Course</td>
<td><input type="text" name="course" value="<?php echo $row['Course'];?>"></td>
</tr>

<tr><td>
<input type="submit" value="Update Student"></td>
</tr>
</table>
</form>
</body>
</html>
