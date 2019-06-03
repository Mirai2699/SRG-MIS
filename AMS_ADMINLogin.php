<?php
  include ("db.php");
        
    if(isset($_POST['submit']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $query = "SELECT * FROM srg_r_accounts WHERE ACC_Username = '".$username."' and aes_decrypt(ACC_Password,'SRG-MIS') = '".$password."'";

      $result = mysqli_query($connection,$query) or die(mysqli_error());
      if (mysqli_num_rows($result) > 0)
      {
       while($row = mysqli_fetch_assoc($result))
         {
           $user_id = $row['ACC_ID'];
           $UserName = $row['ACC_Username'];
           $type = $row['ACC_Type'];
           $account = $row['ACC_Ref_Member'];
         }
          
      session_start();
      
      $_SESSION['ID'] = $user_id;
      $_SESSION['Logged_In'] = $UserName;
      $_SESSION['TYPE'] = $type;
      $_SESSION['AccountID'] = $account;  


      if($_SESSION['TYPE'] == "Project-Manager")
      {
        $header ='Location:AMS/AMSmainpage.php? username='.$UserName.'';
        header($header);

        $query = "INSERT INTO srg_r_user_log (UL_Username, UL_Type) VALUES('$UserName', '$type')";
        mysqli_query($connection,$query);
      }
      else if($_SESSION['TYPE'] == "Treasurer")
      {
        
        echo "<script type=\"text/javascript\">".
                   "alert
                   ('You are not authorized!');".
                   "</script>";
        echo "<script>setTimeout(\"location.href = 'SRGAMS_Login.php'\",0);</script>";     
      }
      else if($_SESSION['TYPE'] == "Member")
      {
         echo "<script type=\"text/javascript\">".
                   "alert
                   ('You are not authorized!');".
                   "</script>";
         echo "<script>setTimeout(\"location.href = 'SRGAMS_Login.php'\",0);</script>";    
      }
      else if($_SESSION['TYPE'] == "SystemAdmin")
      {
        echo "<script type=\"text/javascript\">".
                   "alert
                   ('You are not authorized!');".
                   "</script>";
         echo "<script>setTimeout(\"location.href = 'SRGAMS_Login.php'\",0);</script>";     
      }
     
     


      
    }
    else
    {
       
         echo "<script type=\"text/javascript\">".
                   "alert
                   ('Incorrect Username or Password!');".
                   "</script>";
         echo "<script>setTimeout(\"location.href = 'SRGAMS_Login.php'\",0);</script>";         
    }
  }
?>