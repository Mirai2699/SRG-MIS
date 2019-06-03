 <?php
   include ("../db.php");
   
   if (isset($_GET['sendid'])) 
        {   
            $No = $_GET['sendid'];
           	$view_query = mysqli_query($connection,"SELECT * FROM `srg_fms_t_reimbursement` WHERE R_No = $No ");
              while($row = mysqli_fetch_assoc($view_query))
              {
                     
                $amount = $row["R_Amount"];
                
			    $update = mysqli_query($connection,"UPDATE srg_fms_t_reimbursement  SET R_Status = 'PAID', R_Date_Paid = CURRENT_TIMESTAMP WHERE R_No = $No ");

			    $fundupdate = mysqli_query($connection,"UPDATE srg_fms_r_fund SET F_TotalFund = (F_TotalFund - $amount) WHERE F_ID = 1 ");
               }
            header("location:FMSVIEWReimburse.php");
        }                                                             
   ?>    