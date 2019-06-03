<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Add Personnel | PUPQC PSO</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a  href="SAmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul cclass="active">
                        <li><a class="active" href="SAaddperson.php">Add Personnel</a></li>
                        <li><a href="SAmngeperson.php">Manage Personnel</a></li>              
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub">
                            <li><a href="SAChngeRef.php">Adjust Time Reference</a></li>
                             <li><a href="SAItemCat.php">Manage Item Category </a></li>
                            <li><a href="SAUserlog.php">Users' Logs</a></li>
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAaddperson.php">Add Personnel</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
              

        <section class="panel">
            <div class="row">
                <div class="col-sm-12">
                    
                        <br>
                        <div class="col-md-3">
                            <h4>Add Personnel</h4>
                        </div>
                                  

                                            <div class="col-md-12">
                                                <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                                </div>
                                            </div>

                                            <form role="form" method="POST" action="F_Personnel.php">
                                                <div class="col-md-10" style="margin: 10px">
                                                       
                                                                
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>First Name</label>
                                                                            <input style="color: black;" type="text" name="Fname" maxlength="50" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Last Name</label>
                                                                            <input style="color: black;" type="text" name="Lname" maxlength="50" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Member Type</label>
                                                                            <select name="Type" class="form-control" style="color: black;"required/>
                                                                                <option value="" selected></option>
                                                                                <option value="Student">Student</option>
                                                                                <option value="Professor">Professor</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>SRG Generation</label>
                                                                            <input style="color: black;" type="text" name="Gen" maxlength="10" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Course</label>
                                                                            <input style="color: black;" type="text" name="Course" maxlength="10" class="form-control" placeholder="BSIT" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Year Level</label>
                                                                             <select name="Ylevel" class="form-control" style="color: black;"required/>
                                                                                <option value="" selected></option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Section</label>
                                                                             <select name="section" class="form-control" style="color: black;"required/>
                                                                                <option value="" selected></option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                  

                                                            </div>
                                                              <div class="col-md-12">
                                                                 <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-3" style="margin: 10px; margin-left: 30px">
                                                                  <button type="submit" class="btn btn-success" name="Addperson" style="padding-left: 10px">
                                                                     Save and Continue  <i class="fa  fa-angle-double-right"></i>
                                                                  </button>
                                                              </div>
                                                        </div>
                                                    </form>  

                                               
                           
                </div>
            </div>
             </section>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
