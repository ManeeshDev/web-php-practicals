<?php
  
  session_start();
  if(!isset($_SESSION['username']))
  {
    header('Location:index.php');
  }

  $con=mysqli_connect("localhost","root","","student_marks");
  if(!$con)
  {
    die('Could Not Connect:'.mysqli_connect_error());
  }
  mysqli_select_db($con,"student_marks");

    $indexno=$_REQUEST['ino'];

    $q1=mysqli_query($con,"SELECT * FROM student WHERE IndexNo='".$indexno."' ");  
    //mysqli_real_escape_string($con,$indexno)
    $row=mysqli_fetch_array($q1);

    
    $q2=mysqli_query($con,"SELECT * FROM mark WHERE IndexNo='".$row['IndexNo']."' ");
    // $row2=mysqli_fetch_array($q2);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
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
        background-image: url(images/landscape2.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: 100% 100%;
        /**/
      }
    </style>
</head>
<body>
  <div class="bdydiv">
    <br>
    <div class="logout"><a href="logout.php">Logout</a><br></div>

    <h3 align="center">Final Results</h3><br>


    <form id="form1" name="form1" method="post">
      <table border="0" align="center">
        <tr>
          <td>
            <label for="name"><b>&emsp;Name &emsp;&nbsp;&nbsp;:</b></label>
          </td>
          <td>
            <input type="text" name="name" style="border:none;" class="result" value="<?php echo $row['Name'];?>" readonly >
          </td>
        </tr>
        <tr>
          <td>
            <label for="index"><b>&emsp;Index No :</b></label>
          </td>
          <td>
            <input type="text" name="indexno" style="border:none;" class="result" value="<?php echo $row['IndexNo'];?>" readonly >
          </td>
        </tr>
      </table>
        
    </form>
    <br>

    <table width="50%" border="0" align="center" cellpadding="5" cellspacing="0" >
      <tbody style="background-color:rgba(0,0,0,0.5); color: #fff;">
        <tr>
          <th align="left" style="padding-left: 40px;">Subject</th>
          <th>Marks</th>
        </tr>
        <?php
        //View records
          while($row2=mysqli_fetch_array($q2)) 
          {
            echo "<tr style=\"background-color:rgba(0,0,0,0.5); padding:0px 0px 0px 5px;\">";
            echo "<td style=\"padding:0px 0px 0px 10px;\">".$row2['Subject']."</td>"; // table fields names ex: IndexNo,StName,....etc
            echo "<td style=\"padding:0px 0px 0px 10px;\"align=center>".$row2['Marks']."</td>";
            echo"</tr>";
          }
      ?>
      </tbody>
    </table>
    <br><br>
    <h5 align="center">Copyright &copy; Collage of Technology 2014</h5>
  </div>
</body>
</html>
<!-- 
        
-->