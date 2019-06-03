<?php

$db = mysqli_connect('localhost','root','','srg_mis');

if(isset($_POST['updatetime']))
	{   
		
	 	$TRpunctual = $_POST['TRpunctual'];
		$TRontime = $_POST['TRontime'];
		$TRlate = $_POST['TRlate'];
		$TRgrace = $_POST['TRgrace'];

		
		$uquery = mysqli_query($db,"UPDATE srg_ams_r_time_requirement 

													  SET TIME_Punctual_Ref = '$TRpunctual',
														  TIME_OnT_Ref = '$TRontime',
														  TIME_Late_Ref =  '$TRlate',
														  TIME_Grace_Ref = '$TRgrace'

														WHERE TIME_No = 1");
		 echo "<script type=\"text/javascript\">".
               "alert
               ('You have successfully updated the time reference details!');".
               "</script>";
         echo "<script>setTimeout(\"location.href = 'SAChngeRef.php'\",0);</script>";

	}
?>