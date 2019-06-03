<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     // include ("SAJSCustom.php");
?>


<title>Manage Accounts | PUPQC PSO</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a href="SAmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddperson.php">Add Personnel</a></li>
                        <li><a href="SAmngeperson.php">Manage Personnel</a></li>              
                    </ul>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="active" >
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a class="active" href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                <li>
                    <a  href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub" >
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAmngeacc.php">Manage Accounts</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Manage Accounts
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none">No.</th>
                            <th>Account Type</th>
                            <th>Username</th>
                            <th>Name of Employee</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $querysql = 'SELECT ACC.ACC_ID,
                                                 ACC.ACC_Username,
                                                 aes_decrypt(ACC.ACC_Password,"SRG-MIS") AS ACC_Password,
                                                 ACC.ACC_Type,
                                                 ACC.ACC_Ref_Member,
                                                 EMP.ID,
                                                 EMP.First_Name,
                                                 EMP.Last_Name,
                                                 ACC.ACC_Status
                                        FROM `srg_r_accounts` AS ACC
                                        INNER JOIN `srg_r_members` AS EMP 
                                            ON ACC.ACC_Ref_Member = EMP.ID';
                            $view_query = mysqli_query($connection,$querysql) or die (mysqli_error($connection));
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $No = $row["ACC_ID"];
                                    $un = $row["ACC_Username"];       
                                    $pass = $row["ACC_Password"];
                                    $type = $row["ACC_Type"];
                                    $ref = $row["ACC_Ref_Member"];
                                    $empid = $row["ID"];  
                                    $head1 = $row["First_Name"] ;
                                    $head3 = $row["Last_Name"] ;
                                    $act = $row["ACC_Status"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $No; ?></td>
                                        <td><?php echo $type; ?></td>
                                        <td><?php echo $un; ?></td>
                                        <td><?php echo $head1.' '.$head3; ?></td>
                                        <td><?php echo $act; ?></td>
                                        <td style='width:150px'>
                                            <center>
                                            <a data-toggle="modal" href="#modify<?php echo $No; ?>" class="btn btn-warning">Edit</a>               
                                            </center>
                                       </td>
                                </tr> 
                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify<?php echo $No; ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="display: inline-block;" class="modal-title">Edit Account Details</h4>
                                                <div style="display: inline; float: right"> 
                                                 <button type="button" class="btn btn-default btn-round" data-dismiss="modal">X</button>
                                             </div>
                                            </div>
                                            <div class="modal-body">

                                                <form id="formAccDetails" role="form" method="POST" action="F_Account.php">
                                                    <div class="form-group">
                                                        <input style="display: none;" type="text" name="accID"  value="<?php echo $No; ?>" class="form-control"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Change Username</label>
                                                        <input style="color: black;" type="text" name="accuser" value="<?php echo $un ?>" class="form-control"/>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Change Password</label>
                                                        <input id="pass1" style="color: black;" type="password" name="accpass"  value="<?php echo $pass ?>" class="form-control"/>
                                                    </div>
                                                     <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input id="pass2" style="color: black;" type="password" name="accconpass"  class="form-control"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Change Account Type</label>
                                                        <select name="acctype" class="form-control" style="color: black;" required="">
                                                                <option selected value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                                                <option value="Professor">Professor</option>
                                                                <option value="Project-Manager">Project Manager</option>
                                                                <option value="Treasurer">Treasurer</option>
                                                                <option value="Member">Member</option>
                                                                <option value="SystemAdmin">System Admin</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label>Change Status</label>
                                                            <select name="accstat" class="form-control" style="color: black;" required="">
                                                                <option selected value="Active">Active</option>
                                                                <option value="Not-Active">Not Active</option>
                                                            </select>
                                                    </div><br><hr>
                                                   
                                                    <button id="updateAcc" type="button" class="btn btn-success" name="Updateacc">Save</button>&nbsp;&nbsp;<br>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>    
                <!--end container-->
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

</section>
<!--Core js-->
<script src="Resources/IMS/js/jquery.js"></script>
<script src="Resources/bs3/js/bootstrap.min.js"></script>
<script src="Resources/IMS/js/bootstrap-switch.js"></script>

<!--common script init for all pages-->
<script src="Resources/IMS/js/scripts.js"></script>

<!--toggle initialization-->
<script src="Resources/IMS/js/toggle-init.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#updateAcc',function(){
        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();
        if(pass1 == pass2)
        {
            $('#formAccDetails').submit();
        }
    });
  });
</script>
</body>
</html>
