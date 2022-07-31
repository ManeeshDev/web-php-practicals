<?php  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    $con=mysqli_connect("localhost","root","");
		if(!$con)
		{
			die('Could Not Connect:'.mysqli_connect_error());
		}
		mysqli_select_db($con,"flora_ordering");

	    if (isset($_POST['send'])) {
	        
			$sql1 = "INSERT INTO sender(NIC_No, Sender_Name, Company, Telephone_No, Street_Address, City, Country) 
			VALUES('$_POST[nic]','$_POST[sname]','$_POST[company]','$_POST[tele]','$_POST[saddress]','$_POST[city]','$_POST[country]')";

			//to execute the query "mysqli_query" 
			if(mysqli_query($con,$sql1)) { 
				header('location:index.php?nic='.$_POST[nic].'&msg=success');
				
			}else{
				header('location:index.php?msg=unsuccess');
			}

	    mysqli_close($con);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personal Information</title>

	<link rel="stylesheet" href="css/Order_Flora.css">
</head>
<body>
	<br><br>
	<form name="mainfrm" method="post" action="">
		<table align="center" >
			<tr>
				<td align="center" colspan="3">

				 </td>
			</tr>
			<tr>
				<td align="center" colspan="3"><h3>[ PERSONAL INFORMATION ]</h3></td>
			</tr>
			<tr>
				<td width="180px">
					<span class="headline">SENDER DETAILS</span class="headline">
					<p>NIC NO</p>
					<input type="text" name="nic" id="nic" required placeholder="Enter Your NIC Number">
					<br>
					<p>Sender's Name</p>
					<input type="text" name="sname" id="sname" required placeholder="Enter Your Name">
					<br>
					<p>Company</p>
					<input type="text" name="company" id="company" required placeholder="Enter Company">
					<br>
					<p>Telephone No</p>
					<input type="text" name="tele" id="tele" required placeholder="Enter Telephone Number">
				</td>
				<td width="80px"></td>
				<td width="180px">
					<span class="headline">ADDRESS DATA</span class="headline">
					<p>Street Address</p>
					<input type="text" name="saddress" id="saddress" required placeholder="Enter Street Address" style="width:250px;">
					<br>
					<p>City</p>
					<input type="text" name="city" id="city" required placeholder="Enter City">
					<br>
					<p>Country</p>
					<select name="country" id="country">
						<option value="SriLanka" class="" id="">Sri Lanka</option>
						<option value="USA" class="" id="">USA</option>
						<option value="UK" class="" id="">UK</option>
						<option value="India" class="" id="">India</option>
					</select>
					<br><br><br><br>
					<button type="submit" value="Send" name="send" title="Save Your Data">SAVE DETAILS</button>
					<?php 
						if (isset($_GET["msg"])) {
							if (($_GET["msg"])=="success") {
								// echo ("<div class='Msg' style='background: yellow;'>Save Successfully!</div>");
								echo "<script type='text/javascript'>alert('Save Successfully!');</script>";
								// header('location:index.php');
							}elseif (($_GET["msg"])=="unsuccess") {
								// echo ("<div class='Msg' style='background: red;'>Save Unsuccessful!</div>");
								echo "<script type='text/javascript'>alert('Save Unsuccessful!'); window.location.replace(\"index.php\");</script>";
								// header('location:index.php');

							}
						}
					 ?>
				</td>
			</tr>
		</table>
	</form>
		<table class="footr" align="center" >
			<tr>
				<td align="center">
					<br>
					<?php 
						if (isset($_POST["next"])) {
							if(isset($_GET["msg"])){
								if (($_GET["msg"])=="success") {
									header('location:OrderInformation.php?nic='.$_GET[nic]);
								}
								elseif((($_GET["msg"])=="0") || (($_GET["msg"])=="unsuccess")){
									// echo ("<div class='Msg' style='background: red;'>Save Details First!</div>");
									echo "<script type='text/javascript'>alert('Save Details First!');</script>";
								}
							}else {
								// echo ("<div class='Msg' style='background: red;'>Save Details First!</div>");
								echo "<script type='text/javascript'>alert('Save Details First!');</script>";
							}
						}
					?>
					<form name="mainfrm2" method="post" action="">
						<button type="submit" value="next" name="next" title="To Place Order">Next</button>
					</form>
					<!-- <a href="OrderInformation.php>Next</a> -->
				</td>
			</tr>
		</table>

</body>
</html>