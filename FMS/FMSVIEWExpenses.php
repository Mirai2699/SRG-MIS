<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    
?>

<title>View Expense Record | SRG FMS</title>
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
                    <a  href="javascript:;">
                        <i class="fa fa-arrow-down"></i>
                        <span>Extra Income</span>
                    </a>
                        <ul>
	                         <li><a href="FMSADDIncome.php"><span>Add Record</span></a></li>
	                         <li><a href="FMSVIEWIncome.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                <li>
                    <a class="active"  href="javascript:;">
                        <i class="fa fa-level-up"></i>
                        <span>Expenses</span>
                    </a>
                        <ul>
	                         <li><a  href="FMSADDExpenses.php"><span>Add Record</span></a></li>
	                         <li><a class="active"  href="FMSVIEWExpenses.php"><span>View Records</span></a></li>
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
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                                Expenses Record    
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none;">No</th>
                                    <th style="width: 8%">Entry No</th>
                                    <th style="width: 15%">Title Description</th>
                                    <th style="width: 10%">Date Spent</th>
                                    <th style="width: 10%">Date of Record Entry</th>
                                    <th style="width: 5%">Total Amount</th>
                                    <th style="width: 7%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_fms_t_expenses_summary ORDER BY ES_No DESC");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["ES_No"];
                                            $Entry = $row["ES_EntryNo"];
                                            $Desc = $row["ES_Description"];       
                                            $Dspent = $row["ES_DateSpent"]; 
                                            $Total = $row["ES_TotalAmount"];
                                            $Drecord = $row["ES_DateEntry"];  

                                    

                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none;"><?php echo $No; ?></td>
                                                <td style="width: 5%"><?php echo $Entry; ?></td>
                                                <td style="width: 15%"><?php echo $Desc; ?></td>
                                                <td style="width: 10%"><?php echo $Dspent; ?></td>
                                                <td style="width: 10%"><?php echo $Drecord; ?></td>
                                                <td style="width: 10%"><?php echo "₱ "; echo $Total; ?></td>
                                                <td style='width: 7%'>
                                                    <center>
                                                    <a data-toggle="modal" class="btn btn-success" href="FMSExpensesReview.php?viewexpenses=<?php echo $No; ?>">View</a>               
                                                    </center>
                                                </td>
                                        </tr>   
                                                    
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

     
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>



</body>
</html>
