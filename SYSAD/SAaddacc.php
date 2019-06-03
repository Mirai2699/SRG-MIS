<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>
<title>Add Account | PUPQC PSO</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a href="SAmainpage.php">
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
                    <a class="active" href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="active" class="sub">
                        <li><a class="active" href="SAaddacc.php">Add User Account</a></li>
                        <li><a href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub">
                            <li><a href="SAChngeRef.php">Adjust Time Reference</a></li>
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
                        <li><a href="SAaddacc.php">Add Account</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
              

            <section class="panel">
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <div class="col-md-3">
                            <h4>Account Creation</h4>
                        </div>
                        <div class="col-md-12">
                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                                              
                        <form role="form" method="POST" action="F_Account.php">
                                <div class="col-md-12" style="margin: 10px">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input style="color: black;" type="text" name="accuser" maxlength="25" class="form-control"required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input style="color: black;" type="password" name="accpass" maxlength="150" class="form-control"required/>
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Reference Password (Leave Blank if None)</label>
                                            <input style="color: black;" type="password" name="refpass" maxlength="150" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Type</label>
                                            <select name="acctype" class="form-control" style="color: black;"required/>
                                                <option value="" selected></option>
                                                <option value="Professor">Professor</option>
                                                <option value="Project-Manager">Project Manager</option>
                                                <option value="Treasurer">Treasurer</option>
                                                <option value="Member">Member</option>
                                                <option value="SystemAdmin">System Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Member Reference</label>
                                            <select class="form-control m-bot15" name="accempID" style="color: black; padding-left: 10px;"required/>

                                            <option value="" selected disabled></option>
                                                <?php  
                                                    $sqlemp= "SELECT * FROM `srg_r_members`";
                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                    while($row = mysqli_fetch_assoc($results))
                                                    {   
                                                        $ID = $row['ID'];
                                                        $Fname = $row['First_Name'];
                                                        $Lname = $row['Last_Name'];
                                                        $Gen = $row['Generation'];
                                                        echo '<option value="'.$ID.'">('.$Gen.' Gen)  '.$Fname.'  '.$Lname.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                            </div>                  
                            <div class="row" style="margin-left: 10px"> 
                                <div class="col-md-2">
                                    <div style="padding: 1px; margin: 10px; ">  
                                        <a data-toggle="modal" href="#Continue" class="btn btn-success"> Create Account <i class="fa  fa-check"></i></a>   
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="text-align: center;">
                                                        <div class="modal-header">
                                                            You are about to provide a user account for the said member. Are you sure you want to proceed?
                                                        </div>
                                                        <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                        <div class="panel" style="height: 50%; width: 100%">
                                                            <button type="submit" class="btn btn-success btn-lg" name="Addacc">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                          </div>                                           
                                      </div>
                                </div>  
                                 <div class="col-md-2">
                                    <div style="padding: 1px; margin: 10px; ">  
                                        <a data-toggle="modal" href="#skip" class="btn btn-info"> Skip  <i class="fa  fa-external-link"></i></i></a>   
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="skip" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="text-align: center;">
                                                        <div class="modal-header">
                                                            Skipping the account creation means you are only about to save the member's details
                                                            without providing a user account. Are you sure you want to proceed?
                                                        </div>
                                                        <img alt="" src="../Resources/images/PUP/skip.png" style="height: 20%; width: 20%">
                                                        <div class="panel" style="height: 50%; width: 100%">
                                                            <a href="SAmngeperson.php" class="btn btn-success btn-lg">Yes</a> &nbsp;&nbsp;&nbsp;&nbsp;
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
