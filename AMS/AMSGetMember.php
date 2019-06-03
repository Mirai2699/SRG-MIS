<?php
 include('../db.php');
	
  $ID = array();
  $view_query = mysqli_query($connection,"SELECT * FROM `srg_r_members` WHERE Status = 'Active' AND Member_Type = 'Student' ORDER BY Last_Name ASC");
  while($row = mysqli_fetch_assoc($view_query))
  {
    array_push($ID,$row['ID']);
  }

  $output = array('output' => $ID,
                  'mes' => 'GET');

  echo json_encode($output);
  return json_encode($output);
?>