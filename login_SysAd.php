<?php
  //include ("db.php");
  $connection = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
  if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM pso_r_user WHERE U_USERNAME = '".$username."' and U_PASSWORD = '".$password."'";
    $result = mysqli_query($connection,$query) or die(mysqli_error());
    if (mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $user_id = $row['EP_ID'];
        $UserName = $row['U_USERNAME'];
        $type = $row['U_TYPE'];
        $account = $row['U_ID'];
      }
      // echo 'OK!';
      session_start();
      $_SESSION['Logged_In'] = $UserName;
      $_SESSION['TYPE'] = $type;
      $_SESSION['AccountID'] = $account;
      
      if($_SESSION['TYPE'] == "SysAd")
      {
        $header ='Location:SYSAD/SAmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
        header($header);
      }
    }
    else
    {
      echo "<p style='color:red ; margin-left: 15%'>Incorrect Username or Password! </p>";         
    }
  }
?>