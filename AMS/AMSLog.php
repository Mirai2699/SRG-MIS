<?php
include('../db.php');
date_default_timezone_set("Asia/Manila");

//FUNCTIONS
function LogIn($Fullname,$MemID,$Time,$Date){
	include('../db.php');
	$LogStatus = 0;

	$Name = $Fullname;
	$ID = $MemID;
	$TimeIn = $Time;
	$DateIn = $Date;

	$LoginSQL = 'INSERT INTO srg_ams_t_time_in 
                            (TI_Member,
                            TI_Date_In, 
                            TI_Time_In, 
                            TI_Member_ID) 
				VALUES ("'.$Name.'", 
                      "'.$DateIn.'", 
                      "'.$TimeIn.'", 
                      '.$ID.')';
	$LoginQuery = mysqli_query($connection,$LoginSQL) or die (mysqli_error($connection));

	
	$TimeRefSQL = 'SELECT TIME_Punctual_Ref, 
                            TIME_OnT_Ref, 
                            TIME_Late_Ref, 
                            TIME_Grace_Ref AS Tgrace 
                    FROM `srg_ams_r_time_requirement` 
                    WHERE TIME_No = 1';

	$TimeRefQuery =  mysqli_query($connection,$TimeRefSQL) or die (mysqli_error($connection));
	if(mysqli_num_rows($TimeRefQuery) > 0)
	{
		while($row = mysqli_fetch_assoc($TimeRefQuery))
		{
			$Punctual = new DateTime($row["TIME_Punctual_Ref"]);
			$Ontime = new DateTime($row["TIME_OnT_Ref"]);
			$Late = new DateTime($row["TIME_Late_Ref"]);
			$Tgrace = new DateTime($row["Tgrace"]); 

			$FPunctual = $Punctual->format('H:i:s');
			$FTgrace = $Tgrace -> format('H:i:s');
			$FOntime = $Ontime -> format('H:i:s');
			$FLate = $Late -> format('H:i:s');

			if(time() <= strtotime($FOntime))
			{
				$AttendanceSQL = 'INSERT INTO srg_ams_t_attendance 
			                                (A_Member, 
			                                A_Date_Attend, 
			                                A_Remarks, 
			                                A_Status, 
			                                A_Time_Remarks)
			                    	VALUES ("'.$Name.'", 
			                            	"'.$DateIn.'", 
			                            	"PRESENT", 
			                            	"Logged-In", 
			                            	"Punctual") ';
			   $Attendance = mysqli_query($connection,$AttendanceSQL) or die (mysqli_error($connection));
			}

			if(time() >= strtotime($FOntime) && time() <= strtotime($FTgrace))
			{
			   $AttendanceSQL = 'INSERT INTO srg_ams_t_attendance 
			                                (A_Member, 
			                                A_Date_Attend, 
			                                A_Remarks, 
			                                A_Status, 
			                                A_Time_Remarks)
			                    VALUES ("'.$Name.'", 
			                            "'.$DateIn.'", 
			                            "PRESENT", 
			                            "Logged-In", 
			                            "Ontime") ';
			   $Attendance = mysqli_query($connection,$AttendanceSQL) or die (mysqli_error($connection));
			}

			if(time() >= strtotime($FLate))
			{
			   $AttendanceSQL = 'INSERT INTO srg_ams_t_attendance 
			                                (A_Member, 
			                                A_Date_Attend, 
			                                A_Remarks, 
			                                A_Status, 
			                                A_Time_Remarks)
			                    VALUES ("'.$Name.'", 
			                            "'.$DateIn.'", 
			                            "PRESENT", 
			                            "Logged-In", 
			                            "Late")';
			   $Attendance = mysqli_query($connection,$AttendanceSQL) or die (mysqli_error($connection));
			} 
		}
		$LogStatus = 1;
		return($LogStatus);
	}
	else
	{
		$Error = 'Punctuality Level is null';
	}	
}

function LogOut($Fullname,$MemID,$Time,$Date){
	include('../db.php');
	$LogStatus = 0;

	$Name = $Fullname;
	$ID = $MemID;
	$TimeOut = $Time;
	$DateOut = $Date;


	//Insert to TimeOut Table
	$LogoutSQL = 'INSERT INTO srg_ams_t_time_out
							(TO_Member, 
							TO_Date_Out, 
							TO_Time_Out, 
							TO_Member_ID) 
					VALUES ("'.$Name.'", 
							"'.$DateOut.'", 
							"'.$TimeOut.'", 
							'.$ID.')';

	$LogoutQuery = mysqli_query($connection,$LogoutSQL) or die (mysqli_error($connection));

	// Update to TimeOut Table
	$SignoutSQL = 'UPDATE srg_ams_t_attendance 
					SET A_Status = "Logged-Out" 
					WHERE A_Member = "'.$Fullname.'"';
	$SignoutQuery = mysqli_query($connection,$SignoutSQL) or die (mysqli_error($connection));
	$LogStatus = 2;
	return($LogStatus);
}

//MAIN
$LF = $_POST['LogFunction'];
$Pass = $_POST['Password'];
$MemID = $_POST['MemID'];

$CheckPasswordSQL = 'SELECT aes_decrypt(Acc.ACC_Password,"SRG-MIS") AS Pass,
							Mem.First_Name,
							Mem.Last_Name
					FROM srg_r_accounts AS Acc
					INNER JOIN srg_r_members AS Mem
						ON Mem.ID = Acc.ACC_Ref_Member
					WHERE Mem.ID = '.$MemID.'
					AND aes_decrypt(Acc.ACC_Password,"SRG-MIS") = "'.$Pass.'"';
$CheckPasswordQuery = mysqli_query($connection,$CheckPasswordSQL) or die (mysqli_error($connection));
if(mysqli_num_rows($CheckPasswordQuery) > 0)
{
	$Status = 3;
	while($memInfo = mysqli_fetch_assoc($CheckPasswordQuery))
	{
		$Name = $memInfo['First_Name'].' '.$memInfo['Last_Name'];
	}
	$Time = date('H:i:s');
    $Date = date('Y-m-d');

	// $Status = 'Exist';
	// $Access = 'Allowed';

	if($LF == 'Login')
	{
		$Status = LogIn($Name,$MemID,$Time,$Date);
	}
	elseif($LF == 'Logout')
	{
		$Status = LogOut($Name,$MemID,$Time,$Date);
	}
}
else
{
	$Status = 0;
}


if($Status == 1)
{
	$Func = 'LogIn';
}
elseif($Status == 2)
{
	$Func = 'LogOut';
}
else
{
	$Func = 'Error';
}

$return = array('Status' => $Status, 'Func' => $Func);
echo json_encode($return);

?>