
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Add Booking Details</title>
	<link rel="stylesheet" href="css/Rent_Car.css">
</head>
<body>   
	<div class="container">
		<br>
	<form name="mainfrm" method="post" action="">
		<?php 
			if (isset($_GET["msg"])) {
				if (($_GET["msg"])=="success") {
					echo ("<div class='h4' style='background: green;'>Booking successful!</div>");
				}elseif (($_GET["msg"])=="unsuccess") {
					echo ("<div class='h4' style='background: red;'>Booking Unsuccessful!</div>");
				}
			}
		 ?>
		<table border="0" class="table">
			<tr>
				<th colspan="7">
					<h4 class="h4"> ADD BOOKING DETAILS </h4>
				</th>
			</tr>
			<tr>
				<td colspan="7">
					<strong> CUSTOMER DETAILS </strong>
				</td>
			</tr>
			<tr>
				<td>NIC No</td>
				<td>:</td>
				<td><input type="text" placeholder="Enter National ID Number" name="nic" id="nic"></td>
				<td rowspan="5"></td>
				<td>Service Type</td>
				<td>:</td>
				<td>
					<select name="stype" id="stype">
						<option value="1">Self Drive</option>
						<option value="2">With Driver</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td>:</td>
				<td><input type="text" placeholder="Enter Customer Name" name="cname" id="cname"></td>
				<td>Vehicle Type</td>
				<td>:</td>
				<td>
					<select name="vtype" id="vtype">
						<option value="1">Car</option>
						<option value="2">Van</option>
						<option value="3">Luxury Car</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><input type="text" placeholder="Enter Address" name="address" id="address"></td>
				<td>Start Date</td>
				<td>:</td>
				<td><input type="date" name="sdate" id="sdate"></td>
			</tr>
			<tr>
				<td>E-mail Address</td>
				<td>:</td>
				<td><input type="text" placeholder="E-mail" name="email" id="email"></td>
				<td>Return Date</td>
				<td>:</td>
				<td><input type="date" name="rdate" id="rdate"></td>
			</tr>
			<tr>
				<td>Mobile No</td>
				<td>:</td>
				<td><input type="text" placeholder="Mobile Number" name="mobile" id="mobile"></td>
				<td>Currency Type</td>
				<td>:</td>
				<td>
					<select name="ctype" id="ctype">
						<option value="1">LKR</option>
						<option value="2">US $</option>
						<option value="3">America $</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="7">
				<!-- <a type="submit" name="booking" style="float: right;">Booking</a> -->
				<input type="submit" value="Booking" name="booking">
			</td>
			</tr>
			<tr>
				<td colspan="7">
					<a href="quotation.php?nic=<?echo $_POST['nic']?>" style="float: left;">Get Quotation</a>
				</td>
			</tr>
			<tr>
				<td colspan="7"> 
					<?php 
					if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					    $con=mysqli_connect("localhost","root","");
						if(!$con)
						{
							die('Could Not Connect:'.mysqli_connect_error());
						}
						mysqli_select_db($con,"customers_booking");

					    if (isset($_POST['booking'])) {
					        
    						$sql1 = "INSERT INTO customer(NIC,Name,Address,Email,Mobile) 
    						VALUES('$_POST[nic]','$_POST[cname]','$_POST[address]','$_POST[email]','$_POST[mobile]')";

    						$sql2 ="INSERT INTO booking(NIC,Service_Type,Vehicle_Type,Start_Date,End_Date,Currency_Type) 
    						VALUES('$_POST[nic]','$_POST[stype]','$_POST[vtype]','$_POST[sdate]','$_POST[rdate]','$_POST[ctype]')";
    						
    						if((mysqli_query($con,$sql1)) && (mysqli_query($con,$sql2))) //to execute the query "mysqli_query" 
    						{
    							header('location:index.php?nic=<?echo $_POST["nic"] ?>&msg=success');
    						}else{


    							header('location:index.php?msg=unsuccess');
    							// die('<div class="h4">Booking Unsuccessful!</div>');
    							//die('<div class="h4">Booking Unsuccessful!  '.mysqli_error($con).'</div>');
    						}

					    } 
					    mysqli_close($con);
					}
					?>
				</td>
			</tr>
		</table>
	</form>
  </div>
</body>
</html>