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
    <!--Core CSS -->
    <link href="../Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Resources/IMS/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../Resources/IMS/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../Resources/IMS/css/clndr.css" rel="stylesheet">
    <!--calendar css-->
    <link href="../Resources/IMS/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet">
    <!--clock css-->
    <link href="../Resources/IMS/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../Resources/IMS/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="../Resources/IMS/css/style.css" rel="stylesheet">
    <link href="../Resources/IMS/css/style-responsive.css" rel="stylesheet"/>

    <link rel="icon" href="../Resources/images/srg-logo.png" sizes="32x32">
    <!--icheck-->
    <link href="../Resources/IMS/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/red.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/green.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/purple.css" rel="stylesheet">

    <link href="../Resources/IMS/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/yellow.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/purple.css" rel="stylesheet">

    <link href="../Resources/IMS/js/iCheck/skins/flat/grey.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/red.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/blue.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/yellow.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/purple.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/bootstrap-datepicker/css/datepicker.css" />

    <link href="../Resources/IMS/js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../Resources/IMS/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">  
    <style type="text/css">
      @font-face {
      font-family: "TitillumWeb-Light";
      src: url(../Resources/TitilliumWeb-Light.ttf) format("truetype");
      }
      .logo{
        background: url('../Resources/images/BG2.jpg') center center no-repeat;
        background-size: cover;
      }
      .logo img{
        display:flex;
        margin: auto;
        margin-top: 5%;
        vertical-align: middle;
        width:7em;
      }
    </style>

</head>
<body>
<script src="../Resources/IMS/js/code/highcharts.js"></script>
<script src="../Resources/IMS/js/code/modules/data.js"></script>
<script src="../Resources/IMS/js/code/modules/drilldown.js"></script>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand logo">
  <img src="../Resources/images/srg-logo.png">
    <!-- 
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div> -->
</div>
<!--logo end-->


<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-->
        <li id="ReturnNotif" class="dropdown">
           
        <label style="margin-top: 1px; font-size: 18px; font-family: TitillumWeb-Light">
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
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="font-family: TitillumWeb-Light"><i class="fa fa-key"></i>&nbsp;Change Password</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label style="font-size: 15px">Current Password:</label>
          <input style="color: black;" id="password" type="password" name="Pass" class="form-control input-frield" required="" data-toggle="password" maxlength="50"/>
        </div>
        <div class="form-group">
          <label style="font-size: 15px">New Password:</label> 
          <input style="color: black;" id="newPassword" type="password" name="NewPass" class="form-control" required="" maxlength="50" />
        </div>
        <div class="form-group">
          <label style="font-size: 15px">Confirm New Password:</label> 
          <input style="color: black;" id="confirmPassword" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
        </div>
        <div class="square-red single-row">
          <div class="checkbox ">
            <input id="check" type="checkbox" onclick="showPass();"  style="background-color: maroon">
            <label style="font-size: 15px">Show Password</label> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="formSubmit" type="button" class="btn btn-success" name="Save" onclick="changePass()"><i  class="fa fa-check"></i>&nbsp;Save
        </button>&nbsp;
        <button data-dismiss="modal" class="btn btn-default" style="background-color: maroon; color: white" name="cancel" ><i  class="fa fa-times"></i>&nbsp;Cancel</button>
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
<script type="text/javascript">
  function changePass(){
    let CID = '<?php echo $_SESSION["ID"]?>';
    if($('#password').val() != '')
    {
        if($('#newPassword').val() == $('#confirmPassword').val())
        {
            let NPass = $('#newPassword').val();
            let CPass = $('#password').val();
            $.ajax({
                url:'AMSCheckPassword.php',
                type:'POST',
                cache:false,
                data:{ID:CID,CPass:CPass,NPass:NPass},
                dataType:'JSON',
                success:function(data){
                    alert(data['result']);
                    location.reload();
                },
                error:function(data){
                    alert('Error');
                }
            });
        }
        else
        {
            alert('Password not matched.');
        }
    }
    else
    {
        alert('Please enter your current password.');
    }
    return(false);
  }
function showPass()
{
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
}    
</script>
</header>
<!--header end-->