<?php 
   if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Log In | SRG-AMS </title>

    <!--Core CSS -->

    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-switch.css" />
    <!--clock css-->
    <link href="Resources/IMS/js/css3clock/css/style.css" rel="stylesheet">
    <!--jQuery Vdo and Audio Player-->
    <link rel="stylesheet" type="text/css" href="Resources/IMS/js/jplayer/skin/blue.monday/jplayer.blue.monday.css"/>

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />
    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">
    <style type="text/css">
      body{
        display:block;
        overflow:auto;
        height: 100%;
        background-color:#fcfcfc;
      }
    </style>
</head>
  <body>
      <!--FIRST  DIVISION-->
      <div class="col-md-5" style="background-color: white;">
        <div class="login-wrap" >
          <div class="profile-nav alt">
            <section class="panel">
              <div class="user-heading alt clock-row terques-bg" >
                <p class="text-left"><?php echo date('l')?></p>
                <h1><?php echo date('F d, Y')?> </h1>
                <p class="text-left">
                  <?php date_default_timezone_set("Asia/Manila"); echo date('h:i a')?>
                </p>
              </div>
              <ul id="clock">
                  <li id="sec"></li>
                  <li id="hour"></li>
                  <li id="min"></li>
              </ul>
              <br>
              <div style="border-size: 1px">
                <label>Recent Log</label>
                <table  class="display table table-bordered" id="dynamic-table">
                  <tbody>
                    <?php
                        include("db.php");
                        $currdate = date('Y-m-d');
                        $row = NULL;
                        $view_query = mysqli_query($connection,"SELECT * FROM srg_ams_t_time_in where TI_Member_ID = '$ids' ORDER BY TI_No DESC LIMIT 1");
                        if(mysqli_num_rows($view_query) > 0)
                        {
                          while($row = mysqli_fetch_assoc($view_query))
                          {
                            $No = $row["TI_No"];
                            $Member = $row["TI_Member"];
                            $date = new datetime($row["TI_Date_In"]);       
                            $timein = new datetime($row["TI_Time_In"]); 

                            $Ddate = $date->format('F d, Y');
                            $Dtimein = $timein->format('h:i:s A');

                            echo
                              '<tr class="gradeX">
                                <td style="width: 20%; font-size:15px;"><b>Timed-In:</b></td>
                                <td style="width: 25%"> '.$Dtimein.' &nbsp('.$Ddate.')</td>
                              </tr>';
                          }
                        }
                        else if(mysqli_num_rows($view_query) <= 0)
                        {
                          echo
                            '<tr class="gradeX">
                              <td style="width: 20%; font-size:15px;"><b>Timed-In:</b></td>
                              <td style="width: 25%"> --:--:-- &nbsp(--/--/----)</td>
                            </tr>';
                        }

                        $currdate = date('Y-m-d');
                        $row = NULL;
                        $view_query1 = mysqli_query($connection,"SELECT * FROM srg_ams_t_time_out where TO_Member_ID = '$ids' ORDER BY TO_No DESC LIMIT 1 ");
                        if(mysqli_num_rows($view_query) > 0)
                        {
                          while($row1 = mysqli_fetch_assoc($view_query1))
                          {
                            $Noout = $row1["TO_No"];
                            $Memberout = $row1["TO_Member"];
                            $dateout = new datetime($row1["TO_Date_Out"]);       
                            $timeout = new datetime($row1["TO_Time_Out"]); 

                            $Ddateout = $dateout->format('F d, Y');
                            $Dtimeout = $timeout->format('h:i:s A');
                         
                            echo
                              '<tr class="gradeX">
                                <td style="width: 20%; font-size:15px;"><b>Timed-Out:</b></td>
                                <td style="width: 25%"> '.$Dtimeout.' &nbsp('.$Ddateout.')</td>
                              </tr>';
                            }
                        }
                        else if(mysqli_num_rows($view_query) <= 0)
                        {
                          echo
                            '<tr class="gradeX">
                              <td style="width: 20%; font-size:15px;"><b>Timed-Out:</b></td>
                              <td style="width: 25%"> --:--:-- &nbsp(--/--/----)</td>
                            </tr>';
                        }
                    ?>      
                  </tbody>
                </table>
              </div>
            </section>
          </div>
        </div>

      <!--SECOND DIVISION-->

      <div class="col-md-4">
        <form class="form" method="POST" style="background-color: white">
          <a  href="SRGAMS_Login.php" class="btn btn-info" style="margin:10px; font-family:verdana; color:white;">
            <i class="fa fa-reply"></i> Go Back
          </a>
          <a data-toggle="modal" data-target="#Change" data-backdrop="false" class="btn btn-success" style="margin:5px;font-family:verdana; color:white;">
            <i class="fa fa-refresh"></i>  Change Password
          </a>
          <center>
            <div class="col-md-12">
              <?php
                  include ("db.php");
                  $SRGSQL = 'SELECT MEM.ID,
                                    MEM.First_Name,
                                    MEM.Last_Name,
                                    MEM.Profile_Picture,
                                    aes_decrypt(ACC.ACC_Password,"SRG-MIS") AS ACC_Password
                            FROM srg_r_members AS MEM
                            INNER JOIN srg_r_accounts AS ACC 
                              ON ACC.ACC_Ref_Member = MEM.ID
                            WHERE MEM.ID = '.$ids.'';

                  $SRGQuery = mysqli_query($connection,$SRGSQL) or die (mysqli_error($connection));
                  if(mysqli_num_rows($SRGQuery) > 0)
                  {
                    while($row = mysqli_fetch_assoc($SRGQuery))
                    {
                      $MemID = $row["ID"];
                      $Fname = $row["First_Name"];
                      $Lname = $row["Last_Name"];
                      $MemPic = $row["Profile_Picture"];
                      $password = $row["ACC_Password"];

                      if(isset($_POST['signin']))
                      {
                        if($_POST['validator'] == $password) 
                        {   
                          date_default_timezone_set("Asia/Manila"); 
                          $Fullname = $Fname.' '.$Lname;
                          $timein = date('H:i:s');
                          $datein = date('Y-m-d');

                          $LoginSQL = 'INSERT INTO srg_ams_t_time_in 
                                                    (TI_Member,
                                                    TI_Date_In, 
                                                    TI_Time_In, 
                                                    TI_Member_ID) 
                                      VALUES ("'.$Fullname.'", 
                                              "'.$datein.'", 
                                              "'.$timein.'", 
                                              '.$MemID.')';

                          $LogoutQuery = mysqli_query($connection,$LoginSQL) or die (mysqli_error($connection));

                          $TimeRefSQL = 'SELECT TIME_Punctual_Ref, 
                                                TIME_OnT_Ref, 
                                                TIME_Late_Ref, 
                                                TIME_Grace_Ref AS Tgrace 
                                        FROM `srg_ams_r_time_requirement` 
                                        WHERE TIME_No = 1';

                          $TimeRefQuery =  mysqli_query($connection,$TimeRefSQL) or die (mysqli_error($connection));
                          while($row = mysqli_fetch_assoc($TimeRefQuery))
                          {
                            $Punctual = new DateTime($row["TIME_Punctual_Ref"]);
                            $Ontime = new DateTime($row["TIME_OnT_Ref"]);
                            $Late = new DateTime($row["TIME_Late_Ref"]);
                            $Tgrace = new DateTime($row["Tgrace"]); 

                            $FPunctual = $Punctual->format('H:i:s');
                            $FTgrace = $Tgrace -> format('H:i:s');
                            $FOntime = $Ontime -> format('H:i:s');
                            $FLate = $Late -> format('H:i:s');
                          
                            if(time() <= strtotime($FOntime))
                            {
                              $AttendanceSQL = 'INSERT INTO srg_ams_t_attendance 
                                                            (A_Member, 
                                                            A_Date_Attend, 
                                                            A_Remarks, 
                                                            A_Status, 
                                                            A_Time_Remarks)
                                                VALUES ("'.$Fullname.'", 
                                                        "'.$datein.'", 
                                                        "PRESENT", 
                                                        "Logged-In", 
                                                        "Punctual") ';
                               $Attendance = mysqli_query($connection,$AttendanceSQL) or die (mysqli_error($connection));
                            }

                            if(time() >= strtotime($FOntime) && time() <= strtotime($FTgrace))
                            {
                               $AttendanceSQL = 'INSERT INTO srg_ams_t_attendance 
                                                            (A_Member, 
                                                            A_Date_Attend, 
                                                            A_Remarks, 
                                                            A_Status, 
                                                            A_Time_Remarks)
                                                VALUES ("'.$Fullname.'", 
                                                        "'.$datein.'", 
                                                        "PRESENT", 
                                                        "Logged-In", 
                                                        "Ontime") ';
                               $Attendance = mysqli_query($connection,$AttendanceSQL) or die (mysqli_error($connection));
                            }

                            if(time() >= strtotime($FLate))
                            {
                               $AttendanceSQL = 'INSERT INTO srg_ams_t_attendance 
                                                            (A_Member, 
                                                            A_Date_Attend, 
                                                            A_Remarks, 
                                                            A_Status, 
                                                            A_Time_Remarks)
                                                VALUES ("'.$Fullname.'", 
                                                        "'.$datein.'", 
                                                        "PRESENT", 
                                                        "Logged-In", 
                                                        "Late")';
                               $Attendance = mysqli_query($connection,$AttendanceSQL) or die (mysqli_error($connection));
                            } 
                          }
                          echo 
                          '<br>
                          <label style="font-size: 18px; color: #64dd17; font-weight: 10px">
                              You have successfully Timed-In!
                          </label>';
                          echo 
                          '<script type="text/javascript"> 
                            alert("You have successfully logged in!");
                           </script>';
                          echo '<script>setTimeout(location.href = "SRGAMS_Login.php",0);</script>';
                        }
                        else if($_POST['validator'] != $password) 
                        {
                          echo  
                          "<br>
                          <label style='font-size: 18px; color: #f44336; font-weight: 10px'>
                              Incorrect Password!
                          </label>";
                        }
                      }      
                      if(isset($_POST['signout']))
                      {
                        if($_POST['validator'] == $password) 
                        {
                          date_default_timezone_set("Asia/Manila"); 
                          $Fullname = $Fname.' '.$Lname;
                          $timeout = date('H:i:s');
                          $dateout = date('Y-m-d');

                          $LogoutSQL = 'INSERT INTO srg_ams_t_time_out
                                                    (TO_Member, 
                                                    TO_Date_Out, 
                                                    TO_Time_Out, 
                                                    TO_Member_ID) 
                                        VALUES ("'.$Fullname.'", 
                                                "'.$dateout.'", 
                                                "'.$timeout.'", 
                                                '.$MemID.')';
                          $LogoutQuery = mysqli_query($connection,$LogoutSQL) or die (mysqli_error($connection));
                          $SignoutSQL = 'UPDATE srg_ams_t_attendance 
                                          SET A_Status = "Logged-Out" 
                                          WHERE A_Member = "'.$Fullname.'"';
                          $SignoutQuery = mysqli_query($connection,$SignoutSQL) or die (mysqli_error($connection)); 

                          echo 
                          "<br>
                          <label style='font-size: 18px; color: goldenrod; font-weight: 10px'>
                            You have successfully Timed-Out!
                          </label>";
                          echo 
                          '<script type="text/javascript">
                            alert("You have successfully logged out!"");
                          </script>';
                          echo "<script>setTimeout(location.href = 'SRGAMS_Login.php',0);</script>";
                        }
                        else if($_POST['validator'] != $password) 
                        {
                          echo  
                          "<br>
                          <label style='font-size: 18px; color: #f44336; font-weight: 10px'>
                              Incorrect Password!
                          </label>";
                        }
                      }  
                    }
                  }
                ?>
              <div class="col-md-12" style="text-align: center; margin-top: 20px">
                <img src="Resources/Images/Members/<?php echo $MemPic ?>" style="width: 60%; height: 60%"/><br>
                <label style="margin-top: 5px; font-size: 20px;"><?php echo $Fname ?>'s</label>
              </div>
            </div>
            <label style="font-size: 25px; font-family: Calibri light">Attendance Log</label>
            <div class="login-wrap">
              <div class="user-login-info">
                 <input id="validator" type="password" name="validator" class="form-control" placeholder="Password" required />
              </div>
              <?php
                $Fullname = $Fname.' '.$Lname;
                $row = NULL;
                $currdate = date('Y-m-d');
                $view_query = mysqli_query($connection,"SELECT * FROM srg_ams_t_attendance where A_Date_Attend = '$currdate' and A_Member = '$Fullname' ");
                if(mysqli_num_rows($view_query) > 0)
                {
                  while($row = mysqli_fetch_assoc($view_query))
                  {    
                    $Member = $row["A_Member"];    
                    $remark = $row["A_Remarks"]; 
                    $status = $row["A_Status"]; 

                    if($status == 'Logged-In')
                    {
                      echo  
                      "<button class='btn btn-lg btn-login btn-block' type='submit' style='background-color: red; color:white' name='signout'>
                       <i class='fa fa-sign-out'></i> Sign Out</button>";
                    }
                    else if($status == 'Logged-Out')
                    {
                      echo  
                        "<label style='font-size: 15px'>You've been logged-out for today, <br> Come Back Tomorrow!</label>";
                      echo 
                        "<script> document.getElementById('validator').disabled = true; </script>";
                    }
                  }
                }
                else
                {
                  echo  
                    "<button class='btn btn-lg btn-login btn-block' type='submit' style='background-color: blue; color:white' name='signin'>
                     <i class='fa fa-sign-in'></i>   Sign In</button>";
                }                                      
              ?>
            </div>
          </center>    
        </form>
      </div>

    <!-- <form role="form" id="formChangePass" method="POST">
      <div class="modal fade in" id="Change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" style="font-size:25px"><i class="fa fa-key"></i>Change Password</h4>
            </div>
            <div class="modal-body" style="overflow:auto;">
              <div class="col-md-12">
                  <div class="col-md-12">
                    <?php  
                      include('db.php');
                      $sql = 'SELECT * 
                              FROM srg_r_members AS EP 
                              JOIN srg_r_accounts AS U 
                                ON U.ACC_Ref_Member = EP.ID 
                              WHERE EP.ID = '.$ids.'';
                      $result = mysqli_query($connection, $sql) or die (mysqli_error($connection));
                      while ($row = mysqli_fetch_array($result)) 
                      { 
                        $uid = $row['ACC_ID'];
                        $uuser = $row['ACC_Username'];
                        $upass = $row['ACC_Password'];
                        $mid = $row['ACC_Ref_Member'];
                        echo 
                        '<div class="col-md-12">
                            <input style="color: black;" type="text" name="ID" class="hidden" required="" maxlength="25" value="'.$uid.'">
                            <input style="color: black;" type="text" name="MEMID" class="hidden" required="" maxlength="25" value="'.$mid.'">
                        </div>';
                      }
                    ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label style="font-size: 15px">Current Password:</label> 
                        <input style="color: black;" id="CurPassword" type="password" name="CurPass" class="form-control" required="" maxlength="50" />
                      </div>
                      <div class="form-group">
                        <label style="font-size: 15px">New Password:</label> 
                        <input style="color: black;" id="newPassword" type="password" name="NewPass" class="form-control" required="" maxlength="50" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label style="font-size: 15px">Confirm Password:</label> 
                        <input style="color: black;" id="confirmPassword" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="square-red single-row">
                        <div class="checkbox">
                            <input id="check" type="checkbox" style="background-color: maroon">
                            <label style="font-size: 15px">Show Password</label> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger" type="button">
                  <i  class="fa fa-times"></i> Cancel
                </button>
                <button id="CPassSubmit" type="button" class="btn btn-success" name="Save"">
                  <i  class="fa fa-check"></i> Save
                </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- <style type="text/css">
      .modal::after 
      {
          content: "";
          background: black;
          opacity: 0.5;
          top: 0;
          left: 0;
          bottom: -300px;
          right: 0;
          position: absolute;
          z-index: -1;

          .field-icon 
          {
          float: right;
          margin-left: -25px;
          margin-top: -25px;
          position: relative;
          z-index: 2;
          }

          .container
          {
              padding-top:50px;
              margin: auto;
          }   
      }
    </style> -->
<!--header end-->
    <!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="Resources/IMS/js/jquery.js"></script>
<script src="Resources/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="Resources/IMS/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
<script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="Resources/IMS/js/jquery.nicescroll.js"></script>

<script src="Resources/IMS/js/bootstrap-switch.js"></script>

<!-- jQuery audio VDO player  -->
<script type="text/javascript" src="Resources/IMS/js/jplayer/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="Resources/IMS/js/jplayer/jplayer.init.js"></script>

<!--common script init for all pages-->
<script src="Resources/IMS/js/scripts.js"></script>

<!--toggle initialization-->
<script src="Resources/IMS/js/toggle-init.js"></script>

<!--clock init-->
<script src="Resources/IMS/js/css3clock/js/css3clock.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    // Password Validation
    $('#CPassSubmit').on('click',function(){
      var ID = '<?php echo $ids; ?>';
      var newPassword = $("#newPassword").val();
      var confirmPassword = $("#confirmPassword").val();
      var currentPassword = $("#CurPassword").val();

      if(newPassword != confirmPassword) 
      {
        alert("Passwords Don't Match");
      } 
      else 
      {
        $.ajax({
          url:'AMS/AMSCheckPassword.php',
          type:'post',
          data:{ID:ID,CPass:currentPassword,NPass:newPassword},
          cache:false,
          dataType:'json',
          success:function(data){
            alert(data['result']);
            window.location.reload(); 
          },
          error:function(){
            alert('No Function');
          }
        });
      }
    });

    // Show Password
    $(document).on('click','#check',function(){
      var newpass = document.getElementById('newPassword');
      var confpass = document.getElementById('confirmPassword');
      if(document.getElementById('check').checked)
      {
        newpass.setAttribute('type','text');
        confpass.setAttribute('type','text');
      }
      else
      {
        newpass.setAttribute('type','password');
        confpass.setAttribute('type','password');
      }
    });
  });
    //custom select box
    $(function(){
        $('select.styled').customSelect();
    });
</script>
</body>
</html>
