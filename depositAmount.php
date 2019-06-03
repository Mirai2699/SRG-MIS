<?php
  include ("db.php");
  
  $ID = $_POST['MemID'];
  $Pass = $_POST['Password'];
  $Amount = $_POST['Amount'];

  $Status = 0;
  $Info = 0;
  $view_query = mysqli_query($connection,"SELECT * FROM `srg_r_members` AS MEM
                                          INNER JOIN srg_r_accounts AS ACC 
                                            ON ACC.ACC_Ref_Member = MEM.ID
                                          WHERE MEM.ID = ".$ID." ");
  if(mysqli_num_rows($view_query) > 0)
  {
    while($row = mysqli_fetch_assoc($view_query))
    {
      $MemID = $row["ID"];
      $Fname = $row["First_Name"];
      $Lname = $row["Last_Name"];
      $Info = 1;
    }
  }
  
  $countercheck = mysqli_query($connection,"SELECT aes_decrypt(ACC.ACC_Password,'SRG-MIS') AS ACC_Password 
                                            FROM `srg_r_members` AS MEM
                                            INNER JOIN srg_r_accounts AS ACC 
                                              ON ACC.ACC_Ref_Member = MEM.ID
                                            WHERE ACC.ACC_Type = 'Treasurer' ");    
  while($row2 = mysqli_fetch_assoc($countercheck))
  {
    $checker =  $row2["ACC_Password"];
    if($Pass == $checker) 
    {   
      $update = mysqli_query($connection,"UPDATE srg_fms_r_fund 
                                          SET F_TotalFund = (F_TotalFund + ".$Amount.") 
                                          WHERE F_ID = 1"); 
      $Fullname = $Fname.' '.$Lname;
      $depository = mysqli_query($connection, "INSERT INTO srg_fms_t_deposit(D_Depositor, D_Amount, D_Date_Deposited) 
                                                VALUES ('".$Fullname."', ".$Amount.", CURRENT_TIMESTAMP)");
      $Status = 1;
    }
    else
    {
      $Status = 0;
    }
  }
  echo $Status;
  // json_encode(array('Status' => $Status,'Info' => $Info));
?>