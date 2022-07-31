<?php  
	require_once('include/connection.php');

	$sql = " SELECT FirstName,LastName FROM users ";
	$Query = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<style>
	body{
		background-image: url(images/landscape7.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
		color:white;
	}
</style>
<body>
	
	<div class="container">
		<table class="utable">
			<tr>
				<th>NO.</th>
				<th>Registered Users</th>
			</tr>
			<?php 
			    $no=1;
				while ($result=mysqli_fetch_array($Query)) {
					echo "<tr>
							<td>".$no."</td>
							<td>".$result['FirstName']." ".$result['LastName']."</td>
						  </tr>";
					$no=$no+1;
				}
			 ?>
		</table>
	</div>
</body>
</html>