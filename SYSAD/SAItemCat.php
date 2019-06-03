<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Item Category | SRG SysCon </title>

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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="active">
                            <li><a href="SAChngeRef.php">Adjust Time Reference</a></li>
                            <li><a class="active" href="SAItemCat.php">Manage Item Category</a></li>
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

               <!-- START CONTENT -->
   <section class="panel">
                    <header class="panel-heading">
                        Add Category
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form method="POST">

                                            <div class="form-content">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row group">                                                        
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Category Name:</label>
                                                            <input maxlength="50" type="text" name="cat_name"  placeholder="Name" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Category Description:</label>
                                                             <input maxlength="100" type="text" name="cat_desc"  placeholder="Description" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div style="padding: 1px; margin-bottom: 10px; ">  
                                                        <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-arrow-down"></i>   Confirm</a>   
                                                          <?php
                                                            include ("../db.php");
                                                             
                                                                            if(isset($_POST['submit']))
                                                                              {   

                                                                                   $catname = $_POST['cat_name'];
                                                                                   $catdesc = $_POST['cat_desc'];

                                                                                  
                                                                                   $category = mysqli_query($connection, "INSERT INTO srg_ims_r_itemcategory
                                                                                               (Category_Name, Category_Desc) 
                                                                                               VALUES ('$catname', '$catdesc')");
                                                                                   echo 
                                                                                   "&nbsp&nbsp
                                                                                    <label style='font-size: 18px; color: #64dd17; font-weight: 10px'>
                                                                                        You have successfully added the category type!
                                                                                    </label>
                                                                                    ";
                                                                              }
                                                                              else
                                                                                echo "";
                                                                                              
                                                          ?>
                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content" style="text-align: center;">
                                                                        <div class="modal-header">
                                                                            You are about to add a category type. Are you sure you want to proceed?
                                                                        </div>
                                                                        <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                            <button type="submit" class="btn btn-success btn-lg" name="submit">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                        </div>                                           
                                                      </div>
                                                </div>
                                             
                                            
                                            </div>
                                           
                                        </form>  
                                    </td> 
                                </tr>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!--END CONTENT-->




         <!-- START CONTENT -->
             <section>
                  <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading" style="background-color: gray; color: white">
                              Item Category Types
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none">No</th>
                                    <th style="text-align: center">Category Name</th>
                                    <th style="text-align: center">Category Description</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM srg_ims_r_itemcategory ");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Category_ID"];
                                            $name = $row["Category_Name"];       
                                            $desc = $row["Category_Desc"]; 

                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none"><?php echo $No; ?></td>
                                                <td style="width: 10%"><?php echo $name; ?></td>
                                                <td style="width: 50%;"><?php echo $desc; ?></td>
                                                <td style="width: 10%; text-align: center;"> 
                                                     <a  data-toggle="modal" href="#Change<?php echo $No; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Modify</a>
                                                </td>
                                        </tr>   
                                                  
                                       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change<?php echo $No; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>
                                                            <h4 class="modal-title">Edit Details</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                          <form action="F_ManageItem.php" method="POST">

                                                                <div class="form-content">
                                                                    <div class="row group">                                                        
                                                                         <input type="hidden" name="catno" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $No; ?>" />

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Category Name</label>
                                                                                <input maxlength="150" type="text" name="catname" class="form-control" required="" style="color: black;" 
                                                                                value="<?php echo $name; ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Category Description</label>
                                                                                <input maxlength="150" type="text" name="catdesc" class="form-control" required="" style="color: black;" 
                                                                                value="<?php echo $desc; ?>"/>
                                                                            </div>
                                                                        </div>

                                                                       
                                                                        <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                </div>
                                                                
                                                                 <div class="panel" style="height: 50%; width: 100%">
                                                                    <button type="submit" class="btn btn-success " name="ChangeCategory"><i class="fa fa-save"></i>   Save</button> &nbsp&nbsp&nbsp&nbsp
                                                                </div>
                                                                
                                                                </div>
                                                            </form>  
                                                         </div>
                                                         
                                                         <br>
                                                    </div>
                                                </div>
                                            </div>                 
                                        <?php 
                                          } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>

              
                        <!--end container-->
                     </section>
                    </div>
                </div>
            </section>
            <!--END OF CONTENT-->
    </section>
</section>


</body>
</html>
