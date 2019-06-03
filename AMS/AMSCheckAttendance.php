<?php
 include('../db.php');

 	$data = $_POST['DateInput'];
	$Date = date("Y-m-d", strtotime($data));

	$IterateLine = 0;
	$List = '';

		$view_query = mysqli_query($connection,"SELECT * FROM `srg_r_members` WHERE Status = 'Active' AND Member_Type = 'Student' ORDER BY Last_Name ASC");
     	while($row = mysqli_fetch_assoc($view_query))
        {
            $MemID = $row["ID"];
            $Fname = $row["First_Name"];
            $MemPic = $row["Profile_Picture"];

            $CheckAttendSQL = 'SELECT *
            					FROM srg_ams_t_attendance 
            					WHERE A_Date_Attend="'.$Date.'" 
            						AND A_Member LIKE "'.$Fname.'%" ';
            $CheckAttendQuery = mysqli_query($connection,$CheckAttendSQL) or die (mysqli_error($connection));
            if(mysqli_num_rows($CheckAttendQuery) > 0)
            {
            	while($row2 = mysqli_fetch_assoc($CheckAttendQuery))
              	{
              		if($row2['A_Remarks'] != "PRESENT")
              		{
              			$Remarks = "ABSENT";
              		}
              		else
              		{
              			$Remarks = "PRESENT";
              		}

              		$CheckInSQL = 'SELECT * FROM  srg_ams_t_time_in WHERE TI_Member_ID ='.$MemID.' AND TI_Date_In ="'.$Date.'" LIMIT 1';
              		$CheckInQuery = mysqli_query($connection,$CheckInSQL) or die (mysqli_error($connection));
              		while($row3 = mysqli_fetch_assoc($CheckInQuery))
              		{
              			$TimeIn = $row3['TI_Time_In'];
              		}
              	}
            }
            else
            {
            	$Remarks = "ABSENT";
            	$TimeIn = "N/A";
            }

            if($IterateLine == 0)
            {
              $List .= '<div class="col-md-12" style="text-align: center">';
            }
            if($Remarks == "PRESENT")
            {
            	$RemarkLabel = '<span id="AttendType'.$MemID.'" class="label label-success">PRESENT</span>';
            }
            else
            {
            	$RemarkLabel = '<span id="AttendType'.$MemID.'" class="label label-danger">ABSENT</span>';
            }

            $List .='<div class="col-md-2" style="text-align: center; margin-bottom:10px;">
	                   <div>
		                   <img class="circle" src="../Resources/Images/Members/'.$MemPic.'" style="width: 100%; height: 100%" />
		                   <label style="margin-top: 5px; font-size: 20px;">'.$Fname.'</label>
	                   </div>
	                   <div id="TimeCard'.$MemID.'" class="col-md-12" style="padding:0px;">
		                   <div class="col-md-6">
		                        '.$RemarkLabel.'
		                    </div>
		                    <div class="col-md-6">
		                        <span id="AttendTime'.$MemID.'" class="label label-default">'.$TimeIn.'</span>
		                    </div>
	                        
	                    </div>
	                  </div>';
            $IterateLine += 1;
            if($IterateLine > 5)
            {
              $List .= '</div>';
              $IterateLine = 0;
            }


          }

          if($IterateLine != 0)
          {
            $List .= '</div>';
          }


 	$DataArray = array(
 			'DataList' => $List
 			);	
 	echo json_encode($DataArray);

?>