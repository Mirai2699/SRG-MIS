<?php 

include("../db.php");

if(isset($_POST['ChangePrio']))
  {
            
                                           
                                               $No = $_POST["p_No"];
                                               $desc = $_POST["p_desc"];
                                               $priolvl = $_POST["p_level"];
                                               $stat = $_POST["p_status"];
                                               $active = $_POST["p_archive"];

                                               $signout = mysqli_query($connection,"UPDATE srg_fms_t_prio_materials

                                                                                           SET Description = '$desc',
                                                                                               Priolevel = '$priolvl',
                                                                                               Status = '$stat',
                                                                                               Active = '$active'
                                                                                    WHERE No = '$No' "); 

                                           
                                                echo "<script type=\"text/javascript\">".
                                                       "alert
                                                       ('You have successfully Changed the Details!');".
                                                       "</script>";
                                                echo "<script>setTimeout(\"location.href = 'FMSPriority.php'\",0);</script>";
                                        
   }                                         
?>       