<?php  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    $con=mysqli_connect("localhost","root","");
		if(!$con)
		{
			die('Could Not Connect:'.mysqli_connect_error());
		}
		mysqli_select_db($con,"flora_ordering");

		// $nic=$_GET['nic'];

	    if (isset($_POST['send'])) {
	    	if (isset($_GET['nic'])){
	    		$nic=$_GET['nic'];

				$sql1 = "INSERT INTO orders(NIC_No, ProductCategory, PriceRange, DeliveryDate, DeliveryOption, Recipient, Address) 
				VALUES('".$nic."','$_POST[pcategory]','$_POST[pricerange]','$_POST[deliverydate]','$_POST[deliveryoption]','$_POST[recipient]','$_POST[address]')";

				//to execute the query "mysqli_query" 
				if(mysqli_query($con,$sql1)) { 
					header('location:OrderInformation.php?nic='.$_POST["nic"].'&msg=success');
				}else{
					header('location:OrderInformation.php?msg=unsuccess');
				}
	    	}else {
	    		echo "<script type='text/javascript'>alert('You are Expire!'); window.location.replace(\"index.php\");</script>";
	    		// header('location:index.php');
	    	}

	    mysqli_close($con);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order Information</title>

	<link rel="stylesheet" href="css/Order_Flora.css">
</head>
<body>
	<br><br>
	<form name="mainfrm" method="post" action="">
		<table align="center" >
			<tr>
				<td align="center" colspan="3"><h3>[ ORDER INFORMATION ]</h3></td>
			</tr>
			<tr>
				<td width="200px" valign="top">
					<span class="headline">PRODUCT DETAILS</span class="headline">
					<p>Order ID</p>  
					<input type="text" name="" id="" disabled placeholder="It will auto generate!">
					<p>Product Categories</p>
					<select name="pcategory" id="pcategory">
						<option value="Flowers" class="" id="">Flowers</option>
						<option value="Birthday-Flowers" class="" id="">Birthday Flowers</option>
						<option value="Anniversary-Flowers" class="" id="">Anniversary Flowers</option>
						<option value="Symoathy-Flowers" class="" id="">Symoathy Flowers</option>
						<option value="Congratulation-Flowers" class="" id="">Congratulation Flowers</option>
					</select>
					<p>Price Range</p>
					<select name="pricerange" id="pricerange">
						<option value="Below-Rs.2000" class="" id="">Below Rs.2000</option>
						<option value="Rs.2000-Rs.5000" class="" id="">Rs.2000- Rs.5000</option>
						<option value="Above-Rs.5000" class="" id="">Above Rs.5000</option>
					</select>
				</td>
				<td width="70px"></td>
				<td width="180px" valign="top">
					<span class="headline">DELIVERY DETAILS</span class="headline">
					<p>Delivery Date</p>
					<input type="text" name="deliverydate" id="deliverydate" required placeholder="Enter Delivery Date" style="width:250px;">
					<br>
					<p>Delivery Option</p>
					<input type="radio" name="deliveryoption"  value="Delivery-To-Address" required><label for="DtoAdd">Delivery to Address</label>
					<br>
					<input type="radio" name="deliveryoption"  value="PickUp-From-Florist" required><label for="DtoAdd">Pick up from Florist</label>
					<br>
					<p>Recipient Name</p>
					<input type="text" name="recipient" id="recipient" required placeholder="Enter Recipient Name" style="width:250px;">
					<br>
					<p>Address</p>
					<input type="text" name="address" id="address" required placeholder="Enter Address" style="width:250px;">
					<br><br>
					<button type="submit" value="Send" name="send">SAVE ORDER DETAILS</button>
					<?php 
						if (isset($_GET["msg"])) {
							if (($_GET["msg"])=="success") {
								// echo ("<div class='Msg' style='background: yellow;'>Odered successfully!</div>");
								echo "<script type='text/javascript'>alert('Odered Successfully!'); window.location.replace(\"index.php\");</script>";
							
							}elseif (($_GET["msg"])=="unsuccess") {
								// echo ("<div class='Msg' style='background: red;'>Oder Unsuccessful!</div>");
								echo "<script type='text/javascript'>alert('Oder Unsuccessful!');</script>";
								

							}
						}
					 ?>
				</td>
			</tr>
			<tr>
				<td><a href="index.php">Back</a></td>
			</tr>
		</table>
	</form>
</body>
</html>