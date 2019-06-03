
<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');


            if(isset($_POST['INSEvaluateNEW'])) //FOR ACQUIRING NEW ITEMS FROM DIFFERENT MODES
            {

                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_new_sku'];
                $unit = $_POST['a_unit'];
                $desc = $_POST['a_description'];
                $rem = $_POST['a_remarks']; 

               

                echo "desc";
                if($desc == "VeryGood")
                {
                    $insert = "INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Critical_level)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan', 10)";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$desc', '$rem', '$supplier')";
                   

                    mysqli_query($db,$acqins);
                    header("location: INSacquire.php?#about");
               }
               else if($desc == "Good")
                {
                    $insert = "INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Critical_level)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan', 10)";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$desc', '$rem', '$supplier')";
                   

                    mysqli_query($db,$acqins);
                    header("location: INSacquire.php?#about");
               }
               else if($desc == "Enough")
                {
                    $insert = "INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Critical_level)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan', 10)";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$desc', '$rem', '$supplier')";
                   

                    mysqli_query($db,$acqins);
                    header("location: INSacquire.php?#about");
               }
               else if($desc == "Defective")
               {
                   

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier, Remarks)     
                             VALUES ('$DelDate', 'PENDING', '$mode', '$name', '$quan', '$desc', '$supplier', '$rem')";
                   

                    mysqli_query($db,$acqinsret);
                    header("location: INSacquire.php");
               }
               else if($desc == "Wrong")
               {
                   

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier, Remarks)     
                             VALUES ('$DelDate', 'PENDING', '$mode', '$name', '$quan', '$desc', '$supplier', '$rem')";
                   

                    mysqli_query($db,$acqinsret);
                    header("location: INSacquire.php");
               }
               else if($desc == "Missing")
               {
                   

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier, Remarks)     
                             VALUES ('$DelDate', 'PENDING', '$mode', '$name', '$quan', '$desc', '$supplier', '$rem')";
                   

                    mysqli_query($db,$acqinsret);
                    header("location: INSacquire.php");
               }
                                
            }


            else if(isset($_POST['INSEvaluateOLD'])) //FOR ACQUIRING EXISTING ITEMS FROM DIFFERENT MODES
            {


                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_old_sku'];
                $desc = $_POST['a_description'];
                $rem = $_POST['a_remarks']; 


                if($desc == "VeryGood")
                {
                    $update = mysqli_query($db,"UPDATE ims_r_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                    mysqli_query($db,$update);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$desc', '$rem', '$supplier')";
                   

                    mysqli_query($db,$acqins);
                    header("location: INSacquire.php?#about");


               }
                else if($desc == "Good")
                {
                    $update = mysqli_query($db,"UPDATE ims_r_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                    mysqli_query($db,$update);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$desc', '$rem', '$supplier')";
                   

                    mysqli_query($db,$acqins);
                    header("location: INSacquire.php?#about");
               }
                else if($desc == "Enough")
                {
                    $update = mysqli_query($db,"UPDATE ims_r_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                    mysqli_query($db,$update);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier)     
                             VALUES ('$DelDate','$mode', '$sku', '$quan', '$desc', '$rem', '$supplier')";
                   

                    mysqli_query($db,$acqins);
                    header("location: INSacquire.php?#about");
               }
               else if($desc == "Defective")
               {
                   

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier, Remarks)     
                             VALUES ('$DelDate', 'PENDING', '$mode', '$name', '$quan', '$desc', '$supplier', '$rem')";
                   

                    mysqli_query($db,$acqinsret);
                    header("location: INSacquire.php");
               }
                else if($desc == "Wrong")
               {
                   

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier, Remarks)     
                             VALUES ('$DelDate', 'PENDING', '$mode', '$name', '$quan', '$desc', '$supplier', '$rem')";
                   

                    mysqli_query($db,$acqinsret);
                    header("location: INSacquire.php");
               }
               else if($desc == "Missing")
               {
                   

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier, Remarks)     
                             VALUES ('$DelDate', 'PENDING', '$mode', '$name', '$quan', '$desc', '$supplier', '$rem')";
                   

                    mysqli_query($db,$acqinsret);
                    header("location: INSacquire.php");
               }
               
            }






            else if(isset($_POST['INSDevAcquireOLD'])) //FOR ACQUIRING PUP MAIN DELIVERY FROM REQUEST (OLD ITEM)
            {

                $batch = $_POST['a_batch'];
                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_old_sku'];
                $desc = $_POST['a_description'];
                $rem = $_POST['a_remarks']; 

                


                if($desc == "VeryGood")
                {

                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdate);
                    
                    $update = mysqli_query($db,"UPDATE ims_r_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                    mysqli_query($db,$update);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier, Request_Batch_No)     
                             VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', '$desc', '$rem', 'PUP MAIN', '$batch')";
                   

                    mysqli_query($db,$acqins);
                     


               }
               if($desc == "Good")
                {

                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdate);
                    
                    $update = mysqli_query($db,"UPDATE ims_r_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                    mysqli_query($db,$update);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier, Request_Batch_No)     
                             VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', '$desc', '$rem', 'PUP MAIN', '$batch')";
                   

                    mysqli_query($db,$acqins);
                     


               }
               if($desc == "Enough")
                {

                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdate);
                    
                    $update = mysqli_query($db,"UPDATE ims_r_stock SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                    mysqli_query($db,$update);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier, Request_Batch_No)     
                             VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', '$desc', '$rem', 'PUP MAIN', '$batch')";
                   

                    mysqli_query($db,$acqins);
                     


               }
               if($desc == "Defective")
                {
                    $statupdateret = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'RETURNED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdateret);

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier)     
                             VALUES ('$DelDate', 'PENDING', DeliveryFromRequest', '$name', '$quan', '$desc',  'PUP MAIN')";
                   

                    mysqli_query($db,$acqinsret);

               }
               if($desc == "Wrong")
                {
                    $statupdateret = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'RETURNED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdateret);

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier)     
                             VALUES ('$DelDate', 'PENDING', DeliveryFromRequest', '$name', '$quan', '$desc',  'PUP MAIN')";
                   

                    mysqli_query($db,$acqinsret);

               }
               if($desc == "Missing")
                {
                    $statupdateret = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'RETURNED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdateret);

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier)     
                             VALUES ('$DelDate', 'PENDING', DeliveryFromRequest', '$name', '$quan', '$desc',  'PUP MAIN')";
                   

                    mysqli_query($db,$acqinsret);

               }

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
                                      else if($status == "ACQUIRED" || "RETURNED")
                                      {
                                        header("location: INSacquire.php");
                                      }
                                }
            }







            else if(isset($_POST['INSDevAcquireNEW'])) //FOR ACQUIRING PUP MAIN DELIVERY FROM REQUEST (NEW ITEM)
            {

                $batch = $_POST['a_batch'];
                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_new_sku'];
                $unit = $_POST['a_unit'];
                $desc = $_POST['a_description'];
                $rem = $_POST['a_remarks']; 

              


                if($desc == "VeryGood")
                {

                      $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                      mysqli_query($db,$statupdate);

                    $insert = "INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Critical_level)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan', 10)";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier, Request_Batch_No)     
                             VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', '$desc', '$rem', 'PUP MAIN', '$batch')";
                   

                    mysqli_query($db,$acqins);
                   
                }
                else if($desc == "Good")
                {

                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                    mysqli_query($db,$statupdate);

                    $insert = "INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Critical_level)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan', 10)";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier, Request_Batch_No)     
                             VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', '$desc', '$rem', 'PUP MAIN', '$batch')";
                   

                    mysqli_query($db,$acqins);
                   
                }
                else if($desc == "Enough")
                {

                      $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                      mysqli_query($db,$statupdate);

                    $insert = "INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Critical_level)     
                             VALUES ('$sku','$name', '$cat', '$unit', '$quan', 10)";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition(Date_Procured, Mode_Acquisition, Item_SKU, Quantity, Item_Desc_Stat, Remarks, Supplier, Request_Batch_No)     
                             VALUES ('$DelDate','DeliveryFromRequest', '$sku', '$quan', '$desc', '$rem', 'PUP MAIN', '$batch')";
                   

                    mysqli_query($db,$acqins);
                   
                }
                else if($desc == "Defective")
                {
                   
                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'RETURNED' WHERE Requisition_No = '$No' "); 
                      mysqli_query($db,$statupdate);

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier)     
                             VALUES ('$DelDate', 'PENDING', 'DeliveryFromRequest', '$name', '$quan', '$desc',  'PUP MAIN')";
                   

                    mysqli_query($db,$acqinsret);
                   
               }
                else if($desc == "Wrong")
                {
                   
                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'RETURNED' WHERE Requisition_No = '$No' "); 
                      mysqli_query($db,$statupdate);

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier)     
                             VALUES ('$DelDate', 'PENDING', 'DeliveryFromRequest',  '$name', '$quan', '$desc',  'PUP MAIN')";
                   

                    mysqli_query($db,$acqinsret);
                   
               }
                else if($desc == "Missing")
                {
                   
                    $statupdate = mysqli_query($db,"UPDATE ims_t_requisition SET Status = 'RETURNED' WHERE Requisition_No = '$No' "); 
                      mysqli_query($db,$statupdate);

                    $acqinsret = "INSERT INTO ims_t_returns(Date_IssRet, Status, Mode_Acquisition, Item_Name, Quantity, Item_Desc_Stat, Supplier)     
                             VALUES ('$DelDate', 'PENDING', DeliveryFromRequest', '$name', '$quan', '$desc',  'PUP MAIN')";
                   

                    mysqli_query($db,$acqinsret);
                   
               }
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
                                      else if($status == "ACQUIRED" || "RETURNED")
                                      {
                                        header("location: INSacquire.php");
                                      }
                                }

            }




     


?>


