<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Time References | SRG SysCon </title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a  href="SAmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddperson.php">Add Personnel</a></li>
                        <li><a href="SAmngeperson.php">Manage Personnel</a></li>              
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="active">
                            <li><a class="active" href="SAChngeRef.php">Adjust Time Reference</a></li>
                             <li><a href="SAItemCat.php">Manage Item Category </a></li>
                            <li><a href="SAUserlog.php">Users' Logs</a></li>
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="SAChngeRef.php">Change Time Reference</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
              

            <section class="panel">
                <div class="row">
                    <div class="col-sm-12">
                    
                        <br>
                        <div class="col-md-7">
                            <h4>Change Time References (For Attendance Management)</h4>
                        </div>
                                  

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>
                                              
                                                    <form role="form" method="POST" action="F_TimeRef.php">
                                                            <div class="col-md-5" style="margin: 10px">
                                                                
                                                                    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Time Reference for (Punctual):</label>
                                                                            <input style="color: black;" type="time" name="TRpunctual" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Time Reference for (On-Time):</label>
                                                                            <input style="color: black;" type="time" name="TRontime" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Time Reference for (Late):</label>
                                                                            <input style="color: black;" type="time" name="TRlate" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Time Reference for (Grace Period):</label>
                                                                            <input style="color: black;" type="time" name="TRgrace" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                              
                                                             </div>
                                                             <div class="col-md-5">
                                                                     <div class="panel-body">
                                                                            <div class="adv-table">
                                                                             <label>Current Time References:</label>
                                                                            <table  class="display table table-bordered" id="dynamic-table">
                                                                           
                                                                            <tbody>
                                                                                <?php
                                                                                    $view_query = mysqli_query($connection,"SELECT * FROM `srg_ams_r_time_requirement` ");
                                                                                    while($row = mysqli_fetch_assoc($view_query))
                                                                                        {   
                                                                                            $TRP = $row["TIME_Punctual_Ref"];       
                                                                                            $TRO = $row["TIME_OnT_Ref"];
                                                                                            $TRL = $row["TIME_Late_Ref"];
                                                                                            $TRG = $row["TIME_Grace_Ref"];
                                                                                        
                                                                                ?>      
                                                                                         <tr class="gradeX">
                                                                                                <td>Time Reference for (Punctual):</td>
                                                                                                <td><?php echo $TRP; ?></td>
                                                                                        </tr> 
                                                                                         <tr class="gradeX">
                                                                                                <td>Time Reference for (On-Time):</td>
                                                                                                <td><?php echo $TRO; ?></td>
                                                                                        </tr> 
                                                                                         <tr class="gradeX">
                                                                                                <td>Time Reference for (Late):</td>
                                                                                                <td><?php echo $TRL; ?></td>
                                                                                        </tr> 
                                                                                         <tr class="gradeX">
                                                                                                <td>Time Reference for (Grace Period):</td>
                                                                                                <td><?php echo $TRG; ?></td>
                                                                                        </tr> 
                                                                                        <?php
                                                                                            }
                                                                                        ?>  
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>  
                                                             </div>

                                                          <div class="col-md-12">
                                                              <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                          </div>    


                                                        <div class="row" style="margin-left: 10px"> 
                                                            <div class="col-md-2">
                                                                <div style="padding: 1px; margin: 10px; ">  
                                                                    <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-save"></i> Save </a>   
                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content" style="text-align: center;">
                                                                                    <div class="modal-header">
                                                                                        You are about to change the time reference for attendance monitoring. This will affect the way of referencing the attendance status of the members everytime they log-in. Are you sure you want to proceed?
                                                                                    </div>
                                                                                    <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                    <div class="panel" style="height: 50%; width: 100%">
                                                                                        <button type="submit" class="btn btn-success btn-lg" name="updatetime">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                                        <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                    </div>
                                                                                    <br>
                                                                                </div>
                                                                            </div>
                                                                      </div>                                           
                                                                  </div>
                                                            </div>            

                                                             

                                                        </div>
                                                               
                                                    </form>
                    
                    </div>
                </div>
            </section>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
