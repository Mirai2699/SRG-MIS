<?php
include('../db.php');
date_default_timezone_set("Asia/Manila");

//MAIN
$User = $_POST['Username'];
$Pass = $_POST['Password'];

$CheckPasswordSQL = 'SELECT Acc.ACC_ID,
							Acc.ACC_Username,
							aes_decrypt(Acc.ACC_Password,"SRG-MIS") AS Pass,
							Acc.ACC_Type,
							Acc.ACC_Ref_Member,
				        	Mem.First_Name,
					        Mem.Last_Name
					FROM srg_r_accounts AS Acc
					INNER JOIN srg_r_members AS Mem
					    ON Mem.ID = Acc.ACC_Ref_Member
					WHERE Acc.ACC_Username = "'.$User.'"
					AND aes_decrypt(Acc.ACC_Password,"SRG-MIS") = "'.$Pass.'"
					AND Mem.Position = "Project Manager"';
$CheckPasswordQuery = mysqli_query($connection,$CheckPasswordSQL) or die (mysqli_error($connection));
if(mysqli_num_rows($CheckPasswordQuery) > 0)
{
	$Status = 1;
	session_start();
	while($memInfo = mysqli_fetch_assoc($CheckPasswordQuery))
	{
		$ID = $memInfo['ACC_ID'];
		$User = $memInfo['ACC_Username'];
		$Type = $memInfo['ACC_Type'];
		$Ref_Member = $memInfo['ACC_Ref_Member'];
	}
	$_SESSION['ID'] = $ID;
	$_SESSION['Logged_In'] = $User;
	$_SESSION['TYPE'] = $Type;
	$_SESSION['AccountID'] = $Ref_Member;

	$query = "INSERT INTO srg_r_user_log (UL_Username, UL_Type) VALUES('".$User."','".$Type."')";
    mysqli_query($connection,$query) or die (mysqli_error($connection));
}
else
{
	$Status = 0;
}


if($Status == 1)
{
	$Func = 'LogIn';
}
else
{
	$Func = 'Error';
}

$return = array('Status' => $Status, 'Func' => $Func, 'User' => $User);
echo json_encode($return);

?>