<?php
    
    include('../../db.php');

        $No = $_POST['ReqNo'];
        $sku = $_POST['SKU'];
        $Batch = $_POST['r_batch'];
        $name = $_POST['r_name'];
        $unit = $_POST['r_unit'];
        $quan = $_POST['r_quan'];
        $stat = $_POST['r_status'];
        $rmrks = $_POST['r_rmrks'];
        $reason = $_POST['r_reject'];
        $deldate = $_POST['DeliveryDate'];
        $delverd = $_POST['DeliveredDate'];
        $rejdate = $_POST['RejectDate'];

        $retrmks = $_POST['r_retrmks'];
        $defect = $_POST['r_defect'];
        

    
  
  







     ////////  Inspection Officer FUNCTIONS ///////
    if(isset($_POST['INSDelivered']))
    {
        
         $query = mysqli_query($connection,"UPDATE ims_t_summary_request SET Date_Delivered = '$delverd', Accept_Status = 'DELIVERED' 
                                  WHERE Batch_No = '$Batch' "); 
        header("location: INSReviewAcquire.php?viewrequests=$Batch");
    }

   
        

?>


