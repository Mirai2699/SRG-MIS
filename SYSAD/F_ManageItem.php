<?php 

include("../db.php");

if(isset($_POST['ChangeCategory']))
  {
            
                                           
                                               $No = $_POST["catno"];
                                               $name = $_POST["catname"];
                                               $desc = $_POST["catdesc"];

                                               $signout = mysqli_query($connection,"UPDATE srg_ims_r_itemcategory

                                                                                           SET Category_Name = '$name',
                                                                                               Category_Desc = '$desc'

                                                                                    WHERE Category_ID = '$No' "); 

                                           
                                                echo "<script type=\"text/javascript\">".
                                                       "alert
                                                       ('You have successfully Changed the Details!');".
                                                       "</script>";
                                                echo "<script>setTimeout(\"location.href = 'SAItemCat.php'\",0);</script>";
                                        
   }         
                                   
?>       