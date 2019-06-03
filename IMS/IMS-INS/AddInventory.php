<?php  

    $user = 'root';
    $pass = '';
    $dbnm = 'pupqcims_db';

    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt = $dbh->prepare("INSERT INTO ims_r_stock(Stock_Key_Unit, Item_Name, Item_Category, Item_Desc, Unit, Quantity, Critical_level, DEF_Active)
                           VALUES (?, ?, ?, ?, ?, ?,10,1)");
       
    $stmt->bindParam(1, $sku);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $cat);
    $stmt->bindParam(4, $desc);
    $stmt->bindParam(5, $unit);
    $stmt->bindParam(6, $quan);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['a_procure'])-1;$i++)
    {   

        
        $sku = $arr['a_sku'][$i];
        $name = $arr['a_name'][$i];
        $cat = $arr['a_category'][$i];
        $desc = $arr['a_desc'][$i];
        $unit = $arr['a_unit'][$i];
        $quan = $arr['a_quan'][$i];
        $stmt->execute();

        
    }

     header('Location: INSInvStats.php');

?>