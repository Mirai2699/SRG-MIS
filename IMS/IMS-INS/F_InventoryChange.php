
<?php
   
        $db = mysqli_connect('localhost','root','','srg_mis');
    




      if(isset($_POST['ChangeInv']))
            {

                $no = $_POST['item_No'];
                $sku = $_POST['item_sku'];
                $name = $_POST['item_name'];
                $cat = $_POST['item_cat'];
                $EntDate = $_POST['dateentry'];
                $ModDate = date('Y-m-d');
               // $unit = $_POST['item_unit'];
                $quan = $_POST['item_quan'];
                               
                $itemsins = mysqli_query($db,"UPDATE srg_ims_r_inventory SET Item_Name = '$name', 
                                                                     Item_Category = '$cat',
                                                                    -- Unit = '$unit',
                                                                     Quantity = '$quan'
                                                    WHERE Item_No = '$no' "); 
                   

                 //mysqli_query($db,$itemsins);

                $history = "INSERT INTO srg_ims_r_history(HST_Date_Entry, HST_Date_Modified, HST_SKU, HST_Category, HST_Quantity, HST_Mode_Procured, HST_Supplier, HST_Trasanct)     
                             VALUES ('$EntDate','$ModDate', '$sku', '$cat', '$quan', '(Stock Modified)', '(Stock Modified)', '(Stock Modified)')";
                   
                 mysqli_query($db,$history);
               
                 header('location: INSInvStats.php');

            }

           
                        


?>


