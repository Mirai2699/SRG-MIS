<?php 
     include ("FMSHeader.php");
     include ("FMSJSCore.php");
     include ("FMSJSCustom.php");    
?>

<title>Add Expense Record | SRG FMS</title>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <label style="display:flex; margin: 5%; color: #fcfcfc; font-family: TitillumWeb-Light">< Navigation ></label>
                <li>
                    <a href="FMSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                   <a  href="FMSDeposits.php">
                        <i class="fa fa-download"></i>
                        <span>Deposits</span>
                   </a>
                </li>
                <li>
                    <a  href="javascript:;">
                        <i class="fa fa-arrow-down"></i>
                        <span>Extra Income</span>
                    </a>
                        <ul>
	                         <li><a href="FMSADDIncome.php"><span>Add Record</span></a></li>
	                         <li><a href="FMSVIEWIncome.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                <li>
                    <a class="active"  href="javascript:;">
                        <i class="fa fa-level-up"></i>
                        <span>Expenses</span>
                    </a>
                        <ul>
	                         <li><a class="active"  href="FMSADDExpenses.php"><span>Add Record</span></a></li>
	                         <li><a  href="FMSVIEWExpenses.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                 <li>
                    <a  href="javascript:;">
                        <i class="fa fa-exchange"></i>
                        <span>Reimburements</span>
                    </a>
                        <ul>
	                         <li><a  href="FMSADDReimburse.php"><span>Add Record</span></a></li>
	                         <li><a  href="FMSVIEWReimburse.php"><span>View Records</span></a></li>
		                </ul>
                </li>
                 <li>
                   <a href="FMSPriority.php">
                        <i class="fa fa-check"></i>
                        <span>Priority List</span>
                   </a>
                </li>
                 <!--
                 <li>
                    <a href="FMSReports.php">
                        <i class="fa  fa-book"></i>
                        <span>Printables</span>
                    </a>
                </li>
                -->
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


         <!-- START CONTENT -->
   <section class="panel">
                    <header class="panel-heading">
                        Add Expenses Record
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form action="F_ADDExpense.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>(If more than one itenerary)</label>
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary">Add</button></p>
                                                    </div>
                                                     <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label>Subject Title Description</label>
                                                            <input maxlength="100" type="text" name="ES_STDesc" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Date Spent</label>
                                                            <input type="date" name="ES_DateSpent" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                </div>
                                               

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php  

                                                     include('../db.php');

                                                    {
                                                        
                                                    $result = mysqli_query($connection, "SELECT MAX(ES_No) FROM srg_fms_t_expenses_summary");
                                                    $row = mysqli_fetch_array($result);
                                                    $last = $row[0];
                                                    $finalid = $last + 1;

                                                ?>

                                                 <div class="form-group">
                                                    <input type="hidden" name="ES_Batch" value="<?php echo $finalid; ?>">
                                                </div> <?php } ?>


                                                <div class="form-group">
                                                    <input type="hidden" name="ES_currentdate" value="<?php echo date('Y-m-d') ?>">
                                                </div>
                         
                                               

                                                <div class="row group">
                                               
                                                     <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Itenarary Description</label>
                                                            <input maxlength="100" type="text" name="E_Desc[]" class="form-control" required="" style="color: black;" placeholder="e.g.(Item Name) " />
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Amount Spent</label>
                                                             <input type="number" min="1.00" max="10000.00" step="0.01" name="E_Amount[]" id="amount" class="form-control" placeholder="Amount" onblur="findTotal()" style="color: black;"required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                             <input type="hidden" id="total" name="total" class="form-control" />
                                                        </div>
                                                    </div> 
                                                        <script type="text/javascript">
                                                            function findTotal(){
                                                            var arr = document.getElementsByName('E_Amount');
                                                            var tot=0;
                                                            for(var i=0;i<arr.length;i++){
                                                                if(parseInt(arr[i].value))
                                                                    tot += parseInt(arr[i].value);
                                                                 }
                                                                  document.getElementById('total').value = tot;
                                                             }
                                                        </script>
                                                  

                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;">Remove</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>


                                                </div> 
                                                
                                            </div>

                                          
                                            <a data-toggle="modal" href="#Continue" class="btn btn-success">Submit</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                You are about to record the following expenses. Are you sure you want to proceed?<br> This cannot be undone.
                                                            </div>
                                                            <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <button type="submit" class="btn btn-success btn-lg" name="insert">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
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
            
     
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


 <script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

</script>
</body>
</html>
