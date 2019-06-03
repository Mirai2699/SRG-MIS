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
                    <a class="active" href="FMSmainpage.php">
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

  <!--mini statistics start-->
        <div class="row">
           
            
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green"><i class="fa fa-money"></i></span>
                    <div class="mini-stat-info">
                        <span>
                         <?php
                           
                            $sql="SELECT * FROM srg_fms_r_fund";
							  $result = mysqli_query($connection, $sql);
                              while ($row = mysqli_fetch_array($result)) 
                                { 
                                  $Amount = $row['F_TotalFund'];
                                  echo  "₱  "; 
                                  echo number_format($Amount, 2);
                                }

                        ?>
                        </span>
                        Total Amount of Fund
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                   <a href="FMSDeposits.php">
                    <span class="mini-stat-icon tar"><i class="fa fa-download"></i></span>
                   </a>
                    <div class="mini-stat-info">
                        <span>
                         <?php
                            $view_sum = mysqli_query($connection,"SELECT SUM(D_Amount) as SUMMATION FROM srg_fms_t_deposit");
                                            $sumrow = mysqli_fetch_assoc($view_sum);
                                            $sum = $sumrow['SUMMATION'];
                                            $adder = 0;
                                            $totalsum = $sum + $adder;
                                            echo  "₱  "; 
                                            echo number_format($totalsum, 2);
                                

                        ?>
                        </span>
                        Total Amount of Deposits
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                  <a href="FMSVIEWIncome.php">
                    <span class="mini-stat-icon pink"><i class="fa fa-arrow-down"></i></span>
                  </a>
                    <div class="mini-stat-info">
                        <span>
                          <?php
                            $view_sum = mysqli_query($connection,"SELECT SUM(IC_Amount) as SUMMATION FROM srg_fms_t_income");
                                            $sumrow = mysqli_fetch_assoc($view_sum);
                                            $sum = $sumrow['SUMMATION'];
                                            $adder = 0;
                                            $totalsum = $sum + $adder;
                                            echo  "₱  "; 
                                            echo number_format($totalsum, 2);
                                

                        ?>   
                        </span>
                        Total Amount of Income
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                  <a href="FMSVIEWExpenses">
                    <span class="mini-stat-icon orange"><i class="fa fa-level-up"></i></span>
                  </a>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                            $view_sum = mysqli_query($connection,"SELECT SUM(ES_TotalAmount) as SUMMATION FROM srg_fms_t_expenses_summary");
                                            $sumrow = mysqli_fetch_assoc($view_sum);
                                            $sum = $sumrow['SUMMATION'];
                                            $adder = 0;
                                            $totalsum = $sum + $adder;
                                            echo  "₱  "; 
                                            echo number_format($totalsum, 2);
                                

                        ?>      
                        </span>
                        Total  Expenses
                    </div>
                </div>
            </div>

        </div>


