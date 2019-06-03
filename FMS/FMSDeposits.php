<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    
?>

<title>Deposits | PUPQC IMS</title>
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
                   <a class="active" href="FMSDeposits.php">
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
                                SRG Members' Deposit Logs     
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="width: 8%">Entry No</th>
                                    <th style="width: 15%">Depositor</th>
                                    <th style="width: 10%">Amount</th>
                                    <th style="width: 10%">Date and Time Deposited</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_fms_t_deposit ORDER BY D_No DESC ");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["D_No"];
                                            $Depositor = $row["D_Depositor"];       
                                            $Amount = $row["D_Amount"]; 
                                            $Deposited = $row["D_Date_Deposited"];  

                                       
                                        
                                ?>      
                                         <tr class="gradeX">

                                                <td style="width: 10%"><?php echo $No; ?></td>
                                                <td style="width: 55%"><?php echo $Depositor; ?></td>
                                                <td style="width: 15%"><?php echo '₱&nbsp' , $Amount; ?></td>
                                                <td style="width: 20%"><?php echo $Deposited; ?></td>
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
