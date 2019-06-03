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
                <br>
                <hr>
                <li>
                    <a href="AMSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active"  href="AMSattendance.php">
                        <i class="fa fa-calendar"></i>
                        <span>Attendance Record</span>
                    </a>
                </li>
                 <li>
                    <a href="AMSReports.php">
                        <i class="fa  fa-book"></i>
                        <span>Printables</span>
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
                        <div class="row">
                            <aside class="col-lg-12">
                                  <div id="calendar" class="has-toolbar fc">

                                   <!--  <table class="fc-header" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td class="fc-header-left"><span class="fc-button fc-button-prev fc-state-default fc-corner-left"><span class="fc-button-inner"><span class="fc-button-content">&nbsp;◄&nbsp;</span><span class="fc-button-effect"><span></span></span></span></span><span class="fc-button fc-button-next fc-state-default fc-corner-right"><span class="fc-button-inner"><span class="fc-button-content">&nbsp;►&nbsp;</span><span class="fc-button-effect"><span></span></span></span></span><span class="fc-header-space"></span><span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right fc-state-disabled"><span class="fc-button-inner"><span class="fc-button-content">today</span><span class="fc-button-effect"><span></span></span></span></span></td><td class="fc-header-center"><span class="fc-header-title"><h2>June 2018</h2></span></td><td class="fc-header-right"><span class="fc-button fc-button-month fc-state-default fc-corner-left fc-state-active"><span class="fc-button-inner"><span class="fc-button-content">month</span><span class="fc-button-effect"><span></span></span></span></span><span class="fc-button fc-button-basicWeek fc-state-default"><span class="fc-button-inner"><span class="fc-button-content">week</span><span class="fc-button-effect"><span></span></span></span></span><span class="fc-button fc-button-basicDay fc-state-default fc-corner-right"><span class="fc-button-inner"><span class="fc-button-content">day</span><span class="fc-button-effect"><span></span></span></span></span></td>
                                            </tr>
                                        </tbody>
                                    </table> -->


                                    <div class="fc-content" style="position: relative; min-height: 1px;">
                                        <div class="fc-view fc-view-month fc-grid" style="position: relative;" unselectable="on">
                                            <!-- <table class="fc-border-separate" style="width:100%" cellspacing="0">
                                                <thead><tr class="fc-first fc-last"><th class="fc-sun fc-widget-header fc-first" style="width: 110px;">Sun</th><th class="fc-mon fc-widget-header" style="width: 110px;">Mon</th><th class="fc-tue fc-widget-header" style="width: 110px;">Tue</th><th class="fc-wed fc-widget-header" style="width: 110px;">Wed</th><th class="fc-thu fc-widget-header" style="width: 110px;">Thu</th><th class="fc-fri fc-widget-header" style="width: 110px;">Fri</th><th class="fc-sat fc-widget-header fc-last">Sat</th></tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="fc-week0 fc-first"><td class="fc-sun fc-widget-content fc-day0 fc-first fc-other-month"><div style="min-height: 89px;"><div class="fc-day-number">27</div><div class="fc-day-content"><div style="position: relative; height: 26px;">&nbsp;</div></div></div></td><td class="fc-mon fc-widget-content fc-day1 fc-other-month"><div><div class="fc-day-number">28</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-tue fc-widget-content fc-day2 fc-other-month"><div><div class="fc-day-number">29</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-wed fc-widget-content fc-day3 fc-other-month"><div><div class="fc-day-number">30</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-thu fc-widget-content fc-day4 fc-other-month"><div><div class="fc-day-number">31</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-fri fc-widget-content fc-day5"><div><div class="fc-day-number">1</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-sat fc-widget-content fc-day6 fc-last"><div><div class="fc-day-number">2</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td></tr><tr class="fc-week1"><td class="fc-sun fc-widget-content fc-day7 fc-first"><div style="min-height: 88px;"><div class="fc-day-number">3</div><div class="fc-day-content"><div style="position: relative; height: 0px;">&nbsp;</div></div></div></td><td class="fc-mon fc-widget-content fc-day8"><div><div class="fc-day-number">4</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-tue fc-widget-content fc-day9"><div><div class="fc-day-number">5</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-wed fc-widget-content fc-day10"><div><div class="fc-day-number">6</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-thu fc-widget-content fc-day11"><div><div class="fc-day-number">7</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-fri fc-widget-content fc-day12"><div><div class="fc-day-number">8</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-sat fc-widget-content fc-day13 fc-last"><div><div class="fc-day-number">9</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td></tr><tr class="fc-week2"><td class="fc-sun fc-widget-content fc-day14 fc-first"><div style="min-height: 88px;"><div class="fc-day-number">10</div><div class="fc-day-content"><div style="position: relative; height: 67px;">&nbsp;</div></div></div></td><td class="fc-mon fc-widget-content fc-day15"><div><div class="fc-day-number">11</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-tue fc-widget-content fc-day16"><div><div class="fc-day-number">12</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-wed fc-widget-content fc-day17"><div><div class="fc-day-number">13</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-thu fc-widget-content fc-day18"><div><div class="fc-day-number">14</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-fri fc-widget-content fc-day19"><div><div class="fc-day-number">15</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-sat fc-widget-content fc-day20 fc-last"><div><div class="fc-day-number">16</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td></tr><tr class="fc-week3"><td class="fc-sun fc-widget-content fc-day21 fc-first"><div style="min-height: 88px;"><div class="fc-day-number">17</div><div class="fc-day-content"><div style="position: relative; height: 52px;">&nbsp;</div></div></div></td><td class="fc-mon fc-widget-content fc-day22"><div><div class="fc-day-number">18</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-tue fc-widget-content fc-day23 fc-state-highlight fc-today"><div><div class="fc-day-number">19</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-wed fc-widget-content fc-day24"><div><div class="fc-day-number">20</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-thu fc-widget-content fc-day25"><div><div class="fc-day-number">21</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-fri fc-widget-content fc-day26"><div><div class="fc-day-number">22</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-sat fc-widget-content fc-day27 fc-last"><div><div class="fc-day-number">23</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td></tr><tr class="fc-week4"><td class="fc-sun fc-widget-content fc-day28 fc-first"><div style="min-height: 88px;"><div class="fc-day-number">24</div><div class="fc-day-content"><div style="position: relative; height: 26px;">&nbsp;</div></div></div></td><td class="fc-mon fc-widget-content fc-day29"><div><div class="fc-day-number">25</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-tue fc-widget-content fc-day30"><div><div class="fc-day-number">26</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-wed fc-widget-content fc-day31"><div><div class="fc-day-number">27</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-thu fc-widget-content fc-day32"><div><div class="fc-day-number">28</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-fri fc-widget-content fc-day33"><div><div class="fc-day-number">29</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-sat fc-widget-content fc-day34 fc-last"><div><div class="fc-day-number">30</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td></tr><tr class="fc-week5 fc-last"><td class="fc-sun fc-widget-content fc-day35 fc-first fc-other-month"><div style="min-height: 88px;"><div class="fc-day-number">1</div><div class="fc-day-content"><div style="position: relative; height: 0px;">&nbsp;</div></div></div></td><td class="fc-mon fc-widget-content fc-day36 fc-other-month"><div><div class="fc-day-number">2</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-tue fc-widget-content fc-day37 fc-other-month"><div><div class="fc-day-number">3</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-wed fc-widget-content fc-day38 fc-other-month"><div><div class="fc-day-number">4</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-thu fc-widget-content fc-day39 fc-other-month"><div><div class="fc-day-number">5</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-fri fc-widget-content fc-day40 fc-other-month"><div><div class="fc-day-number">6</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td><td class="fc-sat fc-widget-content fc-day41 fc-last fc-other-month"><div><div class="fc-day-number">7</div><div class="fc-day-content"><div style="position:relative">&nbsp;</div></div></div></td></tr>
                                                </tbody>
                                            </table>
 -->

                                            <div style="position:absolute;z-index:8;top:0;left:0">
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 553px; width: 91px; top: 72px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-title">All Day Event</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left" style="position: absolute; z-index: 8; left: 443px; width: 323px; top: 251px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-title">Long Event</span>
                                                    </div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 663px; width: 99px; top: 277px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-time">4p</span>
                                                        <span class="fc-event-title">Repeating Event</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-right" style="position: absolute; z-index: 8; left: 0px; width: 95px; top: 340px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-title">Long Event</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 223px; width: 91px; top: 340px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-time">10:30a</span>
                                                        <span class="fc-event-title">Meeting</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 663px; width: 99px; top: 340px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-time">4p</span>
                                                        <span class="fc-event-title">Repeating Event</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 333px; width: 91px; top: 340px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-time">7p</span>
                                                        <span class="fc-event-title">Birthday Party</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 223px; width: 91px; top: 366px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-time">12p</span>
                                                        <span class="fc-event-title">Lunch</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </div>
                                                <a href="http://google.com/" class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right" style="position: absolute; z-index: 8; left: 443px; width: 201px; top: 429px;">
                                                    <div class="fc-event-inner fc-event-skin">
                                                        <span class="fc-event-title">Click for Google</span>
                                                    </div>
                                                    <div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <!-- <aside class="col-lg-3">
                                <h4 class="drg-event-title"> Draggable Events</h4>
                                <div id="external-events">
                                    <div class="external-event label label-primary ui-draggable" style="position: relative;">My Event 1</div>
                                    <div class="external-event label label-success ui-draggable" style="position: relative;">My Event 2</div>
                                    <div class="external-event label label-info ui-draggable" style="position: relative;">My Event 3</div>
                                    <div class="external-event label label-inverse ui-draggable" style="position: relative;">My Event 4</div>
                                    <div class="external-event label label-warning ui-draggable" style="position: relative;">My Event 5</div>
                                    <div class="external-event label label-danger ui-draggable" style="position: relative;">My Event 6</div>
                                    <div class="external-event label label-default ui-draggable" style="position: relative;">My Event 7</div>
                                    <div class="external-event label label-primary ui-draggable" style="position: relative;">My Event 8</div>
                                    <div class="external-event label label-info ui-draggable" style="position: relative;">My Event 9</div>
                                    <div class="external-event label label-success ui-draggable" style="position: relative;">My Event 10</div>
                                    <p class="border-top drp-rmv">
                                        <input type="checkbox" id="drop-remove">
                                        remove after drop
                                    </p>
                                </div>
                            </aside> -->
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


<script src="../Resources/IMS/js/fullcalendar/fullcalendar.min.js"></script>

<!--Easy Pie Chart-->
<script src="../Resources/IMS/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="../Resources/IMS/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="../Resources/IMS/js/flot-chart/jquery.flot.js"></script>
<script src="../Resources/IMS/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="../Resources/IMS/js/flot-chart/jquery.flot.resize.js"></script>
<script src="../Resources/IMS/js/flot-chart/jquery.flot.pie.resize.js"></script>

<!--common script init for all pages-->
<script src="../Resources/IMS/js/scripts.js"></script>

<!--script for this page only-->
<script src="../Resources/IMS/js/external-dragging-calendar.js"></script>


</body>

</html>
