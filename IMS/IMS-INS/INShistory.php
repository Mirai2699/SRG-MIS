<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");

?>


<title>History (Logs) | SRG-IMS</title>

<!--sidebar start-->
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
                    <a class="active"  href="INShistory.php">
                        <i class="fa fa-backward"></i>
                        <span>History</span>
                    </a>
                </li>
                <li>
                    <a href="INSreport.php">
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
                    <li><a href="INSAcqDet.php">Acquired Items</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
  
         <!-- START CONTENT -->
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                                SRG Supplies Inventory Modification Log History
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none;">No</th>
                                    <th style="width: 10%">Date of Entry</th>
                                    <th style="width: 10%">Date Modified</th>
                                    <th style="width: 10%">SKU</th>
                                    <th style="width: 10%">Category</th>
                                    <th style="width: 10%">Quantity</th>
                                    <th style="width: 10%">Mode of Procurement</th>
                                    <th style="width: 10%">Supplied By:</th>
                                    <th style="width: 10%">Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_ims_r_history ORDER BY History_ID DESC");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["History_ID"];
                                            $DE = $row["HST_Date_Entry"];
                                            $DH = $row["HST_Date_Modified"];
                                            $name = $row["HST_SKU"];       
                                            $category = $row["HST_Category"]; 
                                            $quan = $row["HST_Quantity"];
                                            $proc = $row["HST_Mode_Procured"]; 
                                            $supp = $row["HST_Supplier"];
                                            $transact = $row["HST_Trasanct"];
                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none;"><?php echo $No; ?></td>
                                                <td style="width: 8%"><?php echo $DE; ?></td>
                                                <td style="width: 8%"><?php echo $DH; ?></td>
                                                <td style="width: 8%"><?php echo $name; ?></td>
                                                <td style="width: 8%"><?php echo $category; ?></td>
                                                <td style="width: 8%"><?php echo $quan; ?></td>
                                                <td style="width: 8%"><?php echo $proc; ?></td>
                                                <td style="width: 8%"><?php echo $supp; ?></td>
                                                <td style="width: 8%"><?php echo $transact; ?></td>
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
