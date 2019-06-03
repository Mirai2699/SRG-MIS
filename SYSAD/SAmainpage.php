<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Home | SRG SysCon </title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a class="active" href="SAmainpage.php">
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
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

  <!--mini statistics start-->
        <div class="row">
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <a href="SAmngeperson.php">
                    <span class="mini-stat-icon orange">
                        <i class="fa  fa-users"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                           
                            $sql="SELECT * FROM srg_r_members where Status = 'Active'";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        <br>
                        Registered Personnel in the System
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <a href="SAmngeacc.php">
                    <span class="mini-stat-icon tar">
                        <i class="fa fa-unlock-alt"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM srg_r_accounts where ACC_Status = 'Active' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Registered Active Accounts in the System
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <a href="SAUserlog.php">
                    <span class="mini-stat-icon green">
                        <i class="fa  fa-laptop"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                           
                            $sql="SELECT * FROM srg_r_user_log";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        <br>
                        Recorded Log-Ins in the System
                    </div>
                </div>
            </div>
            
        </div>
<!--mini statistics end-->
        

        <br/>
            
                </div>

    </section>
</section>

</section>


</body>
</html>