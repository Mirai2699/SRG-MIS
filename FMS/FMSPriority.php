<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    
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
                    <a href="FMSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                   <a href="FMSDeposits.php">
                        <i class="fa fa-download"></i>
                        <span>Deposits</span>
                   </a>
                </li>
                <li>
                    <a  href="javascript:;">
                        <i class="fa fa-arrow-down"></i>
                        <span>Extra Income</span>
                    </a>
                        <ul>
	                         <li><a  href="FMSADDIncome.php"><span>Add Record</span></a></li>
	                         <li><a  href="FMSVIEWIncome.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                <li>
                    <a  href="javascript:;">
                        <i class="fa fa-level-up"></i>
                        <span>Expenses</span>
                    </a>
                        <ul>
	                         <li><a  href="FMSADDExpenses.php"><span>Add Record</span></a></li>
	                         <li><a  href="FMSVIEWExpenses.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                 <li>
                    <a  href="javascript:;">
                        <i class="fa fa-exchange"></i>
                        <span>Reimburements</span>
                    </a>
                        <ul>
	                         <li><a  href="FMSADDReimburse.php"><span>Add Record</span></a></li>
	                         <li><a  href="FMSVIEWReimburse.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                 <li>
                   <a class="active" href="FMSPriority.php">
                        <i class="fa fa-check"></i>
                        <span>Priority List</span>
                   </a>
                </li>
                 
                <!--
                 <li>
                    <a href="FMSReports.php">
                        <i class="fa  fa-book"></i>
                        <span>Printables</span>
                    </a>
                </li>
                -->
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

               <!-- START CONTENT -->
   <section class="panel">
                    <header class="panel-heading">
                        Add Item for Procurement
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form method="POST">

                                            <div class="form-content">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row group">                                                        
                                                    
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label>Item Description:</label>
                                                            <input maxlength="50" type="text" name="p_desc"  placeholder="Description" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Priority Level:</label>
                                                             <select name="p_level" class="form-control" style="color: black;"required>
                                                                     <option value="" selected disabled></option>
                                                                     <option value="LOW">Low (Not Urgent)</option>
                                                                     <option value="HIGH">High (Urgent)</option>         
                                                             </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div style="padding: 1px; margin-bottom: 10px; ">  
                                                        <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-arrow-down"></i>   Confirm</a>   
                                                          <?php
                                                            include ("../db.php");
                                                             
                                                                            if(isset($_POST['submit']))
                                                                              {   

                                                                                   $PDESC = $_POST['p_desc'];
                                                                                   $PLEVEL = $_POST['p_level'];

                                                                                  
                                                                                   $depository = mysqli_query($connection, "INSERT INTO srg_fms_t_prio_materials
                                                                                               (Description, Status, Priolevel, Date_Added) 
                                                                                               VALUES ('$PDESC', 'PENDING', '$PLEVEL', CURRENT_TIMESTAMP)");
                                                                                   echo 
                                                                                   "&nbsp&nbsp
                                                                                    <label style='font-size: 18px; color: #64dd17; font-weight: 10px'>
                                                                                        You have successfully added the item!
                                                                                    </label>
                                                                                    ";
                                                                              }
                                                                              else
                                                                                echo "";
                                                                                              
                                                          ?>
                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content" style="text-align: center;">
                                                                        <div class="modal-header">
                                                                            You are about to add an item to the priority list. Are you sure you want to proceed?
                                                                        </div>
                                                                        <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                            <button type="submit" class="btn btn-success btn-lg" name="submit">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
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
                                    </td> 
                                </tr>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!--END CONTENT-->




         <!-- START CONTENT -->
             <section>
                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                               Priority Items for Procurement     
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none">No</th>
                                    <th>Date Added</th>
                                    <th>Item Description</th>
                                    <th style="text-align: center">Priority Level</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_fms_t_prio_materials WHERE Active = 'Yes' ORDER BY Date_Added DESC  ");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["No"];
                                            $desc = $row["Description"];       
                                            $stat = $row["Status"]; 
                                            $Prio = $row["Priolevel"];
                                            $date = $row["Date_Added"];

                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none"><?php echo $No; ?></td>
                                                <td style="width: 10%"><?php echo $date; ?></td>
                                                <td style="width: 50%;"><?php echo $desc; ?></td>
                                                <!--  <td style="width: 15%;"><?php echo $Prio; ?></td>
                                                <td style="width: 15%;"><?php echo $stat; ?></td> -->
                                                  <?php 
                                                      if($Prio == 'HIGH')
                                                      {  ?>
                                                          <td style="width: 15%; background-color: #bf360c; color: white; text-align: center"><?php echo $Prio; ?></td>

                                                  <?php    }
                                                  ?>
                                                   <?php 
                                                      if($Prio == 'LOW')
                                                      {  ?>
                                                          <td style="width: 15%; background-color: #ffa000; color: white; text-align: center"><?php echo $Prio; ?></td>

                                                  <?php    }
                                                  ?>

                                                   <?php 
                                                      if($stat == 'ACQUIRED')
                                                      {  ?>
                                                          <td style="width: 15%; background-color: #388e3c; color: white; text-align: center"><?php echo $stat; ?></td>

                                                  <?php    }
                                                  ?>
                                                   <?php 
                                                      if($stat == 'PENDING')
                                                      {  ?>
                                                          <td style="width: 15%; background-color: #fbc02d; color: white; text-align: center"><?php echo $stat; ?></td>

                                                  <?php    }
                                                  ?>
                                                <td style="display: none"><?php echo $stat; ?></td>
                                                <td style="width: 10%; text-align: center">
                                                     <a  data-toggle="modal" href="#Change<?php echo $No; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                                </td>
                                        </tr>   
                                                  
                                       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change<?php echo $No; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>
                                                            <h4 class="modal-title">Edit Details</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                          <form action="F_ChangePrio.php" method="POST">

                                                                <div class="form-content">
                                                                    <div class="row group">                                                        
                                                                         <input type="hidden" name="p_No" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $No; ?>" />

                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Item Description</label>
                                                                                <input maxlength="150" type="text" name="p_desc" class="form-control" required="" style="color: black;" 
                                                                                value="<?php echo $desc; ?>"/>
                                                                            </div>
                                                                        </div>
                                                                         <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Status</label>
                                                                                 <select name="p_status" class="form-control" style="color: black;"required>
                                                                                       <option value="<?php echo $stat?>" selected><?php echo $stat?></option>
                                                                                       <option value="PENDING">Pending</option>
                                                                                       <option value="ACQUIRED">Acquired</option>         
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Priority Level</label>
                                                                                <select name="p_level" class="form-control" style="color: black;"required>
                                                                                       <option value="<?php echo $Prio?>" selected><?php echo $Prio?></option>
                                                                                       <option value="LOW">Low (Not Urgent)</option>
                                                                                       <option value="HIGH">High (Urgent)</option>         
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                          <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Archive</label>
                                                                                 <select name="p_archive" class="form-control" style="color: black;"required>
                                                                                       <option value="Yes" selected>No</option>
                                                                                       <option value="No">Yes</option>         
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                </div>
                                                                
                                                                 <div class="panel" style="height: 50%; width: 100%">
                                                                    <button type="submit" class="btn btn-success " name="ChangePrio"><i class="fa fa-save"></i>   Save</button> &nbsp&nbsp&nbsp&nbsp
                                                                </div>
                                                                
                                                                </div>
                                                            </form>  
                                                         </div>
                                                         
                                                         <br>
                                                    </div>
                                                </div>
                                            </div>                 
                                        <?php 
                                          } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>

              
                        <!--end container-->
                     </section>
                    </div>
                </div>
            </section>
            <!--END OF CONTENT-->
    </section>
</section>


</body>
</html>
