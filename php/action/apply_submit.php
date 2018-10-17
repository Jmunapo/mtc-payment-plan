
<?php 

/*Second
 * Get posted Data
 * by Joemags
 * date 20/09/2018
 */



require_once("../hawk/DBHelper.php");
$db = new DBHelper();



if(isset($_POST['reason'])){
    $phone          = $_POST['phone'];
    $personal=$db->getDetails('personal','phone',$phone);
    
    

    $reg_number     = $personal[0]['reg_number'];
    $reason         = htmlentities($_POST['reason']);
    $plan_span      = htmlentities($_POST['select-plan']);
    $dateFirst      = checkDateEmpty('dateFirst');
    $amountFirst    = checkAmountEmpty('amountFirst');
    $dateSecond     = checkDateEmpty('dateSecond');
    $amountSecond   = checkAmountEmpty('amountSecond');
    $dateThird      = checkDateEmpty('dateThird');
    $amountThird    = checkAmountEmpty('amountThird');
    $dateFourth     = checkDateEmpty('dateFourth');
    $amountFourth   = checkAmountEmpty('amountFourth');
    $status         =" ";

    $phone          = $_POST['phone'];

    
    $apply= array('applicants',
        $reg_number,
        $plan_span,
        $reason,
        $dateFirst,
        $amountFirst,
        $dateSecond,
        $amountSecond,
        $dateThird,
        $amountThird,
        $dateFourth,
        $amountFourth,
        $status
    );

    $entered = $db->insertData($apply);
    
    if($entered){
        ?>
        {
            "phone" : "<?php echo $phone; ?>",
            "status" : "success"

        }
        <?php
    }else if(!$entered){
            ?>
            {
                "status" : "error"
            }
        <?php
    }
}

function checkAmountEmpty($field){
    if(isset($_POST[$field])){
        return htmlentities($_POST[$field]);
    }
    return 0;
}

function checkDateEmpty($field){
    if(isset($_POST[$field])){
        return htmlentities($_POST[$field]);
    }
    return '';
}