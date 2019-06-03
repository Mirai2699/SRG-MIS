<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");
    
?>

<style type="text/css" media="print">
	
	@page{ size: a4;

	}
</style>
    <title>Acquisition Report | PUPQC IMS</title>



<!--logo end-->
<script src="../js/code/highcharts.js"></script>
<script src="../js/code/modules/data.js"></script>
<script src="../js/code/modules/drilldown.js"></script>

<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a  href="INSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                   <a href="INSacquire.php">
                        <i class="fa fa-download"></i>
                        <span>Entry Items</span>
                   </a>
                </li>
                <li>
                    <a href="INSInvStats.php">
                        <i class="fa fa-tasks"></i>
                        <span>Inventory Status</span>
                    </a>
                </li>
                 <li>
                    <a  href="INShistory.php">
                        <i class="fa fa-backward"></i>
                        <span>History</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="INSreport.php">
                        <i class="fa fa-file-o"></i>
                        <span>Printables</span>
                    </a>
                </li>
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
                    <li><a href="INSmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="INSrepacquired.php">Acquisition Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
    
     <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Inventory of Office Supply Items Stocks Report
                    </header>
                <!--CHART-->

                <form class="col s12" method="POST">
              
                  <div class="panel-body">
                    <div class="adv-table">
                        <div class="col-md-12" style="text-align: left">
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter Type:</label>
                                    <select class="form-control" name="filterstat" style="color: black;">
                                        <option selected value="ALL">All</option>
                                        <option value="CATEGORY">By Category</option>
                                        <option value="MODE">By Mode of Procurement</option>
                                   </select>
                                   <br>
                               </div>
                             </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                <label>Filter by Category</label>
                                    <select class="form-control" name="Category" style="color: black;">
                                         <option selected value="ALL">All</option>
                                                        <?php  
                                                                $sqlemp= "SELECT * FROM `srg_ims_r_itemcategory`";
                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $categ = $row['Category_Name'];
                                                                    $catid = $row['Category_ID'];
                                                         ?>
                                       <option value="<?php echo $categ ?>"><?php echo "$categ"; ?></option>
                                                        <?php 
                                                            } 
                                                        ?>
                                   </select>
                                   <br>
                               </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter by Mode Of Procurement</label>
                                    <select class="form-control" name="Mode" style="color: black;">
                                         <option selected value="ALL">All</option>
                                                        <?php  
                                                                $sqlemp= "SELECT DISTINCT Mode_Procured FROM `srg_ims_r_inventory`";
                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $Mode = $row['Mode_Procured'];
                                                         ?>
                                       <option value="<?php echo $Mode ?>"><?php echo "$Mode"; ?></option>
                                                        <?php 
                                                            } 
                                                        ?>
                                   </select>
                                   <br>
                               </div>
                             </div>
                           
                             
                             <div class="col-md-1"  style="text-align: left; padding-top: 22px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" name="FilterInventory" style=""><i class="fa fa-refresh"></i> Filter</button> 
                                   
                                </div>
                             </div>
                             <div class="col-md-1"  style="text-align: right; padding-top: 22px">
                                <div class="form-group">
                                     <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br>
                                </div>
                             </div>
                             
                         <!--      <div class="col-md-1"  style="text-align: right; padding-top: 22px">
                                <div class="form-group">
                                     <a  href="Testprint.php" class="btn  btn-danger" name="Print"><i class="fa fa-print"></i>   Test Print</a><br>
                                </div>
                             </div> -->
                              
                              

                              
                        </div>
                         
                    </form>
                   <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr >
                                    <th style="display: none; ">No</th>
                                    <th style="width: 25%; text-align: center">Item Description</th>
                                    <th style="width: 5%; text-align: center">Item Quantity</th>
                                    <th style="width: 10%; text-align: center">Serial #</th>
                                    <th style="width: 10%; text-align: center">Acquired By:</th>
                                    <th style="width: 20%; text-align: center">Vendor or Lessor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  include("MasterReportView.php");
                                ?>
                            </tbody>
                    </table>


                    <!--PRINTABLE FORM-->
                         <div style="display: none" id="printablearea">
                          <header>  
                                 <div class="">
                                     <img  src="../../Resources/images/PUP/QCOSASheader.png" style="height:25%; width:50%; "> 
                                </div>
                                 <div class="">
                                     <img  src="../../Resources/images/PUP/blackline.png" style="height:25%; width:100%; "> 
                                </div>
                          </header>
                                <br><br>
                                <div style="margin-top: 20px; margin-left: 15px">
                                     <center>
                                            <b style="font-size: 20px">EQUIPMENT INVENTORY</b>
                                    </center>
                                    <br>
                                 <table>
                                    <tbody>
                                        <tr >
                                              <td style="width: 1%"><b style="font-size: 16px">Organization:</b></td>
                                              <td style="text-align:left; width: 30%">
                                                <u style="font-size: 16px">PUP ICTC - Software Research Group</u>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px">INVENTORY PERIOD:</b></td>
                                         </tr>
                                          <tr >
                                              <td style="width: 1%"><b style="font-size: 16px"></b></td>
                                              <td style="text-align:left; width: 30%">
                                                <u style="font-size: 16px"></u>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px">BEGINNING DATE OF INVENTORY:</b>
                                                <u style="font-size: 16px">
                                                <?php  $view_query = mysqli_query($connection,"SELECT * FROM srg_ims_r_history order by HST_Date_Modified DESC limit 1");
                                                    while($row = mysqli_fetch_assoc($view_query))
                                                     {
                                              
                                                        $DH = $row["HST_Date_Modified"];
                                                        $Modified = date('F d, Y',strtotime($DH));
                                                        echo $Modified;
                                           
                                                  }
                                                ?>
                                              </u>
                                              </td>
                                         </tr>
                                           <tr >
                                              <td style="width: 1%"><b style="font-size: 16px"></b></td>
                                              <td style="text-align:left; width: 30%">
                                                <u style="font-size: 16px"></u>
                                              </td>
                                              <td  style="width: 20%"><b style="font-size: 16px">ENDING DATE OF INVENTORY:</b>
                                                <u style="font-size: 16px">
                                                    <?php echo date('F d, Y') ?>
                                                </u>
                                              </td>
                                         </tr>
                                      </tbody>
                                   </table>
                                   
                                    <br>
                                    <h5>Items/Furniture:</h5> 
                                   <table  class="display table table-bordered table-striped" id="dynamic-table">
                                            <thead>
                                                <tr >
                                                    <th style="display: none; ">No</th>
                                                    <th style="width: 8%; text-align: center">Item Description</th>
                                                    <th style="width: 15%; text-align: center">Item Quantity</th>
                                                    <th style="width: 10%; text-align: center">Serial #</th>
                                                    <th style="width: 10%; text-align: center">Acquired By:</th>
                                                    <th style="width: 5%; text-align: center">Vendor or Lessor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  include("MasterReportView.php");
                                                ?>
                                        </tbody>
                                    </table>
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
                                                                    <b><u>
                                                                       <?php
                                                                            $sqlemp= "SELECT * FROM `srg_r_members` where Position = 'Assistant Project Manager' and Status = 'Active' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                      {
                                                                                          $fname = $row['First_Name'];
                                                                                          $lname = $row['Last_Name'];
                                                                                          //$position = $row['Position'];
                                                                                           echo "$fname  $lname";
                                                                                      }
                                                                                                            
                                                                       ?>
                                                               </h5> 
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b>POSITION:</b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                    <b><u>
                                                                        SRG - 
                                                                     <?php
                                                                            $sqlemp= "SELECT * FROM `srg_r_members` where Position = 'Assistant Project Manager' and Status = 'Active' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                      {   
                                                                                           $position = $row['Position'];
                                                                                           echo "$position";
                                                                                      }
                                                                                                            
                                                                       ?>
                                                                    </u></b>
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%"><b>DATE:</b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                    <b><u>
                                                                     <?php
                                                                            echo date('F d, Y');           
                                                                       ?>
                                                                    </u></b>
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
                                                            <!--SECOND COLUMN-->
                                                           
                                                            <tr >
                                                                <td style="width: 10%"><b>Approved By:</b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                    <b><u>
                                                                       <?php
                                                                            $sqlemp= "SELECT * FROM `srg_r_members` where Position = 'Project Manager' AND Status = 'Active' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                      {
                                                                                          $fname = $row['First_Name'];
                                                                                          $lname = $row['Last_Name'];
                                                                                          //$position = $row['Position'];
                                                                                           echo "$fname  $lname";
                                                                                      }
                                                                                                            
                                                                       ?>
                                                               </h5> 
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b>POSITION:</b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                    <b><u>
                                                                        SRG - 
                                                                     <?php
                                                                            $sqlemp= "SELECT * FROM `srg_r_members` where Position = 'Project Manager' AND Status = 'Active'";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                      {   
                                                                                           $position = $row['Position'];
                                                                                           echo "$position";
                                                                                      }
                                                                                                            
                                                                       ?>
                                                                    </u></b>
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b>DATE:</b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    <b><u>
                                                                     <?php
                                                                            echo date('F d, Y');           
                                                                       ?>
                                                                    </u></b>
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
                                                            <!--THIRD COLUMN-->
                                                           
                                                            <tr >
                                                                <td style="width: 10%"><b>Approved By:</b></td>
                                                                <td style="text-align: left; width: 20%">
                                                                    <b><u>
                                                                       <?php
                                                                            $sqlemp= "SELECT * FROM `srg_r_members` where Position = 'OSAS Head' AND Status = 'Active' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                      {
                                                                                          $fname = $row['First_Name'];
                                                                                          $lname = $row['Last_Name'];
                                                                                          //$position = $row['Position'];
                                                                                           echo "Prof. $fname  $lname";
                                                                                      }
                                                                                                            
                                                                       ?>
                                                               </h5> 
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width: 10%"><b>POSITION:</b></td>
                                                                <td style="text-align: left; width: 30%">
                                                                    <b><u>
                                                                       Office of the Student Affairs and Services
                                                                    </u></b>
                                                                </td>
                                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                                                <td  style="width:5%;"><b>DATE:</b></td>
                                                                <td style="text-align: left; width: 20%;">
                                                                    <b><u>
                                                                    _____________________
                                                                    </u></b>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                            </div>
                           <footer>  
                           	 <center>
                                 <div class="center-block">
                                     <img  src="../../Resources/images/PUP/PUPQCFooter.png" style="height:25%; width:80%; "> 
                                </div>
                             <center>
                                
                          </footer>
                                           
                        </div>
                    <!--END OF PRINTABLE-->


                        
                      <!--END AFTER PRINTABLE-->
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
