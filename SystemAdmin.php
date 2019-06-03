<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Log In | SRG-Sys.Conf </title>

    <!--Core CSS -->
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />
    <link href="Resources/FontAwesome/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Resources/ButtonStylesInspiration/css/buttons.css" />
    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">
    <style type="text/css">
    @font-face {
      font-family: "TitillumWeb-Light";
      src: url(Resources/TitilliumWeb-Light.ttf) format("truetype");
    }
    </style>
</head>

  <body class="login-body" style="background-color: gray">
    <button id="BckBtn" class="button button--sacnite button--round-l AdminBtn" style="margin:20px; float: right;">
      <i class="fas fa-arrow-left"></i>
    </button>
    <div class="container">

      <form class="form-signin" method="POST"">
        <div style="display: table-cell; vertical-align: middle;">
        <img src="Resources/images/srg-logo.png" style="height: 50px; margin: 15px">   
        <span class="form-signin-heading" style="font-size:20px; font-family:TitillumWeb-Light; font-weight: bold; height: 50px; vertical-align: middle;">System Configuration</span>
        </div>    
        
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
                // echo 'OK!';
                session_start();
                $_SESSION['AccID'] = $user_id;
                $_SESSION['Logged_In'] = $UserName;
                $_SESSION['TYPE'] = $type;
                $_SESSION['AccountID'] = $account;
                // $_SESSION['EmployeeID'] = $employee;


                if($_SESSION['TYPE'] == "SystemAdmin")
                {
                  $header ='Location:SYSAD/SAmainpage.php?username='.$UserName.'';
                  header($header);
                }
                else
                {
                  echo "<center>
                          <label style='color:red; font-weight: 10px; font-size: 15px'>This account doesn't have administrative authority.</label>
                        </center>";
                }
               
               
               $query = "INSERT INTO srg_r_user_log (UL_Username, UL_Type) VALUES('$UserName', '$type')";
               mysqli_query($connection,$query);
              
            }
          else
            {
               
                echo  "
                <center>
                <label style='color:red; font-weight: 10px; font-size: 15px'>Incorrect Username or Password!</label>
                </center>";         
                }
          }
        ?>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" id="exampleInputEmail1" name="username" class="form-control" placeholder="Username" required />
              
                <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #01579b" name="submit">Log in</button>

        </div>
          <!-- Modal -->
          <!-- <form>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" />

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Send</button>
                      </div>
                  </div>
              </div>
          </div>
          </form> -->
          
          <!-- modal -->

      </form>
    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->

    <script src="Resources/IMS/js/jquery.js"></script>
    <script src="Resources/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
    <script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="Resources/IMS/js/jquery.nicescroll.js"></script>

    <script type="text/javascript" src="Reosources/IMS/js/jquery.validate.min.js"></script>

    <!--common script init for all pages-->
    <script src="Resources/IMS/js/scripts.js"></script>
    <!--this page script-->
    <script src="Resources/IMS/js/validation-init.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#BckBtn').on('click',function(){
        window.location.replace("Portal.php");
      });
    });
  </script>
  </body>
</html>