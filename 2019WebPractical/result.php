<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
  <br>&nbsp;

  <form id="form1" name="form1" method="post">

<?php
  $con=mysqli_connect("localhost","root","","abc_ti");
  if(!$con)
  {
    die('Could Not Connect:'.mysqli_connect_error());
  }
  mysqli_select_db($con,"abc_ti");

    $indexno=$_REQUEST['ino'];

    $q1=mysqli_query($con,"SELECT * FROM user WHERE IndexNo='".$indexno."' ");  //mysqli_real_escape_string($con,$indexno)
    $row=mysqli_fetch_array($q1);

    $q2=mysqli_query($con,"SELECT * FROM result WHERE IndexNo='".$row['IndexNo']."' ");
    // $row2=mysqli_fetch_array($q2);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
?>
      <label for="name"><b>&emsp;Name &emsp;&nbsp;&nbsp;:</b></label>
      <input type="text" name="name" class="result" value="<?php echo $row['Name'];?>" readonly >
      <br>
      <label for="index"><b>&emsp;Index No :</b></label>
      <input type="text" name="indexno" class="result" value="<?php echo $row['IndexNo'];?>" readonly  >
  </form>
  <br>

  <h2 align="center"><u>Results</u></h2><br>
  <table width="50%" border="1" align="center" cellpadding="5" cellspacing="0" >
    <tbody>
      <tr style="background-color:#F0FFFF;">
        <th scope="col">Subject</th>
        <th scope="col"><p>Marks</p></th>
      </tr>
      <tr>
<?php
      //View records

      while($row2=mysqli_fetch_array($q2)) 
      {
        echo "<tr style=\"background-color:#F0FFFF;\">";
        echo "<td>".$row2['Subject']."</td>"; // table fields names ex: IndexNo,StName,....etc
        echo "<td>".$row2['Marks']."</td>";
        echo"</tr>";
      }

      // while($row2)  // correct, but firstly define the variable on top -> $row2=mysqli_fetch_array($q2); 
      // {
      //   echo "<tr>";
      //   echo "<td>".$row2['Subject']."</td>"; // correct 
      //   echo "<td>".$row2['Marks']."</td>";
      //   echo"</tr>";
      //   $row2=mysqli_fetch_array($q2);
      // }

      // do  // correct, but firstly define the variable on top -> $row2=mysqli_fetch_array($q2); 
      // {
      //   echo "<tr>";
      //   echo "<td>".$row2['Subject']."</td>"; 
      //   echo "<td>".$row2['Marks']."</td>";
      //   echo"</tr>";
      // } while ($row2=mysqli_fetch_array($q2));
?>
</tr>
    </tbody>
  </table>

</body>
</html>
<!-- 
        Fernando
        IPH@F
        
        Silva
        HJM#S
        
        Perera
        PDU$P 
-->