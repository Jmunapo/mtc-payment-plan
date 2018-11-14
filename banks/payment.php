<?php
require_once("../php/hawk/Optimizer.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>cbz banking</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.icon" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- My Css -->
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <!--
font awesome
        -->
        <link rel="stylesheet" href="../fa/css/font-awesome.css">

    

</head>
<style>
.d-none{
    display:none;
}
        .card{
            margin-top: 100px;
            margin-bottom:unset;
     
        }
             .changcolor{
       background:#1269ad !important;
    }
    </style>

<body class="login-page">
    <div class="login-box mt-5">
        
        <div class="card ">
            <div class="body">
            <div class="alert alert-warning d-none" id="invalid">
                Reg number not found <i class="fa fa-question fa-2x"></i>
            </div>
                <form id="sign_in" method="POST" action="./payment.php">
                   
                    <div class="logo" id="logo">
                        <img src="../images/CBZ Holding Limited.png" width="112%" height="100px" alt="" style="margin-left:-6%;margin-right:-15%;margin-top:-6%"  >
                    </div>
                    <div class="msg" style="color:#1269ad" >PARTNERS FOR SUCCESS</div>
                    <div class="alert d-none" id="check" style="background:#126">
                   
                
            </div>
                
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user fa-2x"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="reg" name="username" placeholder="Enter Student Number"  required autofocus onfocusout="validate()">
                        </div>
                    </div>

                   
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-paperclip fa-2x"></i>
                        </span>
                        <div class="form-line">
                            <input type="number" min="10" max="20000" class="form-control" name="amount" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div id="view">
                                    
                                </div> 
                    <div class="msg col-xs-6" style="color:grey; margin-top:-6%" >BENEFICIARY NAME:</div>
                    <div class="msg col-xs-6" style="color:grey; margin-top:-6%" >MUTARE TEACHERS</div>
                    <div class="msg col-xs-6" style="color:grey; " > ACCOUNT NUMBER:</div>
                    <div class="msg col-xs-6" style="color:grey; " >0200..................02365</div>
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect changcolor" name="sub" type="submit">SUBMIT PAYMENT</button>
                        </div>
                    </div>
                    <div class="alert alert-warning d-none" id="submited">
                payment submitted succesffully <i class="fa fa-check fa-2x"></i>
                 </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-in.js"></script>

    <?php
    
    function updateData($name, $planAmnt, $reg_number){
        $reg = ['reg_number' => $reg_number ];

        $fields = [ $name => $planAmnt ];

        $db = new Optimizer();
		
        $check = $db->updateExactData('applicants', $reg, $fields);
        
    
         
        //  if($pay>=$totalamounts){
                
           //   $status = [ "status" => "settled"];
               // $db->updateExactData('applicants', $reg, $status);
         // }
        
        
    }
    if(isset($_POST['username']) && $_POST['amount']){

        $date=date("Y-m-d");
        $reg_number = $_POST['username'];
        $amount = $_POST['amount'];
        
        $db = new DBHelper();
        
        $valid_reg=$db->getDetails('personal','reg_number',$reg_number);
        if (sizeof($valid_reg) == 1) {
            $pay= array('payments', $date, $reg_number, $amount);
        
            $entered = $db->insertData($pay);
            $accounts=$db->getDetails('accounts','reg_number',$reg_number);
            $totalpaid=$accounts[0]['totalpayments'];
            $totalpaid+=$amount;
            $db->updateData('accounts','totalpayments', $totalpaid, 'reg_number', $reg_number);
            
        
            if($entered){
                $plan = $db->getDetails('applicants','reg_number',$reg_number);
                if(sizeof($plan) == 1 && $plan[0]['status'] != "settled"){
                    $planArr = array('amountFirst', 
                                    'amountSecond', 
                                    'amountThird', 
                                    'amountFourth');
                    $planIndex = $plan[0];

                    foreach ($planArr as $key => $name) {
                        $planAmnt = $planIndex[$name];
                        if($planAmnt - $amount <= 0){
                            $amount -= $planAmnt;
                            updateData($name, "00", $reg_number);
                        }else {
                           $planAmnt -= $amount; 
                           updateData($name, $planAmnt, $reg_number, true);
                           break;
                        }
                    }
                }

                //try  setteled or not
                
              $updatestatus  = $db->getDetails('applicants','reg_number',$reg_number);
                $fstdate     = $updatestatus[0]['dateFirst'];
                $scnddate    = $updatestatus[0]['dateSecond'];
                $thrddate    = $updatestatus[0]['dateThird'];
                $forthdate   = $updatestatus[0]['dateFourth'];

                //amounts
                $amtfst     = $updatestatus[0]['amountFirst'];
                $amtsnd    = $updatestatus[0]['amountSecond'];
                $amtthd    = $updatestatus[0]['amountThird'];
                $amtfth  = $updatestatus[0]['amountFourth'];
                $amounts   =array($amtfst,$amtsnd,$amtthd,$amtfth );
                $totalamounts =   array_sum($amounts);
                
                
                if ($scnddate == "0000-00-00" ){

                         $date  = $fstdate ;
                       
                }
                
                elseif ($thrddate == "0000-00-00" ){

                    $date = $scnddate;
                   
               } elseif ($forthdate == "0000-00-00" ){

                     $date  = $thrddate;
                   
               }else{

                $date  = $forthdate;
               
                }
               
                $payments= $db->getDetails('payments','reg_number',$reg_number);
                $appDate= $db->getDetails('applicants','reg_number',$reg_number);
                $appliDate = $appDate[0]['date'];
                //print_r($payments);
                function filter_function($payment){
                    global $date;
                    global $appliDate;
                  
                    
                     
                     return $appliDate <= $payment['date'] && $payment['date'] <= $date;
                 }
                echo "<br />"; 
                $totalpayments = array_filter($payments, 'filter_function');
                  $paymentnumber=count($totalpayments);
               // coming up with the sum
                 $pay=0;
                for ($i =0 ;$i<$paymentnumber;$i++){
                $pay += ($totalpayments[$i]['amount']);
                
                }

               
                $total= $db->getDetails('applicants','reg_number',$reg_number);
                $phonedetails= $db->getDetails('personal','reg_number',$reg_number);
                $phone=$phonedetails[0]['phone'];
             
                $planTotal=$total[0]['total'];
                if($pay>=$planTotal){
                   
                
                    $db->updateData('applicants','status', 'settled', 'reg_number', $reg_number);
                      // suppress error message
                        error_reporting(0);

                        // BulkSMS Webservice username for sending SMS.
                        //Get it from User Configuration. Its case sensitive.

                        $username = 'youngkunjez';

                        // Webservices token for above Webservice username
                        $token = '24ec935f60593ca19330eb597309511d';

                        // BulkSMS Webservices URL
                        $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';

                        // destination numbers, comma seperated or use #groupcode for sending to group
                        // $destinations = '#devteam,263071077072,26370229338';
                        // $destinations = '26300123123123,26300456456456';  for multiple recipients
                        //$destinations = $phone;
                          $message="Thank you for settling your plan";
                        // send via BulkSMS HTTP API

                        $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
                        $ws_str .= '&to=0' . urlencode($phone) . '&msg='.urlencode($message);
                        $ws_response = @file_get_contents($ws_str);

                    
                    
                }
                else{
                    
                   
                    $status= ($pay/$planTotal)*100;
                    $db->updateData('applicants','status', $status, 'reg_number', $reg_number);
                    error_reporting(0);

                    // BulkSMS Webservice username for sending SMS.
                    //Get it from User Configuration. Its case sensitive.

                    $username = 'youngkunjez';

                    // Webservices token for above Webservice username
                    $token = '24ec935f60593ca19330eb597309511d';

                    // BulkSMS Webservices URL
                    $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';

                    // destination numbers, comma seperated or use #groupcode for sending to group
                    // $destinations = '#devteam,263071077072,26370229338';
                    // $destinations = '26300123123123,26300456456456';  for multiple recipients
                    //$destinations = $phone;
                      $message="Thank you for complying to your plan installments,you are $status % to compelete";
                    // send via BulkSMS HTTP API

                    $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
                    $ws_str .= '&to=0' . urlencode($phone) . '&msg='.urlencode($message);
                    $ws_response = @file_get_contents($ws_str);
                    
                }

                ?>
            <script> $('#submited').show();</script>
            <script>setTimeout(()=>{window.location="payment.php"},2000) </script>

            <?php }else if(!$entered){   ?>

                <script> $('#logo').addClass('d-none');</script>
                <script> $('#invalid').show();</script>
                <script>setTimeout(()=>{window.location="payment.php" },3000) </script>
            <?php
            }
        
        } else{  ?>
            <script> $('#logo').addClass('d-none');</script>
            <script> $('#invalid').show();</script>
            <script>setTimeout(()=>{ window.location="payment.php" },3000) </script>
        <?php }
    } ?>

<script>
    function validate(){
    let regNumber = reg.value;
    
    $.post("./search.php", {"reg": regNumber}, (result)=>{
        let user = JSON.parse(result);
        $('#check').show();
        if("name" in user){
            $("#check").html(`<i class="fa fa-info-circle fa-2x"></i>${user.name} &nbsp; ${user.surname}`);
        }else{
            $("#check").html(`<i class="fa fa-info-circle fa-2x"></i>Student not found!`); 
        }
    });
 
    }
</script>

</body>
</html>


 