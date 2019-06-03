<?php
       include("../../db.php");


             //////OFFICE SUPPLY  INVENTORY REPORT FILTERATION
         if(isset($_POST['FilterInventory']))
        {
                        
                
               

                        if($_POST['filterstat']=="ALL")
                        {
                        
                              $view_query = mysqli_query($connection,"SELECT * FROM srg_ims_r_inventory ORDER BY Stock_Key_Unit");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Item_No"];
                                            $SKU = $row["Stock_Key_Unit"];
                                            $name = $row["Item_Name"];  
                                            $quan = $row["Quantity"];
                                            $proc = $row["Mode_Procured"]; 
                                            $supp = $row["Supplier"];

                                            echo
                                            "<tr>                                                     
                                                    <td style='text-align: center; width:25%'>  ".$name." </td>
                                                    <td style='text-align: center; width:5%'>  ".$quan."   </td>
                                                    <td style='text-align: center; width:10%'>  ".$SKU." </td>
                                                    <td style='text-align: center; width:10%'>  ".$proc." </td>
                                                    <td style='text-align: center; width:20%'>  ".$supp." </td>
                                            </tr>  ";
                                                        
                                        }
                                
                        }
                        
                        else if($_POST['filterstat']=="CATEGORY")
                        {    


                             $cats = $_POST['Category'];
                               $view_query = mysqli_query($connection,"SELECT * FROM srg_ims_r_inventory
                                                        WHERE Item_Category = '$cats' ORDER BY Stock_Key_Unit");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Item_No"];
                                            $SKU = $row["Stock_Key_Unit"];
                                            $name = $row["Item_Name"];  
                                            $quan = $row["Quantity"];
                                            $proc = $row["Mode_Procured"]; 
                                            $supp = $row["Supplier"];

                                            echo
                                            "<tr>                                                     
                                                    <td style='text-align: center; width:25%'>  ".$name." </td>
                                                    <td style='text-align: center; width:5%'>  ".$quan."   </td>
                                                    <td style='text-align: center; width:10%'>  ".$SKU." </td>
                                                    <td style='text-align: center; width:10%'>  ".$proc." </td>
                                                    <td style='text-align: center; width:20%'>  ".$supp." </td>
                                            </tr>  ";
                                                        
                                        }
                        }
                         else if($_POST['filterstat']=="MODE")
                        {    


                             $Mode = $_POST['Mode'];
                               $view_query = mysqli_query($connection,"SELECT * FROM srg_ims_r_inventory
                                                        WHERE Mode_Procured = '$Mode' ORDER BY Stock_Key_Unit");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Item_No"];
                                            $SKU = $row["Stock_Key_Unit"];
                                            $name = $row["Item_Name"];  
                                            $quan = $row["Quantity"];
                                            $proc = $row["Mode_Procured"]; 
                                            $supp = $row["Supplier"];

                                            echo
                                            "<tr>                                                     
                                                    <td style='text-align: center; width:25%'>  ".$name." </td>
                                                    <td style='text-align: center; width:5%'>  ".$quan."   </td>
                                                    <td style='text-align: center; width:10%'>  ".$SKU." </td>
                                                    <td style='text-align: center; width:10%'>  ".$proc." </td>
                                                    <td style='text-align: center; width:20%'>  ".$supp." </td>
                                            </tr>  ";
                                                        
                                        }
                        }

                      
                        
                          
        }



?>