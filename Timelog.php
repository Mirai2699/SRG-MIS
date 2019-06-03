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

    <title>Log In | SRG-AMS </title>

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
        slider{
            display: inline-flex;
            width: 70%;
            height: 100%;
            background-color: #fcfcfc;
            overflow: hidden;
            z-index: 0;
        }
        slider > *{
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            background: #fcfcfc;
            animation: slide 12s infinite;
            overflow: hidden;
        }
        slide:nth-child(1){
            left: 0%;
            animation-delay: -1s;
            background-image: url(Resources/images/BG.jpg);
            background-size: cover;
            background-position: center;
        }
        slide:nth-child(2){
            animation-delay: 2s;
            background-image: url(Resources/images/bgblue.jpg);
            background-size: cover;
            background-position: center;
        }
        slide:nth-child(3){
            animation-delay: 5s;
            background-image: url(Resources/images/Portal1.jpg);
            background-size: cover;
            background-position: center;
        }
        slide:nth-child(4){
            animation-delay: 8s;
            background-image: url(Resources/images/inventory.jpg);
            background-size: cover;
            background-position: center;
        }
        @keyframes slide{
            0%{left:100%; width: 100%;}
            5%{left:0%;}
            25%{left:0%;}
            30%{left:-100%;width: 100%;}
            30.0001%{left: -100%;width: 0%}
            100%{left: 100%;width: 0%}
        }
    </style>
