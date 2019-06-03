
<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
    


    /////  CRITICAL LEVEL SETUP

            //Office Supplies Critical Level
            if(isset($_POST['OfficeChangeCrit']))
            {
                $crit = $_POST['Critlevel'];

                $critupdate = mysqli_query($db,"UPDATE ims_r_office_stock SET Critical_level = '$crit' "); 
                mysqli_query($db,$critupdate);
               
                header('location: SA_Supp_Office.php');


            }
            //Clinical Supplies Critical Level
            else if(isset($_POST['ClinicChangeCrit']))
            {
                $crit = $_POST['Critlevel'];

                $critupdate = mysqli_query($db,"UPDATE ims_r_clinical_stock SET Critical_level = '$crit' "); 
                mysqli_query($db,$critupdate);
               
                header('location: SA_Supp_Clinic.php');


            }
            //Medicine Supplies Critical Level
            else if(isset($_POST['MedicChangeCrit']))
            {
                $crit = $_POST['Critlevel'];

                $critupdate = mysqli_query($db,"UPDATE ims_r_medicinal_stock SET Critical_level = '$crit' "); 
                mysqli_query($db,$critupdate);
               
                header('location: SA_Supp_Medic.php');


            }



    /////  INVENTORY SETUP

            else if(isset($_POST['OFFICEINVinsert']))
            {

                $sku = $_POST['a_sku'];
                $name = $_POST['a_name'];
                $cat = $_POST['a_category'];
                $unit = $_POST['a_unit'];
                $quan = $_POST['a_quan'];
                               
                $itemsins = "INSERT INTO ims_r_office_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity) 
                             VALUES ('$sku','$name','$cat','$unit' ,'$quan')";
                   

                 mysqli_query($db,$itemsins);

                // echo $sku;
                // echo $name;
                // echo $cat;
                // echo $unit;
                // echo $quan;
                 header('location: SA_Supp_Office.php');

            }


             else if(isset($_POST['CLINICINVinsert']))
            {

                $sku = $_POST['a_sku'];
                $name = $_POST['a_name'];
                $cat = $_POST['a_category'];
                $unit = $_POST['a_unit'];
                $quan = $_POST['a_quan'];
                               
                $itemsins = "INSERT INTO ims_r_clinical_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity) 
                             VALUES ('$sku','$name','$cat','$unit' ,'$quan')";
                   

                 mysqli_query($db,$itemsins);

                 header('location: SA_Supp_Clinic.php');

            }

            else if(isset($_POST['MEDICINVinsert']))
            {

                $code = $_POST['a_code'];
                $name = $_POST['a_name'];
                $cat = $_POST['a_category'];
                $unit = $_POST['a_unit'];
                $quan = $_POST['a_quan'];
                               
                $itemsins = "INSERT INTO ims_r_medicinal_stock(Med_Code, Med_Name, Med_Category, Unit, Quantity) 
                             VALUES ('$code','$name','$cat','$unit' ,'$quan')";
                   

                 mysqli_query($db,$itemsins);

                 header('location: SA_Supp_Medic.php');

            }




            else if(isset($_POST['OFFICEChangeInv']))
            {

                $no = $_POST['item_No'];
                $name = $_POST['item_name'];
                $cat = $_POST['item_cat'];
               // $unit = $_POST['item_unit'];
                $quan = $_POST['item_quan'];
                               
                $itemsins = mysqli_query($db,"UPDATE ims_r_office_stock SET Item_Name = '$name', 
                                                                     Item_Category = '$cat',
                                                                    -- Unit = '$unit',
                                                                     Quantity = '$quan'
                                                    WHERE Item_No = '$no' "); 
                   

                 mysqli_query($db,$itemsins);

                 header('location: SA_Supp_Office.php');

            }

           else if(isset($_POST['CLINICChangeInv']))
            {

                $no = $_POST['item_No'];
                $name = $_POST['item_name'];
                $cat = $_POST['item_cat'];
               // $unit = $_POST['item_unit'];
                $quan = $_POST['item_quan'];
                               
                $itemsins = mysqli_query($db,"UPDATE ims_r_clinical_stock SET Item_Name = '$name', 
                                                                     Item_Category = '$cat',
                                                                    -- Unit = '$unit',
                                                                     Quantity = '$quan'
                                                    WHERE Item_No = '$no' "); 
                   

                 mysqli_query($db,$itemsins);

                 header('location: SA_Supp_Clinic.php');

            }

             else if(isset($_POST['MEDICChangeInv']))
            {

                $no = $_POST['item_No'];
                $name = $_POST['item_name'];
                $cat = $_POST['item_cat'];
               // $unit = $_POST['item_unit'];
                $quan = $_POST['item_quan'];
                               
                $itemsins = mysqli_query($db,"UPDATE ims_r_medicinal_stock SET Med_Name = '$name', 
                                                                     Med_Category = '$cat',
                                                                    -- Unit = '$unit',
                                                                     Quantity = '$quan'
                                                    WHERE Med_No = '$no' "); 
                   

                 mysqli_query($db,$itemsins);

                 header('location: SA_Supp_Medic.php');

            }
           
                        


?>


