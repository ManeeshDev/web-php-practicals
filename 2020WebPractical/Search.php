<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysqli_connect_error());
	}
	mysqli_select_db($con,"future_it");
	
	$no=$_POST['SearchId'];

	$result=mysqli_query($con,"SELECT * FROM student WHERE  RegNumber='".$no."' ");
	
	$row=mysqli_fetch_array($result);
	
if($row>0)
{		
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

    <table width="424" height="210" border="0" align="center" class="table">
      <tbody>
        <tr>
          <td height="48" colspan="2" align="center" valign="middle" style="font-size: 24px; font-style: normal; font-weight: bold; color:#fff;">Student Information</td>
        </tr>
        <tr>
          <td width="390" height="24" style="color: #000000">Registration Number</td>
          <td width="190" align="center"><?php echo $row['RegNumber'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">Name</td>
          <td align="center"><?php echo $row['Name'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">Address</td>
          <td align="center"><?php echo $row['Address'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">Date of Birth</td>
          <td align="center"><?php echo $row['DOB'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">NIC</td>
          <td align="center"><?php echo $row['NIC'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">Mobile Number</td>
          <td align="center"><?php echo $row['Mobile'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">Email</td>
          <td align="center"><?php echo $row['Email'];?></td>
        </tr>
        <tr>
          <td height="24" style="color: #000000">Course</td>
          <td align="center"><?php echo $row['Course'];?>
          </td>
        </tr>
      </tbody>
    </table>

    <?php 
}
else
{ 
	  echo "Sorry, Index No Not Exist !";
}
    mysqli_close($con);?>
</body>
</html>