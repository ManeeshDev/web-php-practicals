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
	<h2 align="center"><u> Student Details</u></h2> <br><br>
	<table border="1" align="center">
    	<tr>
       	 	<th>RegNumber</th>
        		<th>Name</th>
        </tr>
 <?php
 	//View records
	while($row=mysqli_fetch_array($result)) 
	{
		echo "<tr>";
		echo "<td>".$row['RegNumber']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo"</tr>";
	}
 ?>
 </table>
<?php
 	mysqli_close($con);        
?>
