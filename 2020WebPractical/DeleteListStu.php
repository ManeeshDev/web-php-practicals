<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysqli_connect_error());
	}
	mysqli_select_db($con,"future_it");
	
	$sql="SELECT * FROM Student";
	$result=mysqli_query($con,$sql);
	
	//View table header
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h6><a href="index.html">Back</a></h6>
	<h1 align="center">Delete Student Details</h1>
	<table border="1" align="center">
    	<tr>
       	 	<th>RegNumber</th>
        		<th>Name</th>
        		<th>Address</th>
        		<th>DOB</th>
        		<th>NIC</th>
        		<th>Mobile</th>
        		<th>Email</th>
        		<th>Course</th>
        </tr>
 <?php
 	//View records
	while($row=mysqli_fetch_array($result)) 
	{
		echo "<tr>";
		echo "<td>".$row['RegNumber']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['Address']."</td>";
		echo "<td>".$row['DOB']."</td>";
		echo "<td>".$row['NIC']."</td>";
		echo "<td>".$row['Mobile']."</td>";
		echo "<td>".$row['Email']."</td>";
		echo "<td>".$row['Course']."</td>";
		?>
		<td><a href="DeleteStudent.php?ino=<?php echo $row['RegNumber'];?>">Delete</a></td>
		<?php echo"</tr>";
	}
 ?>
 </table>
 <?php   	mysqli_close($con);     ?>
</body>
</html>