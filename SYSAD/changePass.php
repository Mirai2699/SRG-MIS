<?php
  include('../db.php');

  $No = $_POST['ID'];
  $pass = $_POST['NewPass'];
  $conpass = $_POST['ConPass'];
  if($pass == $conpass)
  {
    $query = mysqli_query($connection,"UPDATE srg_r_accounts SET ACC_Password =    '$pass' WHERE ACC_ID = '$No'");

      //header('Location:../../Portal.php');
      //echo "Logging out.";
   echo "<script type=\"text/javascript\">".
             "alert
             ('YOUR PASSWORD HAS BEEN CHANGED!');".
            "</script>";
   echo "<script>setTimeout(\"location.href = 'SAmainpage.php';\",0);</script>";
   }
  else if($pass != $conpass)
  {
     echo "<script type=\"text/javascript\">".
             "alert
             ('Password Do Not Match!');".
            "</script>";
    echo "<script>setTimeout(\"location.href = 'SAmainpage.php';\",0);</script>";
   // echo "<label style='color:red ; margin-left: 5%; font-weight: 10px; font-size: 15px'>Password Do Not Match!</label>";
  }
?>

