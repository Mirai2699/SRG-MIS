<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>


<title>User's Logs | PUPQC PSO</title>

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
                    <a href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="active" >
                            <li><a href="SAChngeRef.php">Adjust Time Reference</a></li>
                            <li><a class="active"  href="SAUserlog.php">Users' Logs</a></li>
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
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAUserlog.php">Users' Logs</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Users' Logs
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Date and Time of Entry</th>
                            <th>User Type</th>
                            <th>Member Logged In</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `srg_r_user_log` ");
                            while($row = mysqli_fetch_assoc($view_query))
                            	//ETO PALA UNG START NG LOOP HAHA, NASA DULO NG MODAL DIVISION UNG ISA PA
                                {

                                	//VARIABLES FOR DISPLAYING THE DATA FROM THE TABLE
                                    $logdate = $row["UL_DateTime"];
                                    $loggedname = $row["UL_Username"];
                                    $logtype = $row["UL_Type"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td><?php echo $logdate; ?></td>
                                        <td><?php echo $logtype; ?></td>
                                        <td><?php echo $loggedname; ?></td>
                                       
                                </tr> 
                                		
                                           <?php
                                                 } //ETO UNG DULO NG LOOP, DAPAT ENCLOSED PARIN SYA NG PHP 
                                                    // KAILANGAN YAN PARA UNG DATA SA LOOB NG TABLE PATULOY NYANG PINAPASA 
                                            ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>       
                  </section>
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
