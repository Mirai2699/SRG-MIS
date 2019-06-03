<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");
?>


    <title>Inventory Status | PUPQC IMS</title>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a href="INSmainpage.php">
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
                    <a class="active"  href="INSInvStats.php">
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
                    <li><a href="INSInvStats.php">Current Status of Inventory</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
 
         <!-- START CONTENT -->
         <section id="content">
          <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Current Quantity of Stock in the Inventory    
                    </header>

                <div>
                    <script src="../../Resources/IMS/js/code/highcharts.js"></script>
                    <script src="../../Resources/IMS/js/code/modules/data.js"></script>
                    <script src="../../Resources/IMS/js/code/modules/exporting.js"></script>

                    <div id="inventory" style="width: 98%; height: 400px;"></div>

                           
                    

                    <script type="text/javascript">
                        Highcharts.chart('inventory', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Inventory Status'
                        },
                        subtitle: {
                            text: 'Click the columns to view items within these categories.'
                        },
                        xAxis: {
                            type: 'category',
                            title: {
                                text: null
                            },
                            min: 0,
                            scrollbar: {
                                enabled: true
                            },
                            tickLength: 0
                        },
                        yAxis: {
                            title: {
                                text: null
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: false,
                                    format: '{point.y:.0f}'
                                }
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
                        },

                        series: [
                            {
                                name: "Inventory Status",
                                colorByPoint: true,
                                data: [
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT DISTINCT Item_Category FROM `srg_ims_r_inventory` ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {   
                                                    $InvCategory = $row["Item_Category"];
                                                    //$InvQty = $row["Quantity"];
                                    ?> 
                                    {
                                        name: '<?php echo $InvCategory ?>',
                                        y: <?php
                                        $view_query2 = mysqli_query($connection,"SELECT SUM(`Quantity`) AS SumQuantity FROM `srg_ims_r_inventory` WHERE `Item_Category` = '".$InvCategory."'");
                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                {   
                                                    $InvQty = $row2["SumQuantity"];
                                                    echo ($InvQty);
                                                }
                                           ?>,
                                        drilldown: '<?php echo $InvCategory ?>',
                                    },
                                    <?php
                                    }
                                    ?>
                                ]
                            }
                        ],
                        drilldown: {
                            series: [
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT Item_Category FROM `srg_ims_r_inventory` ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                               $InvCategory2 = $row["Item_Category"];
                                ?>
                                {
                                    name: '<?php echo $InvCategory2 ?>',
                                    id: '<?php echo $InvCategory2 ?>',
                                    data: [
                                        <?php
                                        $view_query2 = mysqli_query($connection,"SELECT * FROM `srg_ims_r_inventory` WHERE Item_Category = '".$InvCategory2."'");
                                        while($row2 = mysqli_fetch_assoc($view_query2))
                                            {
                                                $InvQuantity = $row2["Quantity"];
                                                $InvItems = $row2["Item_Name"];
                                                $InvUnit = $row2["Unit"];
                                        ?>
                                        {
                                            name: '<?php echo $InvItems ?>',
                                            y: <?php echo $InvQuantity ?>,
                                        },
                                        <?php
                                        } 
                                        ?>
                                    ]
                                },
                                <?php
                                    }
                                ?>
                            ]
                        }
                    });
                    </script>
                </div>
            </section>





     
         <!-- START CONTENT -->
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                                SRG Office Supplies Inventory Management     
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none;">No</th>
                                    <th style="width: 8%">Stock Key Unit</th>
                                    <th style="width: 15%">Name</th>
                                    <th style="width: 10%">Category</th>
                                    <th style="width: 10%">Unit</th>
                                    <th style="width: 5%">Quantity</th>
                                    <th style="width: 7%">Mode of Procurement</th>
                                    <th style="width: 7%">Supplied By:</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM `srg_ims_r_inventory");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Item_No"];
                                            $date = $row["Date_Entry"];
                                            $SKU = $row["Stock_Key_Unit"];
                                            $name = $row["Item_Name"];       
                                            $category = $row["Item_Category"]; 
                                            $unit = $row["Unit"];  
                                            $quan = $row["Quantity"];
                                            $proc = $row["Mode_Procured"]; 
                                            $supp = $row["Supplier"];

                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                 <td style="display: none;"><?php echo $No; ?></td>
                                                <td style="width: 8%"><?php echo $SKU; ?></td>
                                                <td style="width: 15%"><?php echo $name; ?></td>
                                                <td style="width: 5%"><?php echo $category; ?></td>
                                                <td style="width: 5%"><?php echo $unit; ?></td>
                                                <td style="width: 5%"><?php echo $quan; ?></td>
                                                <td style="width: 10%"><?php echo $proc; ?></td>
                                                <td style="width: 10%"><?php echo $supp; ?></td>
                                                <td style="width: 5%">
                                                    <center>
                                                        <a  data-toggle="modal" href="#Change<?php echo $No; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                                    </center>
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
                                                          <form action="F_InventoryChange.php" method="POST">

                                                                <div class="form-content">
                                                                    
                                                                   
                                                                   
                                                                    <div class="row group">                                                        
                                                                         <input type="hidden" name="item_No" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $No; ?>" />

                                                                        <div class="col-md-4">
                                                                            <div class="form-group"><!--Item SKU-->
                                                                                <input  type="hidden" name="item_sku" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $SKU; ?>"/>
                                                                            </div>
                                                                        </div>
                                                                          <div class="col-md-4">
                                                                            <div class="form-group"><!--Date Entry-->
                                                                                <input  type="hidden" name="dateentry" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $date; ?>"/>
                                                                            </div>
                                                                        </div>
                                                                      
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Current Item Name</label>
                                                                                <input maxlength="150" type="text" name="curr_name" class="form-control" required="" style="color: black;" 
                                                                                value="<?php echo $name; ?>"disabled/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Current Quantity</label>
                                                                                <input maxlength="150" type="text" name="curr_quan" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $quan; ?>"disabled/>
                                                                            </div>
                                                                        </div>
                                                                         <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Modified Item Name</label>
                                                                                <input maxlength="150" type="text" name="item_name" class="form-control" style="color: black;" 
                                                                                placeholder="Change Name" />
                                                                            </div>
                                                                        </div>
                                                                          <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Modified Quantity</label>
                                                                                <input maxlength="150" type="text" name="item_quan" class="form-control" required="" style="color: black;"  
                                                                                placeholder="Change Quantity" />
                                                                            </div>
                                                                        </div>
                                                                         <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input  type="hidden" name="item_cat" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $category; ?>" />
                                                                            </div>
                                                                        </div>

                                                                    
                                                                         
                                                                      
                                                                       
                                                                        <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                </div>
                                                                
                                                                 <div class="panel" style="height: 50%; width: 100%">
                                                                    <button type="submit" class="btn btn-success " name="ChangeInv"><i class="fa  fa-save"></i>   Save</button> &nbsp&nbsp&nbsp&nbsp
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

     
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
