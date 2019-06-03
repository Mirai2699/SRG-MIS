<?php
	include ("../db.php");
	session_start();
	$type = $_SESSION['TYPE'];
	if(!isset($_SESSION['UserName']) && $type!="Project-Manager"){
	  header('Location: 404.html?err=1');
	}
    date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <!--Core CSS -->
    <link href="../Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Resources/IMS/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../Resources/IMS/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../Resources/IMS/css/clndr.css" rel="stylesheet">
    <!--calendar css-->
    <link href="../Resources/IMS/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet">
    <!--clock css-->
    <link href="../Resources/IMS/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../Resources/IMS/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="../Resources/IMS/css/style.css" rel="stylesheet">
    <link href="../Resources/IMS/css/style-responsive.css" rel="stylesheet"/>

    <link rel="icon" href="../Resources/images/srg-logo.png" sizes="32x32">
    <!--icheck-->
    <link href="../Resources/IMS/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/red.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/green.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/minimal/purple.css" rel="stylesheet">

    <link href="../Resources/IMS/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/yellow.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/square/purple.css" rel="stylesheet">

    <link href="../Resources/IMS/js/iCheck/skins/flat/grey.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/red.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/blue.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/yellow.css" rel="stylesheet">
    <link href="../Resources/IMS/js/iCheck/skins/flat/purple.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../Resources/IMS/js/bootstrap-datepicker/css/datepicker.css" />

    <link href="../Resources/IMS/js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../Resources/IMS/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">  

