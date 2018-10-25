<?php

require_once("../php/hawk/Optimizer.php");

$dbHwelper = new DBHelper();

if(!isset($_POST['reg'])){
    ?>
        {
            "error": "Nothing posted"
        }
    <?php 
    exit(0);
}


$user = $dbHwelper ->getDetails('personal', 'reg_number', $_POST['reg']);
$school = $dbHwelper ->getDetails('education', 'reg_number', $_POST['reg']);



if(sizeof($user) == 1){
    echo json_encode($user[0]);
    
    
    }else {
        ?>
        {
            "result" : "0"
        }
        <?php 
    }
?>