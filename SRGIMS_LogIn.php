<?php 
    include('db.php');
    date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Log In | SRG-IMS </title>

    <!--Core CSS -->

    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
    <link href="Resources/FontAwesome/css/all.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-switch.css" />
    <!--clock css-->
    <link href="Resources/IMS/js/css3clock/css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />
    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">
    <style type="text/css">
        @font-face {
            font-family: "TitillumWeb-Bold";
            src: url(Resources/TitilliumWeb-Bold.ttf) format("truetype");
        }
        @font-face {
            font-family: "TitillumWeb-Light";
            src: url(Resources/TitilliumWeb-Light.ttf) format("truetype");
        }
        body{
            height: -webkit-fill-available;
            background-color:#fcfcfc; 
            display: inline-flex;
            overflow: hidden;
        }
        button{
            font-family:TitillumWeb-Light;
            font-weight: bold;
        }
        .modal-dialog {
            top:50% !important;
            transform: translate(0, -50%) !important;
            -ms-transform: translate(0, -50%) !important;
            -webkit-transform: translate(0, -50%) !important;
          }
        .formInput{
            margin-bottom: 5%;
        }
        .formBtnIn{
            background-color: #37474f;
            color: white;
        }
        .formBtnIn:hover{
            background-color:#3bff38;
            color: #fff;
            box-shadow: 0 0 0 3px #62ff2d;
            transition: .5s;
        }
        .changeBtn{
            background-color: #37474f;
            color: white;
            font-family:TitillumWeb-Light; 
            font-weight:bold; 
        }
        .changeBtn:hover{
            background-color:#fcfcfc;
            color: #37474f;
            box-shadow: 0 0 0 3px #37474f;
            transition: .5s;
            font-family:TitillumWeb-Light; 
            font-weight:bold; 
        }
        .changeBtn:onclick{
            background-color: #37474f;
            color: white;
            font-family:TitillumWeb-Light; 
            font-weight:bold;
        }
        .pageTitle{
            font-family:TitillumWeb-Light; 
            font-weight:bold; 
            font-size: 16px; 
            color:#303030;
            margin-top: 5%;
            margin-left: 5%;
            display: block;
        }
        .pageCredit{
            font-family:TitillumWeb-Light; 
            font-weight:bold; 
            margin: auto;
            padding: auto; 
            font-size: 9px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bckBtn{
            display: inline-block; 
            position: absolute; 
            right:1%;
            background-color:#37474f;
            color: #fff;
        }
        .bckBtn:hover{
            background-color: #fcfcfc;
            color: #37474f;
            box-shadow: 0 0 0 3px #37474f;
            transition: .5s;
        }
        .formBG{
            background-image: url("Resources/images/BG1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: inset 0 0 7px #303030;
        }
        .ClockDisplay{
            font-family:TitillumWeb-Bold;
            font-size: 60px;
            position: absolute; 
            bottom:5%;
            right:33%;
            color:#fcfcfc;
            filter: blur(0px);
            z-index: 999;
        }
        .DateDisplay{
            font-family:TitillumWeb-Light;
            font-size: 20px;
            position: absolute; 
            bottom:3%;
            right:33%;
            color:#fcfcfc;
            filter: blur(0px);
            z-index: 999;
        }
        .TimeTable{
            margin: 0; 
            padding: 0; 
            justify-content: center; 
            align-items: center;
            font-size: 1em;
            font-weight: bold;
            color: #37474f;
        }
    </style>
</head>
  <body>
    <div style="width: 70%;">
        <span id="ClockDisplay" class="ClockDisplay" style="color: black;">time</span>
        <span id="DateDisplay" class="DateDisplay" style="color: black;">date</span>

        <img src="Resources/images/IMS.jpg" width="100%" height="100%" style="filter: blur(0px); z-index: 0;">
    </div>
    <div class="formBG" style="width: 30%;">
        <div class="pageTitle">
            <span>Inventory Management System</span>
            <button id="bckBtn" class="btn btn-sm btn-round bckBtn"><i class="fas fa-chevron-left"></i></button>
        </div>
        <div style="margin-top:20%; padding-left: 10%; padding-right: 10%;">
            <div style="display: flex; justify-content: center; align-items: center; margin:10%;">
                <img src="Resources/images/srg-7th.png" width="150px" style="border-radius:50%; box-shadow: 0 0 10px #37474f">
            </div>
                <input id="formUser" type="text" name="Username" placeholder="Username" class="form-control formInput" required="">
                <input id="formPass" type="password" name="Password" placeholder="Password" class="form-control formInput" required="">
                <button id="formSubmit" class="btn btn-sm form-control formInput formBtnIn"> LOGIN</button>
        </div>
        <div>
            <span class="pageCredit">Developed by PUPQC Software Research Group 7th Generation, 2018</span>
        </div>
        <!-- <div style="display: inline-flex; position: absolute; bottom: 3%; right:1%;">
            <button class="btn btn-sm btn-round changeBtn" data-toggle="modal" data-target="#ChangePass"><i class="fas fa-feather-alt"></i> Change Password</button>
        </div> -->
    </div>
    <!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="Resources/IMS/js/jquery.js"></script>
<script src="Resources/bs3/js/bootstrap.min.js"></script>
<!-- <script class="include" type="text/javascript" src="Resources/IMS/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
<script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="Resources/IMS/js/jquery.nicescroll.js"></script> -->
<script src="Resources/IMS/js/bootstrap-switch.js"></script>

<!--common script init for all pages-->
<script src="Resources/IMS/js/scripts.js"></script>

<!--toggle initialization-->
<script src="Resources/IMS/js/toggle-init.js"></script>

<!--clock init-->
<!-- <script src="Resources/IMS/js/css3clock/js/css3clock.js"></script> -->

<script type="text/javascript">
    $(document).ready(function(){
        var input = document.getElementById("formPass");
        var input2 = document.getElementById("formUser");
        input.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("formSubmit").click();
          }
        });
        input2.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("formSubmit").click();
          }
        });

        $('#bckBtn').on('click',function(){
            window.location = 'Portal.php';
        });
        $('#formSubmit').on('click',function(){
            
            // if($('#formPass').val().length < 8)
            if($('#formPass').val() == '' || $('#formUser') == '')
            {
                alert('Please fill the required fields.');
            }
            else
            {
              let Username = $('#formUser').val();
              let Password = $('#formPass').val();
              let MemID = $('#MemID').val();
              $.ajax({
                  url:'IMS/IMSLog.php',
                  type:'POST',
                  data:{Username:Username,Password:Password},
                  dataType:'JSON',
                  cache:false,
                  success:function(data){
                      if(data['Func'] == 'LogIn')
                      {
                        alert("You have successfully logged in!");
                        setTimeout(location.href = 'IMS/IMS-INS/INSmainpage.php?username='+data['User']+'',1000);
                      }
                      else
                      {
                        alert('Wrong Password');
                        location.reload();
                      }
                  },
                  error:function(data){
                      alert('Error');
                  }
              });
            }
        });

    });
    // Date JS
    function showDate(){
        var date = new Date();
        var Y = date.getFullYear();
        var M = date.getMonth() + 1;
        var D = date.getDate();

        var Fdate = M + ' / ' + D + ' / ' + Y;
        $('#DateDisplay').text(Fdate);
        setInterval(function(){
            var hour = new Date();
            if(hour == 24){
                showDate();
            }
        },1000*60);
    }
    showDate();
    // Clock JS
    function showTime(){
        var date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        if(date.getHours() == 0)
        {
            h = 12;
        }
        else if (date.getHours() > 12)
        {
            h = date.getHours() - 12;
        }
        h = (h < 10) ? '0' + h : h;
        m = (m < 10) ? '0' + m : m;
        s = (s < 10) ? '0' + s : s;

        var time = h + ":" + m + ":" + s + ' ' + am_pm;
        $('#ClockDisplay').text(time);

        setInterval(showTime,1000);
    }
    showTime();
