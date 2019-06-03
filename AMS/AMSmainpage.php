<?php 
     include ("AMSHeader.php");
     include ("AMSJSCore.php");
     include ("AMSJSCustom.php");    
?>

    <title>Home | PUPQC IMS</title>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a class="active" href="AMSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="AMSattendance.php">
                        <i class="fa fa-calendar"></i>
                        <span>Attendance Record</span>
                    </a>
                </li>
                <li>
                    <a href="AMSTimeSheet.php">
                        <i class="fa  fa-file-text-o"></i>
                        <span>Time Sheets</span>
                    </a>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end -->

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

  <!--mini statistics start-->
        <!-- <div class="row">
           
            
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green"><i class="fa fa-question"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        Coming Soon
                        </span>
                        Total Official Office Days of the Month 
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar"><i class="fa fa-question"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        Coming Soon
                        </span>
                        Most Punctual Awardee of the Month
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink"><i class="fa fa-question"></i></span>
                    <div class="mini-stat-info">
                        <span>
                         Coming Soon
                        </span>
                       <br> Most Late Awardee of the Month
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange"><i class="fa fa-question"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        Coming Soon
                        </span>
                        Most Absent Awardee of the Month
                    </div>
                </div>
            </div>

        </div>

 -->
<!--mini statistics end-->
  
         <!-- START CONTENT -->
         <div class="col-md-6">
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                                SRG Attendance Log - Time In as of <?php echo date('D, M d, Y')?>    
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="width: 25%">Member</th>
                                    <th style="width: 15%">Time In</th>
                            </thead>
                            <tbody>
                                <?php
                                    $currdate = date('Y-m-d');
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_ams_t_time_in where TI_Date_In = '$currdate'");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["TI_No"];
                                            $Member = $row["TI_Member"];
                                            $date = $row["TI_Date_In"];       
                                            $time = $row["TI_Time_In"]; 
                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="width: 25%"><?php echo $Member; ?></td>
                                                <td style="width: 15%"><?php echo $time; ?></td>
                                        </tr>   
                                             
                                        <?php 
                                          } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                    </section>
                    </div>
                </div>
            </section>
        </div>
        <!--END CONTENT-->
           <!-- START CONTENT -->
         <div class="col-md-6">
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                                SRG Attendance Log - Time Out as of <?php echo date('D, M d, Y')?>    
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="width: 25%">Member</th>
                                    <th style="width: 15%">Time Out</th>
                            </thead>
                            <tbody>
                                <?php

                                    $currdate = date('Y-m-d');
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_ams_t_time_out where TO_Date_Out = '$currdate'");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["TO_No"];
                                            $Member = $row["TO_Member"];
                                            $date = $row["TO_Date_Out"];       
                                            $time = $row["TO_Time_Out"]; 
                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="width: 25%"><?php echo $Member; ?></td>
                                                <td style="width: 15%"><?php echo $time; ?> </td>
                                        </tr>   
                                             
                                        <?php 
                                          } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                    </section>
                    </div>
                </div>
            </section>
        </div>
        <!--END CONTENT-->



        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