</head>
  <body>
    <div style="width: 70%;">
        <span id="ClockDisplay" class="ClockDisplay">time</span>
        <span id="DateDisplay" class="DateDisplay">date</span>
        <!-- <slider style="filter: blur(3px);z-index: 0;">
            <slide></slide>
            <slide></slide>
            <slide></slide>
            <slide></slide>
        </slider> -->
        <img src="Resources/images/BG.jpg" width="100%" height="100%" style="filter: blur(2px); z-index: 0;">
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
            <table class="table TimeTable">
                <tr>
                    <?php
                        $LogFlag1 = 0;
                        $LogFlag2 = 0;
                        $HidePass = " ";
                        $SRGTimeInSQL = 'SELECT 
                                            IFNULL(TI_Date_In,"--/--/--") AS TI_Date_In,
                                            IFNULL(TI_Time_In,"--:--:-- --") AS TI_Time_In
                                        FROM srg_ams_t_time_in
                                        WHERE TI_Member_ID = '.$ids.'
                                        AND TI_Date_In = CURRENT_DATE()';
                        $SRGTimeInQuery = mysqli_query($connection,$SRGTimeInSQL) or die(mysqli_error($connection));
                        if(mysqli_num_rows($SRGTimeInQuery) > 0)
                        {
                            while($TDIn = mysqli_fetch_assoc($SRGTimeInQuery))
                            {
                                $DIn = $TDIn['TI_Date_In'];
                                $TIn = new DateTime($TDIn['TI_Time_In']);
                                $FTIn = $TIn -> format('h:i:s A');
                                $LogFlag = 1;
                            }
                        }
                        else
                        {
                            $DIn = '--/--/--';
                            $FTIn = '--:--:-- --';
                            $LogFlag = 0;
                        }
                        $SRGTimeOutSQL = 'SELECT 
                                            IFNULL(TO_Date_Out,"--/--/--") AS TO_Date_Out,
                                            IFNULL(TO_Time_Out,"--:--:-- --") AS TO_Time_Out
                                        FROM  srg_ams_t_time_out
                                        WHERE TO_Member_ID = '.$ids.'
                                        AND TO_Date_Out = CURRENT_DATE()';
                        $SRGTimeOutQuery = mysqli_query($connection,$SRGTimeOutSQL) or die(mysqli_error($connection));
                        if(mysqli_num_rows($SRGTimeOutQuery) > 0)
                        {
                            while($TDOut = mysqli_fetch_assoc($SRGTimeOutQuery))
                            {
                                $DOut = $TDOut['TO_Date_Out'];
                                $TOut = new DateTime($TDOut['TO_Time_Out']);
                                $FTOut = $TOut -> format('h:i:s A');
                                $LogFlag2 = 1;
                                $HidePass = 'disabled';
                            }
                        }
                        else
                        {
                            $DOut = '--/--/--';
                            $FTOut = '--:--:-- --';
                            $LogFlag2 = 0;
                        }
                        
                    ?>
                    <td align="center">In: <?php echo $FTIn; ?></td>
                    <td align="center">Out: <?php echo $FTOut; ?></td>
                </tr>
            </table>
                <input type="text" id="MemID" value="<?php echo $ids;?>" hidden>
                <input id="formPass" type="password" name="Password" placeholder="Password" class="form-control formInput" autofocus <?php echo $HidePass;?>>
                <?php
                    if($LogFlag == 0 && $LogFlag2 == 0)
                    {
                        echo '<input type="text" id="LogFunction" value="Login" hidden>
                        <button id="formSubmit" class="btn btn-sm form-control formInput formBtnIn"> LOGIN</button>';
                    }
                    elseif($LogFlag == 1 && $LogFlag2 == 0)
                    {
                        echo '<input type="text" id="LogFunction" value="Logout" hidden>
                        <button id="formSubmit" class="btn btn-sm form-control formInput formBtnOut"> LOGOUT</button>';
                    }
                    else
                    {
                        echo '<button class="btn btn-sm form-control formInput formBtnDis"> COME BACK TOMORROW</button>';
                    }
                ?>
        </div>
        <div>
            <span class="pageCredit">Developed by PUPQC Software Research Group 7th Generation, 2018</span>
        </div>
        <div style="display: inline-flex; position: absolute; bottom: 3%; right:1%;">
            
            <button class="btn btn-sm btn-round changeBtn" data-toggle="modal" data-target="#ChangePass"><i class="fas fa-feather-alt"></i> Change Password</button>
        </div>
    </div>
    <!-- Modal -->
    <div id="ChangePass" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: inline-flex; width: 100%;">
              <img  src="Resources/images/srg-7th.png" height="60px" style="margin-top: 0; margin-bottom: 0; margin-left: 2%;">&nbsp;
              <span class="modal-title" style="font-family:TitillumWeb-Light; font-weight:bold; font-size: 18px; color:#303030; white-space: nowrap; margin:auto;">Change Password</span>
              <button type="button" class="close" data-dismiss="modal" style="">&times;</button>
            </div>
            <div class="modal-body">
            <form> 
                <div>
                    <div class="user-login-info">
                        <input type="text" id="CID" value="<?php echo $ids;?>" hidden>
                        <label>Current Password</label>
                        <input id="CurPass" type="password" name="CurPass" class="form-control" placeholder="Current Password" required />
                        <div class="form-group">
                            <label style="margin: 2px;">New Password</label>
                            <input id="NewPass1" type="password" name="NewPass" class="form-control" placeholder="New Password" required/>
                            <label style="margin: 2px;">Confirm Password</label>
                            <input id="NewPass2" type="password" name="ConfirmPass" class="form-control" placeholder="Confirm Password" required/>
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button id="ChangePassBtn" class="btn btn-round btn-sm formBtnIn" type="submit" name="submit" style="margin:auto;display:block;">
                    <i class="fas fa-check-circle"></i>&nbsp;Save Changes
                </button>
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
    </div>
    <!-- END Modal -->

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
        input.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("formSubmit").click();
          }
        });

        $('#bckBtn').on('click',function(){
            window.location = 'SRGAMS_LogIn.php';
        });
        $('#formSubmit').on('click',function(){
            
            // if($('#formPass').val().length < 8)
            if($('#formPass').val() == '')
            {
                alert('Password is at least 8 characters.');
            }
            else
            {
                let Password = $('#formPass').val();
                let LogFunction = $('#LogFunction').val();
                let MemID = $('#MemID').val();
                $.ajax({
                    url:'AMS/AMSLog.php',
                    type:'POST',
                    data:{LogFunction:LogFunction,Password:Password,MemID:MemID},
                    dataType:'JSON',
                    cache:false,
                    success:function(data){
                        if(data['Func'] == 'LogIn')
                        {
                            alert("You have successfully logged in!");
                            setTimeout(location.href = 'SRGAMS_Login.php',1000);
                        }
                        else if(data['Func'] == 'LogOut')
                        {   
                            alert('You have successfully logged out!');
                            setTimeout(location.href = 'SRGAMS_Login.php',1000);
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
