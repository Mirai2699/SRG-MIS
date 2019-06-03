<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    
?>

<title>Add Reimbursement Record| SRG FMS</title>
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
                   <a  href="FMSDeposits.php">
                        <i class="fa fa-download"></i>
                        <span>Deposits</span>
                   </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-arrow-down"></i>
                        <span>Extra Income</span>
                    </a>
                        <ul>
	                         <li><a href="FMSADDIncome.php"><span>Add Record</span></a></li>
	                         <li><a href="FMSVIEWIncome.php"><span>View Records</span></a></li>
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
                    <a  class="active" href="javascript:;">
                        <i class="fa fa-exchange"></i>
                        <span>Reimburements</span>
                    </a>
                        <ul>
	                         <li><a class="active"   href="FMSADDReimburse.php"><span>Add Record</span></a></li>
	                         <li><a  href="FMSVIEWReimburse.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                 <li>
                   <a href="FMSPriority.php">
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
                        Add Medicinal Supply Category Type
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
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date of Disbursement:</label>
                                                            <input type="Date" name="R_Date_Disburse"  class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Issued Disbursement / Payee:</label>
                                                            <select class="form-control m-bot15" name="R_Payee" style="color: black; padding-left: 10px;"required/>

                                                                            <option value="" selected disabled></option>
                                                                               <?php  
                                                                                    $sqlemp= "SELECT * FROM `srg_r_members` WHERE Member_Type = 'Student' OR Member_Type = 'Professor' AND Status = 'Active' ";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {   
                                                                                        $ID = $row['ID'];
                                                                                        $Fname = $row['First_Name'];
                                                                                        $Lname = $row['Last_Name'];
                                                                                        $Gen = $row['Generation'];
                                                                                        $MT = $row['Member_Type'];

                                                                                ?>
                                                                                <option value="<?php echo "$Fname $Lname"; ?>"><?php echo "($MT) $Fname  $Lname"; ?></option>
                                                                                  <?php 
                                                                                    } 
                                                                                ?>
                                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label>Reason of Disbursement:</label>
                                                            <input maxlength="100" type="text" name="R_Description"  placeholder="Description" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Total Amount:</label>
                                                             <input type="number" min="1.00" max="5000.00" step="0.01" name="R_Amount" class="form-control" placeholder="Amount" style="color: black;"required />
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
                                                                                   
                                                                                   $datenow = date('Y-m-d');
                                                                                   $dateDisburse = $_POST['R_Date_Disburse'];
                                                                                   $payee = $_POST['R_Payee'];
                                                                                   $desc = $_POST['R_Description'];
                                                                                   $amount = $_POST['R_Amount'];

                                                                                  
                                                                                   $depository = mysqli_query($connection, "INSERT INTO srg_fms_t_reimbursement
                                                                                  (R_Date_Entry, R_Date_Disbursement, R_Payee, R_Desc, R_Amount) 
                                                                                   VALUES ('$datenow', '$dateDisburse', '$payee', '$desc', 
                                                                                                       '$amount')");
                                                                                   echo 
                                                                                   "&nbsp&nbsp
                                                                                    <label style='font-size: 18px; color: #64dd17; font-weight: 10px'>
                                                                                        You have successfully entered the record! 
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
                                                                            You are about to confirm the following details for the reimbursement reference record. Are you sure you want to proceed?
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
            
     
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
