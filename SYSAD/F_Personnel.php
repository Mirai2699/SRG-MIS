<?php


	$db = mysqli_connect('localhost','root','','srg_mis');


		$No = $_POST['ID'];
		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$Type = $_POST['Type'];
		$Gen = $_POST['Gen'];
		$Position = $_POST['Position'];
		$Course = $_POST['Course'];
		$Ylevel = $_POST['Ylevel'];
		$section = $_POST['section'];
		$stat = $_POST['status'];



	if(isset($_POST['Addperson']))
	{


		$addquery = "INSERT INTO srg_r_members (      Last_Name,
													  First_Name,
													  Member_Type,
													  Course,
													  Year,
													  Section,
													  Generation
													  ) 
											   VALUES('$Lname',
											   		  '$Fname', 
											   		  '$Type', 
											   		  '$Course',
											   		  '$Ylevel',
											   		  '$section',
											   		  '$Gen'
											   		)";

		mysqli_query($db,$addquery);
		header('location: SAaddacc.php');
	}


	 if(isset($_POST['Updateperson']))
	{   
		
		$updatequery = mysqli_query($db,"UPDATE srg_r_members SET  		   First_Name = '$Fname',
														   Last_Name = '$Lname',
														   Member_Type = '$Type',
														   Position = '$Position',
													       Course = '$Course',
													       Year = '$Ylevel',
													       Generation = '$Gen',
													       Section = '$section',
													       Status = '$stat'
										WHERE ID = '$No'");
		
		 echo "<script type=\"text/javascript\">".
               "alert
               ('You have successfully updated the member's details!');".
               "</script>";
         echo "<script>setTimeout(\"location.href = 'SAmngeperson.php'\",0);</script>";
		

		// echo $Fname;
		// echo $Lname;
		// echo $Type;
		// echo $Position;
		// echo $Course;
		// echo $Ylevel;
		// echo $Gen;
		// echo $section;
		// echo $stat;
		// echo $No;


	}

?>