<!--mini statistics end-->
            <script src="../../code/highcharts.js"></script>
            <script src="../../code/modules/exporting.js"></script>

              <div id="daterep" style="width: 99%; height: 400px;"></div>
                    <script type="text/javascript">

                        Highcharts.chart('daterep', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Monthly Financial Transactions For the Year <?php echo date("Y")?>'
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Amount in Peso'
                                }
                            },

                            plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true
                                    },
                                    enableMouseTracking: true
                                }
                            },
                            series: [{
                                name: 'Monthly Expenses',
                                data: [
                                          <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR1 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R1 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-01-01' AND '$curryear-02-01' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR1))
                                                                 {   
                                                                    
                                                                    echo($row["R1"]);
                                                                 }
                                           ?>, 
                                           <?php
                                             include("../db.php");  

                                              $curryear = date('Y');
                                              $view_queryR2 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R2 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-02-01' AND '$curryear-02-28' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR2))
                                                                 {   
                                                                    
                                                                    echo($row["R2"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR3 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R3 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-03-01' AND '$curryear-03-31' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR3))
                                                                 {   
                                                                    
                                                                    echo($row["R3"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR4 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R4 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-04-01' AND '$curryear-04-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR4))
                                                                 {   
                                                                    
                                                                    echo($row["R4"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR5 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R5 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-05-01' AND '$curryear-05-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR5))
                                                                 {   
                                                                    
                                                                    echo($row["R5"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR6 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R6 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-06-01' AND '$curryear-06-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR6))
                                                                 {   
                                                                    
                                                                    echo($row["R6"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR7 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R7 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-07-01' AND '$curryear-07-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR7))
                                                                 {   
                                                                    
                                                                    echo($row["R7"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR8 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R8 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-08-01' AND '$curryear-08-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR8))
                                                                 {   
                                                                    
                                                                    echo($row["R8"]);
                                                                 }
                                           ?>,
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR9 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R9 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-09-01' AND '$curryear-09-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR9))
                                                                 {   
                                                                    
                                                                    echo($row["R9"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR10 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R10 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-10-01' AND '$curryear-10-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR10))
                                                                 {   
                                                                    
                                                                    echo($row["R10"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR11 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R11 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-11-01' AND '$curryear-11-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR11))
                                                                 {   
                                                                    
                                                                    echo($row["R11"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR12 = mysqli_query($connection,"SELECT IFNULL(SUM(ES_TotalAmount),0.00) AS R12 FROM srg_fms_t_expenses_summary 
                                                                 WHERE ES_DateSpent BETWEEN '$curryear-12-01' AND '$curryear-12-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR12))
                                                                 {   
                                                                    
                                                                    echo($row["R12"]);
                                                                 }
                                           ?>
                                       ]
                            },
                            {
                                name: 'Monthly Income',
                                data: [
                                          <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR1 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R1 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-01-01' AND '$curryear-02-01' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR1))
                                                                 {   
                                                                    
                                                                    echo($row["R1"]);
                                                                 }
                                           ?>, 
                                           <?php
                                             include("../db.php");  

                                              $curryear = date('Y');
                                              $view_queryR2 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R2 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-02-01' AND '$curryear-02-28' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR2))
                                                                 {   
                                                                    
                                                                    echo($row["R2"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR3 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R3 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-03-01' AND '$curryear-03-31' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR3))
                                                                 {   
                                                                    
                                                                    echo($row["R3"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR4 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R4 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-04-01' AND '$curryear-04-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR4))
                                                                 {   
                                                                    
                                                                    echo($row["R4"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR5 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R5 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-05-01' AND '$curryear-05-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR5))
                                                                 {   
                                                                    
                                                                    echo($row["R5"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR6 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R6 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-06-01' AND '$curryear-06-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR6))
                                                                 {   
                                                                    
                                                                    echo($row["R6"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR7 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R7 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-07-01' AND '$curryear-07-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR7))
                                                                 {   
                                                                    
                                                                    echo($row["R7"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR8 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R8 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-08-01' AND '$curryear-08-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR8))
                                                                 {   
                                                                    
                                                                    echo($row["R8"]);
                                                                 }
                                           ?>,
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR9 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R9 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-09-01' AND '$curryear-09-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR9))
                                                                 {   
                                                                    
                                                                    echo($row["R9"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR10 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R10 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-10-01' AND '$curryear-10-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR10))
                                                                 {   
                                                                    
                                                                    echo($row["R10"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR11 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R11 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-11-01' AND '$curryear-11-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR11))
                                                                 {   
                                                                    
                                                                    echo($row["R11"]);
                                                                 }
                                           ?>, 
                                           <?php
                                              include("../db.php");  
                                              $curryear = date('Y');
                                              $view_queryR12 = mysqli_query($connection,"SELECT IFNULL(SUM(IC_Amount),0.00) AS R12 FROM srg_fms_t_income 
                                                                 WHERE IC_DateEntry BETWEEN '$curryear-12-01' AND '$curryear-12-30' ");
                                                                 while($row = mysqli_fetch_assoc($view_queryR12))
                                                                 {   
                                                                    
                                                                    echo($row["R12"]);
                                                                 }
                                           ?>
                                       ]
                            }]

                        });
                    </script>
        <!-- START CONTENT -->
            <br>
             <section>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                                Today's Deposit Logs     
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Depositor</th>
                                    <th style="width: 10%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $datenow = date('Y-m-d');
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_fms_t_deposit where D_Date_Deposited ='$datenow' ORDER BY D_No DESC ");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["D_No"];
                                            $Depositor = $row["D_Depositor"];       
                                            $Amount = $row["D_Amount"]; 

                                       
                                        
                                ?>      
                                         <tr class="gradeX">

                                                <td style="width: 55%"><?php echo $Depositor; ?></td>
                                                <td style="width: 25%"><?php echo '₱&nbsp' , $Amount; ?></td>
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
              </div>
            </section>
            <!--END OF CONTENT-->


        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
