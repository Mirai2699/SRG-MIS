<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="Resources/images/favicon.png">

    <title>SRG-MIS Portal</title>

    <!--Core CSS -->
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
    <link href="Resources/FontAwesome/css/all.css" rel="stylesheet" />
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="Resources/IMS/js/gritter/css/jquery.gritter.css" />

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="Resources/CreativeLinkEffects/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="Resources/CreativeLinkEffects/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="Resources/CreativeLinkEffects/css/component.css" />

    <!-- <link rel="stylesheet" type="text/css" href="Resources/ButtonStylesInspiration/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="Resources/ButtonStylesInspiration/css/vicons-font.css" />
    <link rel="stylesheet" type="text/css" href="Resources/ButtonStylesInspiration/css/base.css" /> -->
    <link rel="stylesheet" type="text/css" href="Resources/ButtonStylesInspiration/css/buttons.css" />

    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">
    <style type="text/css">
    @font-face {
      font-family: "TitillumWeb-Light";
      src: url(Resources/TitilliumWeb-Light.ttf) format("truetype");
    }
      .Attendance{
        background: url("Resources/images/BG2.jpg") no-repeat;
        background-position: center;
        background-size: cover;
      }
      .Attendance a{
        color: #303030;
      }
      .Attendance a:hover{
        color:White;
      }
      .AdminBtn{
        margin: auto; 
        color: white;
        /*background-color: #195f84;*/
      }
      .AdminBtn:hover{
        color: black;
        /*background-color: #909090;*/
      }
    </style>
    
</head>

<body style=" background: #fcfcfc;
        background-position: top;
        background-size: cover; overflow: hidden;">

<section id="container" style="position: relative; min-height: 100%;">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12" style=" background-repeat: no-repeat; background-size: cover; background-position: center; size: 100%; padding: 0px;">
          <div style="height:120px;">
            <div style="display:inline-flex; padding-left:30px; min-width: 90%; height:120px; max-width: 90%; text-align: center;">
              <a href="#">
                  <img  src="Resources/images/srg-7th.png" height="120px"> 
              </a>&nbsp;
              <span style="font-family:TitillumWeb-Light; font-weight:bold; font-size: 24px; color:#303030; margin-bottom: auto; margin-top: auto;"><small style="position: absolute;top:24px; font-size: 15px;">Software Research Group</small>
                 MANAGEMENT INFORMATION SYSTEM
              </span>
            </div>
            <div style="height:120px; display: inline-flex; align-items: center; justify-content: center;">
              <!-- <a href="SystemAdmin.php" class="btn AdminBtn">
              </a> -->
              <span>Admin</span> &nbsp;
              <button id="AdminBtn" class="button button--sacnite button--round-l AdminBtn">
                <i class="fas fa-user-tie"></i>
              </button>
            </div>
          </div>
          <img src='Resources/images/extra1.png' style="z-index:1; position:absolute; opacity: .3; width:100%; max-height: 100px; top:100%;"></img>
        </div>
        <div class="col-md-12 container" style="width:100%; padding: 0px;">
          <section id="sectionBG" class="Attendance">
            <nav class="cl-effect-14">
              <a id="AMS" href="SRGAMS_LogIn.php"><i class="fa fa-calendar"></i>&nbsp;Attendance</a>
              <a id="IMS" href="SRGIMS_LogIn.php"><i class="fa fa-warehouse"></i>&nbsp;Inventory</a>
              <a id="FMS" href="SRGFMS_LogIn.php"><i class="fa fa-cash-register"></i>&nbsp;Financial</a>
            </nav>
          </section>
        </div>
        <img src="Resources/images/extra1.png" style="opacity: .3; width:100%; max-height: 100px;"/>
      </div>
    </div>
</section>
<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="Resources/IMS/js/jquery.js"></script>
<script src="Resources/IMS/js/jquery-1.8.3.min.js"></script>
<script src="Resources/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="Resources/IMS/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
<script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="Resources/IMS/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="Resources/IMS/js/gritter/js/jquery.gritter.js"></script>

