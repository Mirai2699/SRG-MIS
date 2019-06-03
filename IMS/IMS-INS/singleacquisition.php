
<?php
   
        $db = mysqli_connect('localhost','root','','srg_mis');


            if(isset($_POST['INSEvaluateNEW'])) //FOR ACQUIRING NEW ITEMS FROM DIFFERENT MODES
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
               // $desc = $_POST['a_description'];
               // $rem = $_POST['a_remarks']; 

               
                $insert = "INSERT INTO srg_ims_r_inventory(Date_Entry, Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity, Mode_Procured, Supplier)     
                             VALUES ('$DelDate', '$sku', '$name', '$cat', '$unit', '$quan', '$mode', '$supplier')";
                
                mysqli_query($db,$insert);


                $history = "INSERT INTO srg_ims_r_history(HST_Date_Entry, HST_Date_Modified, HST_SKU, HST_Category, HST_Quantity, HST_Mode_Procured, HST_Supplier, HST_Trasanct)     
                             VALUES ('$DelDate','$DelDate', '$sku', '$cat', '$quan', '$mode', '$supplier', 'ADDED ITEM')";
                   
                mysqli_query($db,$history);
                header("location: INSacquire.php");
                //header("location: INSacquire.php?#about");

            }

            else if(isset($_POST['INSEvaluateOLD'])) //FOR ACQUIRING EXISTING ITEMS FROM DIFFERENT MODES
            {


                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_oldcategory'];
                $sku = $_POST['a_old_sku'];
               // $desc = $_POST['a_description'];
               // $rem = $_POST['a_remarks']; 


                $update = mysqli_query($db,"UPDATE srg_ims_r_inventory SET Quantity = (Quantity + $quan) WHERE Stock_Key_Unit = '$sku' "); 
                mysqli_query($db,$update);


                 $history = "INSERT INTO srg_ims_r_history(HST_Date_Entry, HST_Date_Modified, HST_SKU, HST_Category, HST_Quantity, HST_Mode_Procured, HST_Supplier, HST_Trasanct)     
                             VALUES ('$DelDate','$DelDate', '$sku', '$cat', '$quan', '$mode', '$supplier', 'ADDED ITEM')";
                   
                mysqli_query($db,$history);
                header("location: INSacquire.php");
                //header("location: INSacquire.php?#about");
              
               
            }





     


?>


