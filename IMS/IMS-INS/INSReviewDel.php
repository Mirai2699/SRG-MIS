<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>


    <title>Review Delivery | PUPQCIMS</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a  href="INSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="INSDelDet.php">
                        <i class="fa fa-truck"></i>
                        <span>Delivery</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-download"></i>
                        <span>Acquisition</span>
                    </a>
                    <ul class="sub">
                        <li><a href="INSacquire.php">Entry Items</a></li>
                        <li><a href="INSAcqDet.php">Acquired</a></li>      
                    </ul>
                </li>
                <li>
                    <a href="INSInvStats.php">
                        <i class="fa fa-tasks"></i>
                        <span>Inventory Status</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="INSrepacquired.php">Acquisition</a></li>  
                        </li>
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
      <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="INSmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="INSRelsReq.php">Released / Printed Requests</a></li>
                    <li><a href="INSReviewRels.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
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
                            $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $daterels = $row['Date_Released'];
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Batch No.</label>
                                            <input type="text" name="Batch_Num" value="<?php echo $ids; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                               <div class="row" style="padding-left: 15px;" >
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Requested</label>
                                            <input type="Date" name="Drequested" value="<?php echo $datereq; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Released</label>
                                            <input type="Date" name="Date_Print" value="<?php echo $daterels; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
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
                                    <label>Requests</label>
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th>Item Name</th>
                                                    <th style="width:250px">Category</th> 
                                                    <th style="width:150px">Unit</th>
                                                    <th style="width:150px">Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['OFF_Name'];
                                                      $cat = $row['OFF_Category'];    
                                                      $unit = $row['OFF_Unit'];
                                                      $quantity = $row['OFF_Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $cat; ?> </td>
                                                    <td> <?php echo $unit; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                    
                                            
                                                    
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                    </div>
                                </div>
                            </div>
                            <!--<a data-toggle="modal" class="btn btn-success" href="DMPrintRequest.php?viewrequests=<?php echo $ids; ?>">View</a>-->

                                <div class="col-md-12" style="text-align: right">
                                    <div class="form-group" style="padding-top:22px; text-align: right">
                                         <?php  

                                        //$ids = $row['Batch_No'];
                                        $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";
                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                        {  
                                            $batch = $row["Batch_No"];
                                            $status = $row["Accept_Status"];
                                            if($status == "PENDING")
                                            {
                                            echo "
                                                <a data-toggle='modal' href='#delivery' class='btn btn-default' style=' background-color: green ; padding-left: '>
                                                <i class='fa fa-check'></i>
                                                Delivered
                                                </a> 
                                            "; }
                                         ?>
                                          



                                        &nbsp&nbsp
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delivery" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                <strong>
                                                                    By confirming, you will be redirected to the acquiring items section.<br>
                                                                    Do you want to proceed?
                                                                </strong>
                                                            </div>
                                                            <br>
                                                        <center>
                                                        <form role="form" action="ChangeStat.php" method="POST">
                                                            <div class="form-group">
                                                                <input type="hidden" name="r_batch" value="<?php echo $ids ?>">
                                                            </div>
                                                            <input type="Date" name="DeliveredDate" class="form-control" value="<?php echo date('Y-m-d')?>" style="color: black; display:none"  />
                                                              <div class="panel" style="height: 80%; width: 80%">
                                                                    <img alt="" src="../../Resources/images/PUP/receive.png" style="height: 20%; width: 20%"><br>
                                                                    
                                                                </div>
                                                            </center>
                                                                <div class="panel" style="height: 50%; width: 100%">
                                                                    <button class="btn btn-success btn-lg" type="submit" name="INSDelivered">Yes</button> &nbsp&nbsp&nbsp&nbsp
                                                                    <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                </div>
                                                                <br>
                                                            </div>
                                                          </form>
                                                    </div>
                                        </div>  


                                       
                                        <?php } ?> 

                                        &nbsp&nbsp
                                        <a href="DMRelsReq.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Released Requests</a>          
                                    </div>
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
<!--right sidebar start-->
<div class="right-sidebar">
    <div class="search-row">
        <input type="text" placeholder="Search" class="form-control">
    </div>
    <div class="right-stat-bar">
        <ul class="right-side-accordion">
        <li class="widget-collapsible">
            <ul class="widget-container">
                <li>
                    <div class="prog-row side-mini-stat clearfix">
                        <div class="side-graph-info">
                            <h4>Target sell</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="target-sell">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>product delivery</h4>
                            <p>
                                55%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-delivery">
                                <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info payment-info">
                            <h4>payment collection</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-collection">
                                <span class="pc-epie-chart" data-percent="45">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>delivery pending</h4>
                            <p>
                                44%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="d-pending">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="col-md-12">
                            <h4>total progress</h4>
                            <p>
                                50%, Deadline 12 june 13
                            </p>
                            <div class="progress progress-xs mtop10">
                                <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        </ul>
    </div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->


    <script type="text/javascript">
    $(document).ready(function(){
        "use strict";
        
        $('.btn-message').click(function(){
            swal("Here's a message!");
        });
        
        $('.btn-title-text').click(function(){
            swal("Here's a message!", "It's pretty, isn't it?")
        });

        $('.btn-timer').click(function(){
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        });
        
        $('.btn-successs').click(function(){
            swal("Good job!", "You clicked the button!", "success");
        });
        
        $('.btn-warning-confirm').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "Your imaginary file has been deleted!", "success");
            });
        });
        
        $('.btn-warning-cancel').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm){
              swal("Deleted!", "Your imaginary file has been deleted!", "success");
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            });
        });
        
        $('.btn-custom-icon').click(function(){
            swal({
                title: "Sweet!",
                text: "Here's a custom image.",
                imageUrl: 'images/favicon/apple-touch-icon-152x152.png'
            });
        });
        
        $('.btn-message-html').click(function(){
            swal({
                title: "HTML <small>Title</small>!",
                text: 'A custom <span style="color:#F8BB86">html<span> message.',
                html: true
            });
        });
        
        $('.btn-input').click(function(){
            swal({
                title: "An input!",
                text: 'Write something interesting:',
                type: 'input',
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something",
            },
            function(inputValue){
                if (inputValue === false) return false;
        
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false;
                }
            
                swal("Nice!", 'You wrote: ' + inputValue, "success");
        
            });
        });
        
        $('.btn-theme').click(function(){
            swal({
                title: "Themes!",
                text: "Here's the Twitter theme for SweetAlert!",
                confirmButtonText: "Cool!",
                customClass: 'twitter'
            });
        });
        
        $('.btn-ajax').click(function(){
          swal({
            title: 'Ajax request example',
            text: 'Submit to run ajax request',
            type: 'info',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          }, function(){
            setTimeout(function() {
              swal('Ajax request finished!');
            }, 2000);
          });
        });
        
    });
    </script>

<script id="DMNotif" src="../js/DMNotification.js"></script>
</body>
</html>
