  
<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');


            if(isset($_POST['OFFEvaluateNEW'])) //FOR ACQUIRING NEW ITEMS FROM DIFFERENT MODES
            {

                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $name = $_POST['a_new_name'];
                $quan = $_POST['a_new_quan'];
                $cat = $_POST['a_new_category'];
                $sku = $_POST['a_new_sku'];
                $unit = $_POST['a_new_unit'];

               
                $insert = "INSERT INTO ims_r_office_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan')";
                
                mysqli_query($db,$insert);


                $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$supplier')";
                   
                mysqli_query($db,$acqins);
                header("location: INSacquire.php");
                //header("location: INSacquire.php?#about");
            }


            else if(isset($_POST['OFFEvaluateOLD'])) //FOR ACQUIRING EXISTING ITEMS FROM DIFFERENT MODES
            {


                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $sku = $_POST['a_name'];
                $quan = $_POST['a_quan'];

                $update = mysqli_query($db,"UPDATE ims_r_office_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                mysqli_query($db,$update);

                $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$supplier')";
                 mysqli_query($db,$acqins);

                 header("location: INSacquire.php");

                         
                                                                 
              
               
            }

            
            else if(isset($_POST['OFFDevAcquireOLD'])) //FOR ACQUIRING PUP MAIN DELIVERY FROM REQUEST (OLD ITEM)
            {

                $batch = $_POST['a_batch'];
                $No = $_POST['a_No'];
                $DelDate = $_POST['a_procdate'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_old_sku'];
              // $desc = $_POST['a_description'];
              //  $rem = $_POST['a_remarks']; 

                   $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                   mysqli_query($db,$statupdate);
                                
                   $update = mysqli_query($db,"UPDATE ims_r_office_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                   mysqli_query($db,$update);
                                


                  $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Supplier, Request_Batch_No)     
                            VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', 'PUP MAIN', '$batch')";
                  mysqli_query($db,$acqins);


                  $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND REQ.Batch_No = $batch";

                            $result = mysqli_query($db,$sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                                {
                                      $status = $row['Status'];
                                      if($status == "PENDING")
                                      {
                                        header("location: INSReviewAcquire.php?viewrequests=$batch");
                                      }
                                      else if($status == "ACQUIRED")
                                      {
                                        header("location:INSAcqDet.php");
                                      }
                                }
            }







            else if(isset($_POST['OFFDevAcquireNEW'])) //FOR ACQUIRING PUP MAIN DELIVERY FROM REQUEST (NEW ITEM)
            {

                $batch = $_POST['a_batch'];
                $No = $_POST['a_No'];
                $DelDate = $_POST['a_procdate'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_new_sku'];
                $unit = $_POST['a_new_unit'];
               // $desc = $_POST['a_description'];
               // $rem = $_POST['a_remarks']; 

              
                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                                mysqli_query($db,$statupdate);
                                
                    $insert = "INSERT INTO ims_r_office_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan')";
                
                     mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Supplier, Request_Batch_No)     
                                   VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', 'PUP MAIN', '$batch')";
                    mysqli_query($db,$acqins);


              
                      $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND REQ.Batch_No = $batch";

                            $result = mysqli_query($db,$sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                                {
                                      $status = $row['Status'];
                                      if($status == "PENDING")
                                      {
                                        header("location: INSReviewAcquire.php?viewrequests=$batch");
                                      }
                                      else if($status == "ACQUIRED")
                                      {
                                        header("location:INSAcqDet.php");
                                      }
                                }

            }



?>


