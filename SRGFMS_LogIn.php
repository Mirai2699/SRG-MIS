  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Log In | SRG-FMS </title>

    <!--Core CSS -->
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->

    <link href="Resources/FontAwesome/css/all.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="Resources/ButtonStylesInspiration/css/buttons.css" />

    <link rel="stylesheet" type="text/css" href="Resources/CaptionHoverEffects/css/default.css" />
    <link rel="stylesheet" type="text/css" href="Resources/CaptionHoverEffects/css/component.css" />


    <link rel="stylesheet" type="text/css" href="Resources/preLoader/loaders.css" />
    <script type="text/javascript" src="Resources/CaptionHoverEffects/js/modernizr.custom.js"></script>

    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">
    <style type="text/css">
      @font-face {
      font-family: "TitillumWeb-Light";
      src: url(Resources/TitilliumWeb-Light.ttf) format("truetype");
      }
      body{
        background: url('Resources/images/BG_AMS.jpg') center center no-repeat;
        background-size: cover;
      }
      .modal-dialog {
        top:50% !important;
        transform: translate(0, -50%) !important;
        -ms-transform: translate(0, -50%) !important;
        -webkit-transform: translate(0, -50%) !important;
      }
      .loader {
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fcfcfc;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .loader.hidden{
        animation: fadeOut 1s;
        animation-fill-mode: forwards;
      }
      @keyframes fadeOut {
        100% {
          opacity:0;
          visibility:hidden;
        }
      }
    </style>
</head>
<body style="overflow: hidden;">
  <div class="loader">
    <div class="loader-inner ball-triangle-path">
    </div>
  </div>
<section style="background-color: #fcfcfc;">
    <div class="row">
      <div class="col-md-12" style="display: inline-flex; text-align: center;">
        <img  src="Resources/images/srg-7th.png" height="60px" style="margin-top: auto; margin-bottom: auto; margin-left: 2%;">
        <p style="font-family:TitillumWeb-Light; font-weight:bold; font-size: 24px; color:#303030; margin: auto; margin-left: 10px;">Financial Monitoring System
        </p>
        <button id="PrioBtn" class="button button--sacnite button--round-l AdminBtn" data-toggle="modal" data-target="#PrioItems">
          <i class="fas fa-box-open"></i>
        </button>
        <button id="Admin" class="button button--sacnite button--round-l AdminBtn" data-toggle="modal" data-target="#AdminLogIn">
          <i class="fas fa-unlock"></i>
        </button>
        <button id="BckBtn" class="button button--sacnite button--round-l AdminBtn" onclick="PortalBtn()">
          <i class="fas fa-home"></i>
        </button>
      </div>
      
    </div>
    <img src='Resources/images/extra1.png' style="display:flex; position:absolute; z-index:1; opacity: .1; width:100%; max-height: 50px;"/>
  </section>
  <ul class="grid cs-style-3" style="margin-top:25px;">
    <?php
      include ("db.php");

      $SRGQuery = 'SELECT * FROM `srg_r_members` WHERE Status = "Active" AND Member_Type = "Student" ORDER BY Last_Name ASC';
      $view_query = mysqli_query($connection,$SRGQuery);
      if(mysqli_num_rows($view_query) > 0)
      {
        while($row = mysqli_fetch_assoc($view_query))
        {
          $MemID = $row["ID"];
          $Fname = $row["First_Name"];
          $Lname = $row["Last_Name"];
          $MemPic = $row["Profile_Picture"];

          
          $Status = '#fff';
          $LogButton = '<button class="btn btn-success" style="border-radius: 5px; float:right;" onclick="SRGLog('.$MemID.')">
                          <i class="far fa-arrow-alt-circle-down"></i>
                        </button>';
          echo '
          <li>
            <figure style="z-index: 0;">
              <img src="Resources/Images/Members/'.$MemPic.'" alt="img03">
              <figcaption>
                <b><span style="font-size: 12px; font-family:TitillumWeb-Light;">'.strtoupper($Lname).'</span></b>&nbsp;
                '.$LogButton.'
              </figcaption>
            </figure>
          </li>
          ';
        }
      }
    ?>
  </ul>
  <div>
    <center>
      <span style="font-size: 18px; font-family:TitillumWeb-Light; font-weight:bold; color: #195f84;">Developed by PUPQC Software Research Group 7th Generation, 2018<span>
    </center>
  </div>
  <!-- Modal -->
  <div id="AdminLogIn" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="display: inline-flex; width: 100%;">
          <img  src="Resources/images/srg-7th.png" height="60px" style="margin-top: 0; margin-bottom: 0; margin-left: 2%;">&nbsp;
          <span class="modal-title" style="font-family:TitillumWeb-Light; font-weight:bold; font-size: 18px; color:#303030; white-space: nowrap; margin:auto;">FMS Administrator</span>
          <button type="button" class="close" data-dismiss="modal" style="">&times;</button>
        </div>
        <div class="modal-body">
          <form method="POST" action="FMS_ADMINLogin.php"> 
            <div>
                <div class="user-login-info">
                  <input type="text" id="exampleInputEmail1" name="username" class="form-control" placeholder="Username" required />
                  <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <button class="btn btn-login btn-block" type="submit" style="background-color: #37474f;font-family:TitillumWeb-Light; font-weight:bold;" name="submit">LOG IN</button>
            </div>
        </div>
      </div>

    </div>
  </div>
  <!-- END Modal -->
  <!-- Modal -->
  <div id="PrioItems" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="display: inline-flex; width: 100%;">
          <img  src="Resources/images/srg-7th.png" height="60px" style="margin-top: 0; margin-bottom: 0; margin-left: 2%;">&nbsp;
          <span class="modal-title" style="font-family:TitillumWeb-Light; font-weight:bold; font-size: 18px; color:#303030; white-space: nowrap; margin:auto;">Priority Items</span>
          <button type="button" class="close" data-dismiss="modal" style="">&times;</button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" style="color:#303030">
            <tbody>
              <?php
                $view_query = mysqli_query($connection,"SELECT * FROM srg_fms_t_prio_materials WHERE Active = 'Yes' AND Priolevel = 'HIGH' AND                                         Status = 'PENDING' ORDER BY Date_Added DESC  ");
                while($row = mysqli_fetch_assoc($view_query))
                {                        
                  $desc = $row["Description"];  
   
                  echo'<tr class="gradeX">
                          <td><i class="fas fa-caret-right"></i>&nbsp;'.$desc.' </td>
                  </tr>';
                }
                                        
              ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- END Modal -->
    <!-- Placed js at the end of the document so the pages load faster -->
    
    <!--Core js-->

    <script src="Resources/IMS/js/jquery.js"></script>
    <script src="Resources/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
    <script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="Resources/IMS/js/jquery.nicescroll.js"></script>

    <!--Custom JS-->
    <script type="text/javascript" src="Resources/IMS/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="Resources/CaptionHoverEffects/js/toucheffects.js"></script>
    <script type="text/javascript" src="Resources/preLoader/loaders.css.js"></script>
    <!--common script init for all pages-->
    <script src="Resources/IMS/js/scripts.js"></script>
    <!--this page script-->
    <script src="Resources/IMS/js/validation-init.js"></script>

    <script type="text/javascript">
      window.addEventListener('load',function(){
        const loader = document.querySelector('.loader');
        loader.className += ' hidden';
      })
      function SRGLog(ID){
        window.location = 'Deposit.php?viewrequests='+ID;
        // alert(ID);
      }
      function PortalBtn(){
        window.location = 'index.php';
        // alert(ID);
      }
    </script>

</body>
</html>