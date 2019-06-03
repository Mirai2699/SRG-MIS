<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    
?>

<title>View Reimbursement Record| SRG FMS</title>
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
                             <li><a  href="FMSADDReimburse.php"><span>Add Record</span></a></li>
                             <li><a  class="active"  href="FMSVIEWReimburse.php"><span>View Records</span></a></li>
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
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMDelReq.php">For Delivery / Delivered Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#fordeliver">Disbursement</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#delivered">Reimbursement</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="fordeliver" class="tab-pane active">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="background-color: maroon; color: white">
                                       Pending / Un-Paid Disbursements
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Date of Record Entry</th>
                                            <th>Date of Issued Disbursement</th>
                                            <th>Payee</th>
                                            <th>Reason</th> 
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT * FROM `srg_fms_t_reimbursement` WHERE R_Status = 'PENDING' 
                                                                                    ORDER BY R_No DESC ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {
                                                    $No = $row["R_No"];
                                                    $dentry = $row["R_Date_Entry"];
                                                    $ddisburse = $row["R_Date_Disbursement"];  
                                                    $payee = $row["R_Payee"];
                                                    $desc = $row["R_Desc"]; 
                                                    $amount = $row["R_Amount"];
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $dentry; ?></td>
                                                        <td><?php echo $ddisburse; ?></td>
                                                        <td><?php echo $payee; ?></td>
                                                        <td><?php echo $desc; ?></td>
                                                        <td><?php echo "₱  "; ?><?php echo $amount?></td>
                                                        <td>
                                                                <center>
                                                                
                                                                  <a href="F_Reimburse.php?sendid=<?php echo $No; ?>" class="btn btn-success">
                                                                    <i class="fa fa-check"></i> Paid</a>
                                                                </center>
                                                       </td>
                                                </tr>  

                                                <?php 
                                                  } 
                                                    ?>

                      
                                <!--end container-->
                         
                                          
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </section>
                          </div>
                        </div>
                        <!--START DELIVERED-->
                        <div id="delivered" class="tab-pane">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="background-color: green; color: white">
                                       Paid / Reimbursed
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>Date of Record Entry</th>
                                            <th>Date of Issued Disbursement</th>
                                            <th>Date Paid / Reimbursed</th>
                                            <th>Payee</th>
                                            <th>Reason</th> 
                                            <th>Total Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT * FROM `srg_fms_t_reimbursement` WHERE R_Status = 'PAID' 
                                                                                    ORDER BY R_No DESC ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {
                                                    $No = $row["R_No"];
                                                    $dentry = $row["R_Date_Entry"];
                                                    $ddisburse = $row["R_Date_Disbursement"];  
                                                    $dpaid = $row["R_Date_Paid"];
                                                    $payee = $row["R_Payee"];
                                                    $desc = $row["R_Desc"]; 
                                                    $amount = $row["R_Amount"];
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td style="width:10%;"><?php echo $dentry; ?></td>
                                                        <td style="width:10%;"><?php echo $ddisburse; ?></td>
                                                        <td style="width:10%;"><?php echo $dpaid; ?></td>
                                                        <td style="width:20%;"><?php echo $payee; ?></td>
                                                        <td style="width:20%;"><?php echo $desc; ?></td>
                                                        <td style="width:10%;"><?php echo "₱  "; ?><?php echo $amount?></td>
                                                        
                                                </tr>  

                                                <?php 
                                                  } 
                                                    ?>

                      
                                <!--end container-->
                         
                                          
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </section>
                          </div>
                          <!--END-->
                        </div>
                    </div>
                </div>
            </section>
            <!--tab nav start-->
      
         




            
        
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
