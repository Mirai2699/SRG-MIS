<?php
	$db = mysqli_connect('localhost','root','','srg_mis');
	if(isset($_POST['Addacc']))
	{
	 	$Username = $_POST['accuser'];
		$Pass = $_POST['accpass'];
		$RefPass = $_POST['refpass'];
		$AccType = $_POST['acctype'];
		$EmpID = $_POST['accempID'];

		$addquery = "INSERT INTO srg_r_accounts 
								(ACC_Username,
							     ACC_Password,
							     ACC_Ref_Password,
							     ACC_Type,
							     ACC_Ref_Member
							     ) 
					VALUES ('".$Username."',
							aes_encrypt('".$Pass."','SRG-MIS'),
							'".$RefPass."',
							'".$AccType."',	
							'".$EmpID."'		
							)";

		mysqli_query($db,$addquery);
		header('location: SAmngeacc.php');
	}

	else if(isset($_POST['Updateacc']))
	{   
		$ID = $_POST['accID'];
	 	$Username = $_POST['accuser'];
		$Pass = $_POST['accpass'];
		$AccType = $_POST['acctype'];
		$activation = $_POST['accstat'];
		
		$uquery = mysqli_query($db,"UPDATE srg_r_accounts 
									SET ACC_Username = '".$Username."',
									  ACC_Password = aes_encrypt('".$Pass."','SRG-MIS'),
									  ACC_Type =  '".$RefPass."',
									  ACC_Status = '".$AccType."'
									WHERE ACC_ID = '".$EmpID."'");
		header('location: SAmngeacc.php');
	}
?>