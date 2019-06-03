<?php 
     include ("../db.php");
     session_start();
        $type = $_SESSION['TYPE'];
        if(!isset($_SESSION['UserName']) && $type!="Project-Manager"){
          header('Location: 404.html?err=1');
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">

    <link href="../Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--calendar css-->
    <link href="../Resources/IMS/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../Resources/IMS/css/style.css" rel="stylesheet">
    <link href="../Resources/IMS/css/style-responsive.css" rel="stylesheet" /> 

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand" style="background-color: #90caf9">
     <a href="#" class="logo">
        <img src="../Resources/images/srg-logo.png" alt="" style="width: 40%; height: 15%;">
        <label style="font-family: agency fb; font-size: 30px; color: white "><i>A  M  S</i></label>
    </a>
    <!--
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>-->
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-->
        <li id="ReturnNotif" class="dropdown">
           
        <label style="margin-top: 1px; font-size: 21px; font-family: agency fb">
         SRG Attendance Monitoring System
        </label>
    </ul>
    <!--  notification end -->
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                   <?php  
                    include('../db.php');

                     $sql = "SELECT * FROM srg_r_members AS EP JOIN srg_r_accounts AS U ON U.ACC_Ref_Member = EP.ID WHERE U.ACC_Username = '".$_SESSION['Logged_In']."'";
                    $result = mysqli_query($connection, $sql);

                   while ($row = mysqli_fetch_array($result)) 
                   {
                      $pic = $row['Profile_Picture'];
                     if($pic != NULL)
                     {
                         echo "<img src='../Resources/Images/Members/".$pic."'>
                        ";
                     }
                     else
                         echo '<img src="default.png">';
                   
                   }
                  ?> 
                
                <span class="username"> <?php echo $_SESSION['Logged_In']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a data-toggle="modal" data-target="#Change" data-backdrop="false"><i class="fa fa-cog"></i>Change Password</a></li>
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
       <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content" >
                  <div class="modal-header">
                      <h4 class="modal-title" style="font-size: 25px"><i  class="fa fa-key"></i>   Change Password</h4>
                  </div>
                  <div class="modal-body" style="height:290px;">

              <form role="form" method="POST" action="changePass.php">
                      <div class="col-md-12">
                        <div class="col-md-12">
                        <?php  
                            include('../db.php');

                            $sql = "SELECT * FROM pso_r_employee_profile AS EP JOIN pso_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['Logged_In']."'";
                            $result = mysqli_query($connection, $sql);

                           while ($row = mysqli_fetch_array($result)) 
                           { 
                             $uid = $row['U_ID'];
                             $uuser = $row['U_USERNAME'];
                             $upass = $row['U_PASSWORD'];
                              
                         ?>

                      <div class="col-md-12">
                               <input style="color: black;" type="text" name="ID" class="hidden" required="" maxlength="25" 
                           value="<?php echo $uid; ?>" />
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label style="font-size: 15px">Current Password:</label>
                                  <input style="color: black;" id="password" type="password" name="Pass" class="form-control input-frield" required="" data-toggle="password" maxlength="50" 
                                  value="<?php echo $upass; ?>"  />
                                  
                              </div>
                          </div>
                          <?php
                            }
                          ?> 
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label style="font-size: 15px">Confirm Password:</label> 
                                  <input style="color: black;" id="confirmPassword" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
                                  
                              </div>
                          </div>
                           <div class="col-md-12">
                              <div class="square-red single-row">
                                  <div class="checkbox ">
                                      <input id="check" type="checkbox" onclick="showPass();"  style="background-color: maroon">
                                      <label style="font-size: 15px">Show Password</label> 
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-12">
                                  <div style="padding: 1px; margin-bottom: 10px; background-color: gray;">
                                  </div>
                              </div>
                          </div>
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-success" name="Save"">
                              <i  class="fa fa-check"></i>   Save
                            </button>&nbsp&nbsp&nbsp
                            <button data-dismiss="modal" class="btn btn-default" style="background-color: maroon; color: white" name="cancel" ><i  class="fa fa-times"></i>  Cancel</button>
                          </div>
                      </div>
                      <!--
                      <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="final" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body" style="height:250px;">
                                          <button type="submit" class="btn btn-success" name="Save" style="padding-left: 10px; margin-left: 3%; margin-top: 1.3%">
                                                        Ok
                                           </button>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                  </form>
                  </div>
              </div>
          </div>
      </div>
    <style type="text/css">
                .modal::after {
          content: "";
          background: black;
          opacity: 0.5;
          top: 0;
          left: 0;
          bottom: -300px;
          right: 0;
          position: absolute;
          z-index: -1;

          .field-icon {
          float: right;
          margin-left: -25px;
          margin-top: -25px;
          position: relative;
          z-index: 2;
        }

        .container{
          padding-top:50px;
          margin: auto;
        }   
        }
    </style>
    <!--Show Password-->
    <script type="text/javascript">
    function showPass()
    {
      var pass = document.getElementById('password');
      var confpass = document.getElementById('confirmPassword');
      if(document.getElementById('check').checked)
      {
        pass.setAttribute('type','text');
        confpass.setAttribute('type','text');
      }
      else
      {
        pass.setAttribute('type','password');
        confpass.setAttribute('type','password');
      }  
    }    
    </script>
    <!--Password Validation-->
    <script type="text/javascript">
        var password = document.getElementById("password")
       ,confirmPassword = document.getElementById("confirmPassword");

        function validatePassword()
        {
          if(password.value != confirmPassword.value) 
          {
            confirmPassword.setCustomValidity("Passwords Don't Match");
            $('#myform').on('submit', function(ev) 
            {
                $('#myModal').modal('show');
            });

          } else 
          {
            confirmPassword.setCustomValidity(''); 
          }
        }

        password.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;
    </script>
</header>
<!--header end-->