</head>
<title>Time Sheet Report</title>
<body>
	<div style="min-height: 20px;">
	</div>
	<div style="text-align: left; margin-left: 20px; margin-bottom: 0px;">
		<img src="../Resources/images/srg-logo.png" width="50px" style="display:inline;">
		<h4 style="display:inline;">|  Software Research Group</h4>
		<small style="float:right; margin-right: 20px;">Time Sheet as of <?php echo date('M d Y');?></small>
		<small>7th Generation</small>
		<hr>
	</div>
        <section style="margin-top: 0px;">
			<section class="panel">
			    <div class="panel-body">
			    	<div class="col-xs-12">
			    		<h6>Profile</h6>
			    		<div class="col-xs-4">
			    			<?php
			    				$SRGSQL = 'SELECT Last_Name,
			    									First_Name,
			    									Course,
			    									Year,
			    									Section
			    							FROM srg_r_members
			    							WHERE ID = '.$_GET['ID'].'';
			    				$SRGQuery = mysqli_query($connection,$SRGSQL) or die (mysqli_error($connection));
			    				if(mysqli_num_rows($SRGQuery) > 0)
			    				{
			    					while($row = mysqli_fetch_assoc($SRGQuery))
			    					{
			    						$FName = $row['First_Name'];
			    						$LName = $row['Last_Name'];
			    						$Course = $row['Course'];
			    						$CYear = $row['Year'];
			    						$CSection = $row['Section'];
			    						$FullName = ''.$FName.' '.$LName.'';
			    						$FullCourse = ''.$Course.' '.$CYear.'-'.$CSection.'';
			    					}
			    				}
			    			?>
			    			<label>Name:</label>&nbsp;<label id="SRGName"><?php echo $FullName?></label>
			    		</div>
				    	<div class="col-xs-3">
			    			<label>Section:</label>&nbsp;<label id="SRGName"><?php echo $FullCourse?></label>
			    		</div>
			    	</div>
			    	<div class="col-xs-12">
			    		<div class="col-xs-4">
			    			<?php
			    			if (isset($_GET['M']))
			    			{
			    				switch ($_GET['M']) {
			    					case '1':
			    						$Month = 'January';
			    						break;
			    					case '2':
			    						$Month = 'February';
			    						break;
			    					case '3':
			    						$Month = 'March';
			    						break;
			    					case '4':
			    						$Month = 'April';
			    						break;
			    					case '5':
			    						$Month = 'May';
			    						break;
			    					case '6':
			    						$Month = 'June';
			    						break;
			    					case '7':
			    						$Month = 'July';
			    						break;
			    					case '8':
			    						$Month = 'August';
			    						break;
			    					case '9':
			    						$Month = 'September';
			    						break;
			    					case '10':
			    						$Month = 'October';
			    						break;
			    					case '11':
			    						$Month = 'November';
			    						break;
			    					case '12':
			    						$Month = 'December';
			    						break;
			    					default:
			    						$Month = 'Unknown';
			    						break;
			    				}
			    			}
			    			else
			    			{
			    				$Month = 'Alltime';
			    			}
			    			?>
			    			<label>Month:</label>&nbsp;<label id="SRGName"><?php echo $Month?></label>
			    		</div>
				    	<div class="col-xs-2">
				    		<?php
				    			if(isset($_GET['Y']))
				    			{
				    				$Year = $_GET['Y'];
				    			}
				    			else
				    			{
				    				$Year = 'Alltime';
				    			}
				    		?>
				    		<label>Year:</label>&nbsp;<label id="SRGName"><?php echo $Year;?></label>
				    	</div>
			    	</div>
			    	<div class="col-md-12">
			    		<table class="table table-condensed table-striped">
			    		<thead>
			    			<tr>
			    				<th>Date</th>
			    				<th>Time-in</th>
			    				<th>Time-out</th>
			    				<th>Work Hours</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			<?php
			    			if(isset($_GET['M']) && isset($_GET['Y']))
			    			{
			    				$WorkHoursSQL = 'SELECT  MEM.Last_Name,
														MEM.First_Name,
														TIn.TI_Date_In,
														TIn.TI_Time_In,
												        TOn.TO_Time_Out
												FROM srg_ams_t_time_in AS TIn
												INNER JOIN srg_ams_t_time_out AS TOn
													ON TIn.TI_Date_In = TOn.TO_Date_Out
												INNER JOIN srg_r_members AS MEM
													ON MEM.ID = TIn.TI_Member_ID
												WHERE (TIn.TI_Member_ID = '.$_GET['ID'].'
													AND TIn.TI_Member_ID = TOn.TO_Member_ID)
												AND (MONTH(TIn.TI_Date_In) = '.$_GET['M'].')
												AND (YEAR(TIn.TI_Date_In) = '.$_GET['Y'].')';
			    			}
			    			else
			    			{
			    				$WorkHoursSQL = 'SELECT  MEM.Last_Name,
														MEM.First_Name,
														TIn.TI_Date_In,
														TIn.TI_Time_In,
												        TOn.TO_Time_Out
												FROM srg_ams_t_time_in AS TIn
												INNER JOIN srg_ams_t_time_out AS TOn
													ON TIn.TI_Date_In = TOn.TO_Date_Out
												INNER JOIN srg_r_members AS MEM
													ON MEM.ID = TIn.TI_Member_ID
												WHERE (TIn.TI_Member_ID = '.$_GET['ID'].'
													AND TIn.TI_Member_ID = TOn.TO_Member_ID)';
			    			}
								// $time1 = strtotime('08:00:00');
								// $time2 = strtotime('19:50:00');
								// $difference = round(abs($time2 - $time1) / 3600,2);
								// echo floor($difference);
								$WorkHourQuery = mysqli_query($connection,$WorkHoursSQL) or die (mysqli_error($connection));
								$WH = 0;
								if(mysqli_num_rows($WorkHourQuery) > 0)
								{
									while($row = mysqli_fetch_assoc($WorkHourQuery))
									{
										$time1 = strtotime($row['TI_Time_In']);
										$time2 = strtotime($row['TO_Time_Out']);
										$difference = round(abs($time2 - $time1) / 3600,2);
										// echo floor($difference);
										echo 
											'<tr>
							    				<td>'.$row['TI_Date_In'].'</td>
							    				<td>'.date("g:i:s A",$time1).'</td>
							    				<td>'.date("g:i:s A",$time2).'</td>
							    				<td>'.floor($difference).'</td>
							    			</tr>';
							    		$WH += floor($difference);
									}
								}
								else
								{
									echo '<tr>
							    				<td>N/A</td>
							    				<td>N/A</td>
							    				<td>N/A</td>
							    				<td>N/A</td>
							    			</tr>';
							    	$WH = 0;
								}
			    			?>
			    		</tbody>
			    		</table>
			    	</div>
			    	<div class="col-md-12" style="text-align: right">
			    		<h5 style="display: inline-block;">Total Work Hours:</h5>
			    		<h3 style="display: inline-block;"><?php echo $WH; ?></h3>
			    	</div>
			    </div>
			</section>
		</section>
</body>
</html>
<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="../Resources/IMS/js/jquery.js"></script>
<script src="../Resources/IMS/js/jquery-ui/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../Resources/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../Resources/IMS/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../Resources/IMS/js/jquery.scrollTo.min.js"></script>
<script src="../Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="../Resources/IMS/js/jquery.nicescroll.js"></script>

<script src="../Resources/IMS/js/bootstrap-switch.js"></script>

<script type="text/javascript" src="../Resources/IMS/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="../Resources/IMS/js/jquery-tags-input/jquery.tagsinput.js"></script>

<script src="../Resources/IMS/js/select2/select2.js"></script>

<script src="../Resources/IMS/js/select-init.js"></script>

<!--common script init for all pages-->
<script src="../Resources/IMS/js/scripts.js"></script>

<script src="../Resources/IMS/js/toggle-init.js"></script>

<script src="../Resources/IMS/js/advanced-form.js"></script>

<script>
	$(document).ready(function(){
		window.print();
	});
</script>
