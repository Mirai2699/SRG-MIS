<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

 <title>Manage Personnel  | PUPQC PSO</title>


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
                    <a class="active" href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul class="active" class="sub">
                        <li><a href="SAaddperson.php">Add Personnel</a></li>
                        <li><a class="active" href="SAmngeperson.php">Manage Personnel</a></li>              
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
                    <a  href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub" >
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
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAmngeperson.php">Manage Personnel</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Manage Members
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none">No.</th>

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Membership Type</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>SRG Generation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `srg_r_members` AS EP
                                                                  -- INNER JOIN pso_r_office AS O ON EP.O_ID = O.O_ID");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $Id = $row["ID"];
                                    $Fname = $row["First_Name"];       
                                    $Lname = $row["Last_Name"]; 
                                    $mtype = $row["Member_Type"];      
                                    $Position = $row["Position"];   
                                    $course = $row["Course"];
                                    $Year = $row["Year"];
                                    $section = $row["Section"];
                                    $Generation = $row["Generation"];
                                    $Stat = $row["Status"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $Id; ?></td>
                                        <td><?php echo $Fname; ?></td>
                                        <td><?php echo $Lname; ?>
                                        <td><?php echo $mtype; ?></td>
                                        <td><?php echo $course; ?></td>
                                        <td><?php echo $Year; ?></td>
                                        <td><?php echo $section; ?></td>
                                        <td><?php echo $Generation; ?></td>
                                        <td><?php echo $Stat; ?></td>
                                        <td style='width:150px'>
                                                <center>             
                                                    <a data-toggle="modal" href="#modify<?php echo $Id; ?>" class="btn btn-warning">Edit</a>               
                                                </center>
                                       </td>
                                </tr> 
                                    <!--Modal Division-->
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify<?php echo $Id; ?>" class="modal fade" >
                                                    <div class="modal-dialog" style="width: 80%; height:500px">
                                                        <div class="modal-content">
                                                            <div class="modal-header"  style="background-color: goldenrod; color: white">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal" style="color: black">x</button>
                                                             </div>

                                                                <h3 class="modal-title">Edit Member Details</h3>
                                                            </div>
                                                            <div class="modal-body" style="width: 100%; height:200px">
                                                                <form role="form" method="POST" action="F_Personnel.php">
                                                                                        <div class="form-group">
                                                                                            <input style="display: none ;" type="text" name="ID" value="<?php echo $Id; ?>" class="form-control"/>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>First Name</label>
                                                                                                <input style="color: black;" type="text" name="Fname" value="<?php echo $Fname?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Last Name</label>
                                                                                                <input style="color: black;" type="text" name="Lname" value="<?php echo $Lname?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Membership Type</label>
                                                                                               <select name="Type" class="form-control" style="color: black;"required/>
                                                                                                    <option value="<?php echo $mtype?>" selected="disabled"><?php echo $mtype?></option>
                                                                                                    <option value="Student">Student</option>
                                                                                                    <option value="Professor">Professor</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                          <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Position</label>
                                                                                              <input style="color: black;" type="text" name="Position" value="<?php echo $Position?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Course</label>
                                                                                                <input style="color: black;" type="text" name="Course" value="<?php echo $course?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Year level</label>
                                                                                                <input style="color: black;" type="number" name="Ylevel" value="<?php echo $Year ?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Section</label>
                                                                                                <input style="color: black;" type="number" name="section" value="<?php echo $section ?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Generation</label>
                                                                                                <input style="color: black;" type="text" name="Gen" value="<?php echo $Generation ?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Status</label>
                                                                                                <select class="form-control m-bot15" name="status" style="color: black; padding-left: 10px;" />
                                                                                                    <option value="Active" selected>Active</option>
                                                                                                    <option value="Not-Active">Not Active</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                             <button type="submit" class="btn btn-success" name="Updateperson" style="padding-left: 10px; margin-left: 12px; margin-top: 22px">
                                                                                         <i class="fa  fa-save"></i>   Save 
                                                                                      </button>
                                                                                     
                                                                                     
                                                               </form>    
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Modal Division-->

                                                    <?php
                                                 }
                                            ?>    

      
                <!--end container-->
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>



</body>
</html>
