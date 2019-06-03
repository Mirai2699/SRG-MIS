<?php
    include('../db.php');
    $ID = $_POST['ID'];
    $CPass = $_POST['CPass'];
    $NPass = $_POST['NPass'];

    $SRGPassSQL = 'SELECT SRG_A.ACC_ID,
                          aes_decrypt(SRG_A.ACC_Password,"SRG-MIS") AS Pass
                  FROM srg_r_accounts AS SRG_A
                  INNER JOIN srg_r_members AS SRG_M
                    ON SRG_A.ACC_Ref_Member = SRG_M.ID
                  WHERE SRG_A.ACC_ID = '.$ID.'
                  AND aes_decrypt(SRG_A.ACC_Password,"SRG-MIS") = "'.$CPass.'"';
    $SRGPassQuery = mysqli_query($connection,$SRGPassSQL) or die (mysqli_error($connection));
    if(mysqli_num_rows($SRGPassQuery) > 0)
    {
      while($row = mysqli_fetch_assoc($SRGPassQuery))
      {
        $AccID = $row['ACC_ID'];
      }
      $SRGCPassSQL = 'UPDATE srg_r_accounts SET ACC_Password = aes_encrypt("'.$NPass.'","SRG-MIS") WHERE ACC_ID = '.$AccID.'';
      $SRGCPassQuery = mysqli_query($connection,$SRGCPassSQL) or die (mysqli_error($connection));

      $dataArray = array('result' => 'Updated');
    }
    else
    {
      $dataArray = array('result' => 'Wrong Password');
    }
    echo json_encode($dataArray);
?>