<?php 
     include ("AMSHeader.php");
     date_default_timezone_set("Asia/Manila");
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
                    <a href="AMSattendance.php">
                        <i class="fa fa-calendar"></i>
                        <span>Attendance Record</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="AMSTimeSheet.php">
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
                        SRG - Time Sheets
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <!-- page start-->
                        <form id="DatePick" Method="POST">
                          <div class="form-group col-md-12" align="pull-right">
                            <h4 class="control-label col-md-1">Month</h4>
                            <div class="col-md-5">
                              <select id="TSMonth" class="form-control input-sm m-bot15">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                              </select>
                            </div>
                            <h4 class="control-label col-md-1">Year</h4>
                            <div class="col-md-5">
                              <select id="TSYear" class="form-control input-sm m-bot15">
                                <?php
                                  $Y = date('Y');
                                  for($i=$Y-3;$i<=$Y+3;$i++)
                                  {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                  }
                                ?>
                              </select>
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
                                                <a id="printTS'.$MemID.'" target="_blank" href="AMSTimeSheet-print.php?ID='.$MemID.'&M='.date('m').'&Y='.date('Y').'" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Month" data-placement="left"><i class="fa fa-print"></i></a>
                                                <a id="printAll'.$MemID.'" class="btn btn-warning btn-sm" data-toggle="tooltip" title="All" data-placement="right" target="_blank" href="AMSTimeSheet-print.php?ID='.$MemID.'"><i class="fa fa-list-ul"></i></a>
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
<script type="text/javascript">
  function printTS(id)
  {
    var Month = $('#TSMonth').val();
    var Year = $('#TSYear').val();
    document.getElementById('printTS'+id).href = 'AMSTimeSheet-print.php?ID='+id+'&M='+Month+'&Y='+Year+'';
  }

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 

    var CurrDate = new Date();
    $('#TSYear').val(CurrDate.getFullYear()).change();
    $('#TSMonth').val(CurrDate.getMonth()+1).change();

    $(document).on('change','#TSYear',function(){
      $.ajax({
        method:'get',
        url:'AMSGetMember.php',
        dataType:'json',
        async: false,
        success: function(data){
          $.each(data.output,function(key,value){
            printTS(value);
            // alert(key+' '+value);
          });
        },
        error: function(data){
          // alert(JSON.stringify(data.mes));
        }
      });
    });
    $(document).on('change','#TSMonth',function(){
      $.ajax({
        method:'get',
        url:'AMSGetMember.php',
        dataType:'json',
        async: false,
        success: function(data){
          $.each(data.output,function(key,value){
            printTS(value);
            // alert(key+' '+value);
          });
        },
        error: function(data){
          // alert(JSON.stringify(data.mes));
        }
      });
    });
  });
</script>
</body>

</html>
