<?php
     include ("SAHeader.php");
     include ("SAJSCore.php");
     include ("SAJSCustom.php");
?>


    <title>Manage Account | PUPQC PSO</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
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
                    <a  href="SAcampus.php">
                        <i class="fa  fa-sitemap"></i>
                        <span>Campus Setup</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-building-o"></i>
                        <span>Office Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAadddept.php">Add Office</a></li>
                        <li><a href="SAmngedept.php">Manage Office</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-qrcode"></i>
                        <span>Asset Management</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAAssetlib.php"> Setup Asset Library</a></li>
                        <li><a href="SADisloc.php"> Setup Disposal Location</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-tasks"></i>
                        <span>Inventory Management</span>
                    </a>
                    <ul class="sub">
                            <li><a href="SAcategory.php">Setup Item Category</a></li>
                            <li><a href="SAStocklevel.php">Setup Items and Critical Level</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub">
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

<!--Main Content-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

       
              


            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <br>
                        <div class="col-md-3">
                            <h4>Edit User Account Details</h4>
                        </div>
                                  

                                        <div class="col-md-12">
                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                        </div>

                                                        <form role="form" method="POST">
                                                            <div class="col-md-9" style="margin: 10px">
                                                                <div class="col-md-4">
                                                                  <div class="col-md-12" style="border-style: solid;">
                                                                  <?php  
                                                                      include('../db.php');

                                                                      $sql = "SELECT * FROM pso_r_employee_profile AS EP JOIN pso_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['Logged_In']."'";
                                                                      $result = mysqli_query($connection, $sql);

                                                                     while ($row = mysqli_fetch_array($result)) 
                                                                     { 
                                                                       $uid = $row['U_ID'];
                                                                       $uuser = $row['U_USERNAME'];
                                                                       $upass = $row['U_PASSWORD'];
                                                                       $pic = $row['EP_PICTURE'];
                                                                         if($pic == NULL)
                                                                         {
                                                                             echo '<img src="'.$pic.'" style="width:100%; height:90%; margin:5px">';
                                                                         }
                                                                         else
                                                                             echo '<img src="default.png" style="width:100%; height:90%; margin:5px">';
                                                                    
                                                                   ?>
                                                                  </div>

                                                                   <input style="color: black;" type="File" name="Profile" class="form-control" required="" />
                                                                </div>

                                                                <div class="col-md-8">
                                                                     <input style="color: black;" type="text" name="ID" class="hidden" required="" maxlength="25" 
                                                                     value="<?php echo $uid; ?>" />
                                                                     <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Username</label>
                                                                            <input style="color: black;" type="text" name="User" class="form-control" required="" maxlength="25" 
                                                                            value="<?php echo $uuser; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input style="color: black;" type="password" name="Pass" class="form-control" required="" maxlength="50" 
                                                                            value="<?php echo $upass; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                      }
                                                                    ?> 
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Confirm Password</label> 
                                                                            <input style="color: black;" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
                                                                        </div>
                                                                    </div>
                                                                     <button type="submit" class="btn btn-success" name="Save" style="padding-left: 10px; margin-left: 3%; margin-top: 1.3%">
                                                                                Save
                                                                     </button>
                                                                      <a href="PCmainpage.php" class="btn btn-default" name="cancel" style="padding-left: 10px; margin-left: 3%; margin-top: 1.3%">
                                                                                Cancel
                                                                     </a>
                                                                      <?php
                                                                        if(isset($_POST['Save']))
                                                                        {
                                                                          $No = $_POST['ID'];
                                                                          $user = $_POST['User'];
                                                                          $pass = $_POST['Pass'];
                                                                          $conpass = $_POST['ConPass'];
                                                                          if($pass == $conpass)
                                                                          {
                                                                            $query = mysqli_query($connection,"UPDATE pso_r_user SET U_USERNAME = '$user', U_PASSWORD = '$pass' WHERE U_ID = '$No'");
                                                                              header('location: SAmainpage.php');

                                                                           }
                                                                          else if($pass != $conpass)
                                                                          {
                                                                            echo "<label style='color:red ; margin-left: 5%; font-weight: 10px; font-size: 15px'>Password Do Not Match!</label>";
                                                                          }
                                                                        }

                                                                      ?>
                                                                </div>

                                                            </div>
                                        
                                                                    <div class="row">
                                                                        <div class="col-md-11" style="margin: 10px; margin-left: 30px; text-align: right;">
                                                                           
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                             <div class="col-md-12">
                                                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                            </div>
                                                            
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- page end-->
        </section>
    </section>
<!--End of Main Content-->



</body>


</html>