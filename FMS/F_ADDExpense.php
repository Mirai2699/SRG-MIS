<?php

     $db = mysqli_connect('localhost','root','','srg_mis');
                
       $Esbatch = $_POST['ES_Batch'];
       $DateEntry = $_POST['ES_currentdate'];
       $Esdesc = $_POST['ES_STDesc'];
       $DateSpent = $_POST['ES_DateSpent'];
    

    $Estotal = 0;
    for($i = 0; $i <= count($_POST['E_Desc'])-1;$i++)
    {
        $amount = $_POST['E_Amount'][$i];
        $Estotal = $Estotal + $amount;

    }
  
      $update = mysqli_query($db,"UPDATE srg_fms_r_fund SET F_TotalFund = (F_TotalFund - $Estotal) WHERE F_ID = 1 "); 
      
      $acqins = mysqli_query($db, "INSERT INTO srg_fms_t_expenses_summary
                    (ES_EntryNo, ES_TotalAmount, ES_Description, ES_DateSpent, ES_DateEntry)     
                  VALUES ('$Esbatch', '$Estotal', '$Esdesc', '$DateSpent', '$DateEntry')");
              
      mysqli_query($db,$acqins);
     


?>
<?php  

    $user = 'root';
    $pass = '';
    $dbnm = 'srg_mis';

    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();  
    }

    $stmt = $dbh->prepare("INSERT INTO srg_fms_t_expenses(Ex_Description, Ex_Amount, Ex_SumBatch) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $desc);
    $stmt->bindParam(2, $amount);
    $stmt->bindParam(3, $batchid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['E_Desc'])-1;$i++)
    {
        $desc= $arr['E_Desc'][$i];
        $amount = $arr['E_Amount'][$i];
        $batchid = $arr['ES_Batch'];  
       
        $stmt->execute();

    }

   header('Location: FMSVIEWExpenses.php');  

?>


