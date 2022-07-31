<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
<?php 

 // Inialize session
// session_start();

// Check, if user is already login, then jump to secured page
// if (isset($_SESSION['username'])) {
//         header('Location:login.php');
// }

// username and password sent from Form 
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 
    // Include database connection settings
    $con=mysqli_connect("localhost","root","","abc_ti");
      if(!$con)
      {
        die('Could Not Connect:'.mysqli_connect_error());
      }
    mysqli_select_db($con,"abc_ti");

    // Retrieve username and password from database according to user's input
    $uname = mysqli_real_escape_string($con,$_POST['username']);
    $pwrd = mysqli_real_escape_string($con,$_POST['password']); 
  
    $login = mysqli_query($con,"SELECT * FROM user 
            WHERE (UserName = '" . $uname . "') and (Password = '" . $pwrd . "')");

    // Check username and password match
    if (mysqli_num_rows($login) == 1) 
    {
        // Set username session variable
      // $_SESSION['username'] = $_POST['username'];
      // Jump to secured page

      /*header("location:ABC_Training_Institute.html");*/

      $q1=mysqli_query($con,"SELECT Name,IndexNo FROM user WHERE (UserName='".$uname."' and Password='".$pwrd."') ");
      //$result=mysqli_query($con,$q1);
      $row=mysqli_fetch_array($q1);
      ?> 

      <script>parent.rightiframe.location = "result.php?ino=<?php echo $row['IndexNo'];?>";</script> 
      <?php // to load page in Right side iframe

      $msg="&emsp;&emsp;&emsp; You are Successfully Submited !!! &emsp;&emsp;&nbsp;&nbsp;";
       ?>
      <p style="color:#008080; background-color:#00FF7F; padding: 5px; text-align: center; ">
      <?php echo $msg;?></p><?php
    }

    //If login user name or password is invalid
    else { 
       $error="&emsp; Your User Name or Password is invalid !!! &emsp;";
       ?>
      <p style="color:#F0FFFF; background-color:#FF0000; padding: 5px; text-align: center; ">
        <?php echo $error;?></p><?php
     }
}
?>
  <form id="form1" name="form1" method="post" action="login.php" >
    <br><br><br>
    <center>
    <lable for="uname" >User Name</lable><br>
    <input type="text" name="username" id="" placeholder="Your user name..." required >
    <br><br>
    <label for="password">Password</label><br>
    <input type="Password" name="password" id="" placeholder="Your password..." required >
    <br><br>
    <input type="submit" value="Submit">
    </center>
  </form>



</body>
</html>