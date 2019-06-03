<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    

    if (isset($_GET['viewexpenses'])) 
    {
        $ids = $_GET['viewexpenses'];

    }
?>

<title>Review Expenses | PUPQCIMS</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
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
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="MEDmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="MEDPenReq.php">Pending Requests</a></li>
                    <li><a href="MEDReviewPen.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: #FAFAFA;" class="panel-heading">
                            <label>Requests</label>
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `srg_fms_t_expenses_summary` WHERE ES_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $Dspent = $row['ES_DateSpent'];
                              $Dentry = $row['ES_DateEntry'];
                              $total = $row['ES_TotalAmount'];
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Batch Entry No.</label>
                                            <input type="text" name="Batch_Num" value="<?php echo $ids; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Spent</label>
                                            <input type="Date" name="Drequested" value="<?php echo $Dspent; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>

                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date of Record Entry</label>
                                            <input type="Date" name="Drequested" value="<?php echo $Dentry; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>

                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Total Amount</label>
                                            <input type="text" name="Drequested" value="<?php echo "₱ "; ?><?php echo $total; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>

                        <?php
                            }
                        ?>

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Itenararies:</label>
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th>Itenerary Description</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                        $sql = "SELECT * FROM `srg_fms_t_expenses_summary` AS SUMEXP  
                                                                INNER JOIN `srg_fms_t_expenses` AS EXP ON EXP.Ex_SumBatch = SUMEXp.ES_No
                                                                     WHERE EXP.Ex_SumBatch = $ids ";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                        while($row = mysqli_fetch_assoc($result))
                                                        { 
                                                          $No = $row['Ex_No'];
                                                          $name = $row['Ex_Description'];
                                                          $price = $row['Ex_Amount'];

                                                    ?>

                                                    <tr class="gradeX">
                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                        <td> <?php echo $name; ?> </td>
                                                        <td> <?php echo "₱ "; ?><?php echo $price; ?></td>
                                                        
                                                    </tr>

                                          


                                                    <?php
                                                 }
                                            ?>             
                                        </tbody>
                                    </table>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px;">                                                             
                                    </div>
                                </div>
                            </div>
                    <!--PRINTABLE FORM-->
                         <div style="display: none" id="printablearea">
                          <footer class="">  
                            <head>
                                 <div class="" style="font-family: times-new roman">
                                     <label style="font-size: 20px">Polytechnic University of the Philippines Quezon City</label><br>
                                     <label style="font-size: 20px">Software Research Group</label><br>
                                     
                                </div>
                                 <div class="">
                                     <img  src="../Resources/images/PUP/blackline.png" style="height:25%; width:100%; "> 
                                </div>
                            </head>
                          </footer>
                                <br><br>
                                <div style="margin-top: 20px; margin-left: 15px">
                                     <center>
                                            <b style="font-size: 20px">Financial Expenses Report</b>
                                    </center>
                                    <br>
                                      <?php  

                                            //$ids = $row['Batch_No'];
                                            $sql = "SELECT * FROM `srg_fms_t_expenses_summary` WHERE ES_No = $ids";


                                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                              $Dspent = $row['ES_DateSpent'];
                                              $Dentry = $row['ES_DateEntry'];
                                              $total = $row['ES_TotalAmount'];
                                        ?>
                                 <table>
                                    <tbody>
                                        <tr >
                                              <td style="width: 1%"><b style="font-size: 16px">Organization:</b></td>
                                              <td style="text-align:left; width: 30%">
                                                <b style="font-size: 16px">PUP ICTC - Software Research Group</b>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px">Date Generated:</b>
                                                <b style="font-size: 17px">
                                                <?php 
                                                        $Modified = date('F d, Y');
                                                        echo $Modified;
                                                 
                                                ?>
                                              </b>
                                              </td>
                                         </tr>
                                          <tr >
                                              <td style="width: 1%"><b style="font-size: 16px"></b></td>
                                              <td style="text-align:left; width: 30%">
                                                <u style="font-size: 16px"></u>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px">Date Spent:</b>
                                                <b style="font-size: 17px">
                                                <?php 
                                                        $Modified = date('F d, Y',strtotime($Dspent));
                                                        echo $Modified;
                                                 
                                                ?>
                                              </b>
                                              </td>
                                         </tr>
                                           <tr >
                                              <td style="width: 1%"><b style="font-size: 16px"></b></td>
                                              <td style="text-align:left; width: 30%">
                                                <u style="font-size: 16px"></u>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px">Date of Record Entry:</b>
                                                <b style="font-size: 17px">
                                                     <?php 
                                                        $Modified = date('F d, Y',strtotime($Dentry));
                                                        echo $Modified;
                                                 
                                                ?>
                                                </b>
                                              </td>
                                         </tr>
                                         <tr >
                                              <td style="width:5%"><b style="font-size: 16px">Batch Entry No:</b></td>
                                              <td style="text-align:left; width: 5%"><b>
                                                <?php 
                                                        echo $ids;
                                                 
                                                ?></b>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px"></b>
                                                <b style="font-size: 17px">
                                                </b>
                                              </td>
                                         </tr>
                                      </tbody>
                                   </table>

                                   <?php } ?>
                                    <div class="">
                                     <img  src="../Resources/images/PUP/blackline.png" style="height:25%; width:100%; "> 
                                    </div>
                                    <br>
                                 <h5>Expenses Details:</h5> 
                                  <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th>Itenerary Description</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                        $sql = "SELECT * FROM `srg_fms_t_expenses_summary` AS SUMEXP  
                                                                INNER JOIN `srg_fms_t_expenses` AS EXP ON EXP.Ex_SumBatch = SUMEXp.ES_No
                                                                     WHERE EXP.Ex_SumBatch = $ids ";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                        while($row = mysqli_fetch_assoc($result))
                                                        { 
                                                          $No = $row['Ex_No'];
                                                          $name = $row['Ex_Description'];
                                                          $price = $row['Ex_Amount'];

                                                    ?>

                                                    <tr class="gradeX">
                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                        <td> <?php echo $name; ?> </td>
                                                        <td> <?php echo "₱ "; ?><?php echo $price; ?></td>
                                                        
                                                    </tr>

                                          


                                                    <?php
                                                 }
                                            ?>          
                                                    <tr class="gradeX">
                                                        <td style="display: none"> ---- </td>
                                                        <td style="text-align: right"><b> Total Amount: </b></td>
                                                        <td> <?php echo "₱ "; ?><?php echo $total; ?></td>
                                                        
                                                    </tr>   
                                        </tbody>
                                    </table>
                                         <div class="">
                                             <img  src="../Resources/images/PUP/blackline.png" style="height:25%; width:100%; "> 
                                        </div>
                                    <!--ASIGNATORIES-->
                                     <table style="margin-top: 20px">
                                           <!--
                                                        <thead>
                                                            <th style="width: 100px">Prepared By:</th>
                                                            <th style="width: 200px"></th>
                                                            <th style="width: 100px">Submitted By:</th>
                                                            <th style="width: 180px"></th>
                                                        </thead>
                                            -->             
                                                        <tbody>
                                                             <!--SPACER-->
                                                            <tr >
                                                                <td style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                   
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                  
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b></b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    
                                                                </td>
                                                            </tr>
                                                               <tr >
                                                                <td style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                   
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                  
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b></b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <!--END SPACER-->
                                                            <tr >
                                                                <td style="width: 10%"><b>Prepared By:</b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                    
                                                               </h5> 
                                                                </td>
                                                                
                                                            </tr>
                                                            <!--SPACER-->
                                                            <tr >
                                                                <td style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                   
                                                                       <?php
                                                                            $sqlemp= "SELECT * FROM `srg_r_members` AS MEM INNER JOIN srg_r_accounts AS ACC ON MEM.ID = ACC.ACC_Ref_Member where ACC.ACC_Type = 'Treasurer' and Status = 'Active' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                      {
                                                                                          $fname = $row['First_Name'];
                                                                                          $lname = $row['Last_Name'];
                                                                                          $gen = $row['Generation'];
                                                                                          $position = $row['ACC_Type'];

                                                                                           echo "<b>$fname  $lname</b> <br>";
                                                                                           echo "<i>$position, SRG $gen Gen</i>";
                                                                                      }
                                                                                                            
                                                                       ?>
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                  
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b></b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    
                                                                </td>
                                                            </tr>
                                                              <!--SPACER-->
                                                            <tr >
                                                                <td style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                   
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                  
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b></b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    
                                                                </td>
                                                            </tr>
                                                               <tr >
                                                                <td style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                   
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                  
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b></b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <!--END SPACER-->
                                                            <tr >
                                                                <td style="width: 13%"><b>Generated From:</b></td>
                                                                <td style="text-align: left; width: 40%">
                                                                    
                                                               </h5> 
                                                                </td>
                                                                
                                                            </tr>
                                                            <!--SPACER-->
                                                            <tr >
                                                                <td style="width: 13%"><b></b></td>
                                                                <td style="text-align: left; width: 40%">
                                                                       SRG Financial Management System
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b></b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                  
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b></b></td>
                                                                <td style="text-align: left; width: 10%;">
                                                                    
                                                                </td>
                                                            </tr>
                              

                                                        </tbody>
                                                    </table>
                                            </div>
                                           
                        </div>
                    <!--END OF PRINTABLE-->
                            <div class="row">
                                <div class="col-md-12" style="text-align: right">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                    <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print Details</button>
                                    <a href="FMSVIEWExpenses.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to the list of Expenses</a>  
                                </div>
                            </div>
                           
                        </div>
                    </section>
                </div>
            </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


    <script> 
    function printDiv(printablearea)
    {
        var printContents = document.getElementById(printablearea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        
        window.print();
        
        document.body.innerHTML = originalContents;
    }
    </script>

</body>
</html>
