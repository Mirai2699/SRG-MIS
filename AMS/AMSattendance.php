<?php 
     include ("AMSHeader.php");
?>
<!--calendar css-->

<title>Home | PUPQC IMS</title>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a href="AMSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="AMSattendance.php">
                        <i class="fa fa-calendar"></i>
                        <span>Attendance Record</span>
                    </a>
                </li>
                <li>
                    <a href="AMSTimeSheet.php">
                        <i class="fa  fa-file-text-o"></i>
                        <span>Time Sheets</span>
                    </a>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
            <section class="panel">
                    <header class="panel-heading">
                        SRG -Attendance Record
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <!-- page start-->
                        <form id="DatePick" Method="POST">
                          <div class="form-group col-md-12">
                            <label class="control-label col-md-2">Attendance of the date</label>
                            <div class="col-md-4 col-xs-7">
                              <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d-m-Y')?>" class="input-append date dpYears">
                                <input id="DateInput" type="text" readonly="" value="<?php echo date('d-m-Y')?>" size="16" class="form-control" name="DateInput">
                                <span class="input-group-btn add-on">
                                  <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                  </span>
                              </div>
                              <span class="help-block">Select date</span>
                            </div>
                            <div class="col-sm-6 col-xs-8" style="left:10px;">
                              <span>
                                  <button id="DateSubmit" type="submit" class="btn btn-warning"><i class="fa fa-check-circle-o"></i> Check</button>
                              </span>
                            </div>
                          </div>
                        </form>
                         <div class="form-group col-md-12 SRGList">
                        <?php
                             include ("../db.php");

                              $IterateLine = 0;

                               $view_query = mysqli_query($connection,"SELECT * FROM `srg_r_members` WHERE Status = 'Active' AND Member_Type = 'Student' ORDER BY Last_Name ASC");
                                 while($row = mysqli_fetch_assoc($view_query))
                                      {
                                          $MemID = $row["ID"];
                                          $Fname = $row["First_Name"];
                                          $MemPic = $row["Profile_Picture"];

                                        if($IterateLine == 0)
                                        {
                                          echo '<div class="col-md-12" style="text-align: center">';
                                        }
                                         echo 
                                         '<div class="col-md-2" style="text-align: center; margin-bottom:10px;">
                                            <div>
                                              <img class="circle" src="../Resources/Images/Members/'.$MemPic.'" style="width: 100%; height: 100%"/>
                                              <label style="margin-top: 5px; font-size: 20px;">'.$Fname.'</label>
                                            </div>
                                            <div id="TimeCard'.$MemID.'" class="col-md-12">
                                                <span id="AttendType'.$MemID.'" class="label label-default">N/a</span>
                                                <span id="AttendTime'.$MemID.'" class="label label-default">N/a</span>
                                            </div>
                                          </div>';
                                          $IterateLine += 1;
                                        if($IterateLine > 5)
                                        {
                                          echo '</div>';
                                          $IterateLine = 0;
                                        }
                                      }
                                      if($IterateLine != 0)
                                      {
                                        echo '</div>';
                                      }
                                                
                                    
                        ?>
                         </div>
                        <!-- page end-->
                    </div>
                </section>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    
</section>

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

<!-- <script src="../Resources/IMS/js/fullcalendar/fullcalendar.min.js"></script> -->

<script type="text/javascript" src="../Resources/IMS/js/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../Resources/IMS/js/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="../Resources/IMS/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="../Resources/IMS/js/jquery-tags-input/jquery.tagsinput.js"></script>

<script src="../Resources/IMS/js/select2/select2.js"></script>
<script src="../Resources/IMS/js/select-init.js"></script>

<!--common script init for all pages-->
<script src="../Resources/IMS/js/scripts.js"></script>
<script src="../Resources/IMS/js/scripts.js"></script>

<script src="../Resources/IMS/js/toggle-init.js"></script>

<script src="../Resources/IMS/js/advanced-form.js"></script>

<!--script for this page only-->
<!-- <script src="../Resources/IMS/js/external-dragging-calendar.js"></script> -->
  
<script>
    $(document).ready(function(){

        $('#DatePick').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();

        $.ajax({
                url:'AMSCheckAttendance.php',
                method:'POST',
                data:form_data,
                error:function(data)
                {
                    console.log("Error. Please try again.");
                },
                success:function(data)
                {   
                    $('.SRGList').find('div').remove();
                    var json = JSON.parse(data);
                    $('.SRGList').html(json.DataList);
                    var datainput = data;
                    console.log(json.DataList);
                }
            });

        });

    });
</script>

</body>

</html>