<script src="Resources/CreativeLinkEffects/js/modernizr.custom.js"></script>

<!--common script init for all pages-->
<script src="Resources/IMS/js/scripts.js"></script>

<!--script for this page-->
<script src="Resources/IMS/js/gritter.js" type="text/javascript"></script>

</body>
<footer class="footer" style="position:fixed; width: 100%; min-height: 200px;">
  <center style="font-family: TitillumWeb-Light; margin:auto;">Developed by PUPQC Software Research Group 7th Generation, 2018</center>
</footer>
</html>
<!-- Special CSS Script -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#AdminBtn').on('click',function(){
      window.location.replace("SystemAdmin.php");
    });

    $("#sectionBG #AMS").mouseover(function(){
      $("#sectionBG").css({'background':'url("Resources/images/AMS2.jpg") no-repeat',
                          'background-position': 'center',
                          'background-size': 'cover',
                          'transition':' background 0.6s',
                          '-webkit-transition': 'background 0.6s'});
      $('#AMS').css({'font-size': '30px',
                    'font-weight': 'bold',
                    'transition': 'font .6s linear',
                    '-webkit-transition': 'font 0.6s',});
      $('#IMS').css({'opacity':'0',
                      'transition':' background 1s',
                      '-webkit-transition': 'background 1s'});
      $('#FMS').css({'opacity':'0',
                      'transition':' background 1s',
                      '-webkit-transition': 'background 1s'});
    });
    $("#sectionBG #IMS").mouseover(function(){
      $("#sectionBG").css({'background':'url("Resources/images/IMS2.jpg") no-repeat',
                          'background-position': 'center',
                          'background-size': 'cover',
                          'transition':' background 0.6s',
                          '-webkit-transition': 'background 0.6s'});
      $('#IMS').css({'font-size': '30px',
                    'font-weight': 'bold',
                    'transition': 'font .6s linear',
                    '-webkit-transition': 'font 0.6s',});
      $('#AMS').css({'opacity':'0',
                      'transition':' background 1s',
                      '-webkit-transition': 'background 1s'});
      $('#FMS').css({'opacity':'0',
                      'transition':' background 1s',
                      '-webkit-transition': 'background 1s'});
    });
    $("#sectionBG #FMS").mouseover(function(){
      $("#sectionBG").css({'background':'url("Resources/images/FMS2.jpg") no-repeat',
                          'background-position': 'center',
                          'background-size': 'cover',
                          'transition':' background 0.6s',
                          '-webkit-transition': 'background 0.6s'});
      $('#FMS').css({'font-size': '30px',
                    'font-weight': 'bold',
                    'transition': 'font .6s linear',
                    '-webkit-transition': 'font 0.6s',});
      $('#IMS').css({'opacity':'0',
                      'transition':' background 1s',
                      '-webkit-transition': 'background 1s'});
      $('#AMS').css({'opacity':'0',
                      'transition':' background 1s',
                      '-webkit-transition': 'background 1s'});
    });
    $("#sectionBG a").mouseout(function(){
      $("#sectionBG").css({'background':'url("Resources/images/BG2.jpg") no-repeat',
                          'background-position': 'center',
                          'background-size': 'cover',
                          'transition':' background 0.6s',
                          '-webkit-transition': 'background 0.6s'});
      $('#AMS').css({'opacity':'1',
                      'font-size': '1.35em',
                      'font-weight': '400',
                      'transition':' all 1s',
                      '-webkit-transition': 'all 1s'});
      $('#FMS').css({'opacity':'1',
                      'font-size': '1.35em',
                      'font-weight': '400',
                      'transition':' all 1s',
                      '-webkit-transition': 'all 1s'});
      $('#IMS').css({'opacity':'1',
                      'font-size': '1.35em',
                      'font-weight': '400',
                      'transition':' all 1s',
                      '-webkit-transition': 'all 1s'});
    });
  });
</script>