</script>
</body>
</html>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Log In | SRG-IMS </title>

    
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />

    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">

</head>
<div name="Heading">
  <div class="col-md-12" style="background-color:white">
      <div class="col-md-12   " style="background-color:white">

        <div class="row" style="background-color: white">
                <div class="col-md-2" style="background-color: white">
                    <img src="Resources/images/IMS.jpg"  style="width:100%; height:80%"> 
                </div>
              <div class="col-md-10" style="margin-top: 1%">
                 <div class="row" style="height:5px; background-color: gray"></div>   
                  <p style="background-color: white;font-family: century gothic; font-size: 40px; margin-top: 10px">    
                   Inventory Management System
                 </p>  
               
             </div>
        </div>
       
      </div>

  </div>
  <div class="col-md-12" style="background: gray; text-align: right; "> 
            <a href="Portal.php" class="btn btn-default" style="margin: 3px">
              <i class="fa fa-reply"></i>&nbsp
              Back to Portal
            </a>
  </div>
</div>

<br>
<body style="background-color: #039be5;">
<div class="container">
    <form class="form-signin" method="POST">
      <center>
        <img src="Resources/images/srg-logo.png" style="height: 30%; width: 60%; margin: 15px">   
      </center>    
      <h2 class="form-signin-heading">Inventory Management System</h2>
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
            $_SESSION['Logged_In'] = $UserName;
            $_SESSION['TYPE'] = $type;
            $_SESSION['AccountID'] = $account;
            $_SESSION['EmployeeID'] = $employee;

            if($_SESSION['TYPE'] == "Project-Manager")
            {
              $header ='Location:IMS/IMS-INS/INSmainpage.php?username='.$UserName.'';
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
              echo "<script>setTimeout(\"location.href = 'SRGIMS_Login.php'\",0);</script>";     
            }
            else if($_SESSION['TYPE'] == "Member")
            {
              echo "<script type=\"text/javascript\">".
                       "alert
                       ('You are not authorized!');".
                       "</script>";
              echo "<script>setTimeout(\"location.href = 'SRGIMS_Login.php'\",0);</script>";    
            }
            else if($_SESSION['TYPE'] == "SystemAdmin")
            {
              echo "<script type=\"text/javascript\">".
                         "alert
                         ('You are not authorized!');".
                         "</script>";
               echo "<script>setTimeout(\"location.href = 'SRGIMS_Login.php'\",0);</script>";     
            }
          }
          else
          {
            echo "<script type=\"text/javascript\">".
                       "alert
                       ('Incorrect Username or Password!');".
                       "</script>";
            echo "<script>setTimeout(\"location.href = 'SRGIMS_Login.php'\",0);</script>";         
          }
        }
      ?>
      <div class="login-wrap"   style="margin-top: 1%">
        <div class="user-login-info">
          <input type="text" id="exampleInputEmail1" name="username" class="form-control" placeholder="Username" required />
          <input type="password" name="password" class="form-control" placeholder="Password" required />
        </div>
        <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #01579b" name="submit">Log in</button>
      </div>
    </form>
</div>

    

    <script src="Resources/IMS/js/jquery.js"></script>
    <script src="Resources/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
    <script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="Resources/IMS/js/jquery.nicescroll.js"></script>


    <script type="text/javascript" src="Reosources/IMS/js/jquery.validate.min.js"></script>

    <script src="Resources/IMS/js/scripts.js"></script>
    <script src="Resources/IMS/js/validation-init.js"></script>

  </body>
</html>
 -->