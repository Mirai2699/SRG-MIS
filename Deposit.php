<?php 
    include('db.php');
    date_default_timezone_set("Asia/Manila"); 
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

    <title>Deposit | SRG-IMS</title>

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
        .formBtnOut{
            background-color: #37474f;
            color: white;
        }
        .formBtnOut:hover{
            background-color:#ff2b2b;
            color: #fff;
            box-shadow: 0 0 0 3px #ff5454;
            transition: .5s;
        }
        .formBtnDis{
            background-color: #fcfcfc;
            color: #37474f;
        }
        .formBtnDis:hover{
            box-shadow: 0 0 0 3px #37474f;
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
        <span id="ClockDisplay" class="ClockDisplay"  style="color: black;">time</span>
        <span id="DateDisplay" class="DateDisplay"  style="color: black;">date</span>
        
        <img src="Resources/images/FMS.jpg" width="100%" height="100%" style="filter: blur(2px); z-index: 0;">
    </div>
    <?php
        $SRGInfoSQL = 'SELECT MEM.ID,
                        MEM.First_Name,
                        MEM.Last_Name,
                        MEM.Profile_Picture
                    FROM srg_r_members AS MEM
                    WHERE MEM.ID = '.$ids.'';
        $SRGQuery = mysqli_query($connection,$SRGInfoSQL) or die (mysqli_error($connection));
        if(mysqli_num_rows($SRGQuery) > 0)
        {
            while($row = mysqli_fetch_assoc($SRGQuery))
            {
                $MID = $row['ID'];
                $FName = $row['First_Name'];
                $LName = $row['Last_Name'];
                $PPicture = $row['Profile_Picture'];
            }
        }   
    ?>
    <div class="formBG" style="width: 30%;">
        <div class="pageTitle">
            <span>Welcome, <?php echo $FName.' '.$LName;?></span>
            <button id="bckBtn" class="btn btn-sm btn-round bckBtn"><i class="fas fa-chevron-left"></i></button>
        </div>
        <div style="margin-top:20%; padding-left: 10%; padding-right: 10%;">
            <div style="display: flex; justify-content: center; align-items: center; margin:10%;">
                <?php echo '<img src="Resources/images/members/'.$PPicture.'" width="150px" style="box-shadow: 0 0 10px #37474f">'?>
                <!-- <img src="Resources/images/members/Lowell.jpg" width="150px" style="box-shadow: 0 0 10px #37474f"> -->
            </div>
                <input type="text" id="MemID" value="<?php echo $ids;?>" hidden>
                <input id="formAmount" type="number" min="1.00" max="100.00" step="0.01" name="amount" class="form-control" placeholder="Amount (In Peso)" style="margin-bottom: 10px" required />
                <input id="formPass" type="password" name="Password" placeholder="Password" class="form-control formInput" autofocus>
                <input type="text" id="LogFunction" value="Login" hidden>
                <button id="formSubmit" class="btn btn-sm form-control formInput formBtnIn"> DEPOSIT</button>
        </div>
        <div>
            <span class="pageCredit">Developed by PUPQC Software Research Group 7th Generation, 2018</span>
        </div>
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
        var input2 = document.getElementById("formAmount");
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
            window.location = 'SRGFMS_Login.php';
        });
        $('#formSubmit').on('click',function(){
            
            // if($('#formPass').val().length < 8)
            if($('#formPass').val() == '' || $('#formAmount').val() == '')
            {
                alert('Please fill the required fields.');
            }
            else
            {
                let Amount = $('#formAmount').val();
                let Password = $('#formPass').val();
                let MemID = $('#MemID').val();
                $.ajax({
                    url:'depositAmount.php',
                    type:'POST',
                    data:{Amount:Amount,Password:Password,MemID:MemID},
                    cache:false,
                    success:function(data){
                        if(data == 1)
                        {
                            alert("You have successfully deposited!");
                            setTimeout(location.href = 'SRGFMS_Login.php',1000);
                        }
                        else
                        {
                            alert('Wrong Password');
                        }
                    },
                    error:function(data){
                        alert('Error');
                    }
                });
            }
        });
        $('#ChangePassBtn').on('click',function(){
            let CID = $('#CID').val();
            if($('#CurPass').val() != '')
            {
                if($('#NewPass1').val() == $('#NewPass2').val())
                {
                    let NPass = $('#NewPass1').val();
                    let CPass = $('#CurPass').val();
                    $.ajax({
                        url:'AMS/AMSCheckPassword.php',
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

    <title>Deposit | SRG-IMS </title>

    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />

    <link rel="icon" href="Resources/images/srg-logo.png" sizes="32x32">

</head>

  <body class="login-body" style="background-color: #1de9b6">

    <div class="container">

      <form class="form-signin" method="POST"">
         <a  href="SRGFMS_Login.php" class="btn btn-info" style="margin: 5px">
           <i style="font-family: verdana; color: white;">Go Back</i>
        </a>
        <center>
         <div class="col-md-12">
                <?php
                    include ("db.php");
                      $view_query = mysqli_query($connection,"SELECT * FROM `srg_r_members` AS MEM
                                                  INNER JOIN srg_r_accounts AS ACC ON ACC.ACC_Ref_Member = MEM.ID
                                                  where MEM.ID = '$ids' ");
                      while($row = mysqli_fetch_assoc($view_query))
                            {
                                $MemID = $row["ID"];
                                $Fname = $row["First_Name"];
                                $Lname = $row["Last_Name"];
                                $MemPic = $row["Profile_Picture"];
                               
                                 $countercheck = mysqli_query($connection,"SELECT * FROM `srg_r_members` AS MEM
                                                INNER JOIN srg_r_accounts AS ACC ON ACC.ACC_Ref_Member = MEM.ID
                                                where ACC.ACC_Type = 'Treasurer' ");    

                                                while($row = mysqli_fetch_assoc($countercheck))
                                                {
                                                   $checker =  $row["ACC_Password"];   
                                                    if(isset($_POST['submit']))
                                                    {
                                                       $deposit = $_POST['amount'];
                                                       if($_POST['validator'] == $checker) 
                                                        {   
                                                            $update = mysqli_query($connection,"UPDATE srg_fms_r_fund SET F_TotalFund = (F_TotalFund + $deposit) WHERE F_ID = 1 "); 

                                                            
                                                             $Fullname = $Fname.' '.$Lname;
                                                             $count = $_POST['Count'];
                                                             $depository = mysqli_query($connection, "INSERT INTO srg_fms_t_deposit
                                                                         ( D_Depositor, D_Amount, D_Date_Deposited) 
                                                                         VALUES ('$Fullname', '$deposit', CURRENT_TIMESTAMP)");
                                                             echo 
                                                             "<br>
                                                              <label style='font-size: 18px; color: #64dd17; font-weight: 10px'>
                                                                  You have successfully deposited!
                                                              </label>
                                                              ";
                                                              echo "<script type=\"text/javascript\">".
                                                                     "alert
                                                                     ('You have successfully deposited!');".
                                                                     "</script>";
                                                              echo "<script>setTimeout(\"location.href = 'SRGFMS_Login.php'\",0);</script>";
                                                        }
                                                        else if($_POST['validator'] != $checker) 
                                                        {
                                                           echo  
                                                           "<br>
                                                              <label style='font-size: 18px; color: #f44336; font-weight: 10px'>
                                                                  Incorrect Password!
                                                              </label>
                                                            ";
                                                        }
                                                  }
                                     
                                  }                        
                  ?>
              <div class="col-md-12" style="text-align: center; margin-top: 20px">
                     <img src="Resources/Images/Members/<?php echo $MemPic ?>" style="width: 60%; height: 60%" /><br>
                     <label style="margin-top: 5px; font-size: 20px;"><?php echo $Fname ?>'s</label>
                 </div>
              </div>  

        </center>    
        <h2 class="form-signin-heading">Deposit Log</h2>

        <div class="login-wrap">
              <div class="form-group">
                  <input type="hidden" name="Count" value="<?php echo $finalid; ?>">
              </div> 
            <div class="user-login-info">
                <input type="number" min="1.00" max="100.00" step="0.01" name="amount" class="form-control" placeholder="Amount (In Peso)" style="margin-bottom: 10px" required />
              
                <input type="password" name="validator" class="form-control" placeholder="Password" required />
            </div>
          
            <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #01579b" name="submit">
            <i class="fa fa-download"></i>   Deposit</button>

        </div>

        

                 <?php } ?>
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
</html> -->
