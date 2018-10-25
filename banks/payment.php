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
    if(isset($_POST['username']) && $_POST['amount']){

        $date=date("Y-m-d");
        $reg_number = $_POST['username'];
        $amount = $_POST['amount'];

       

        $db = new DBHelper();
        $valid_reg=$db->getDetails('personal','reg_number',$reg_number);
        if (sizeof($valid_reg) == 1) {
        $pay= array('payments',
        $date,
        $reg_number,
        $amount,
    );
       

    $entered = $db->insertData($pay);
    
    if($entered){
        //run updates to plans if exits
        /*
        $plan=$db->getDetails('applicants','reg_number',$reg_number);
        if(sizeof($plan) && $plan[0]['status'] != "settled"){


           $amtF=  $plan[0]['amountFirst'];
           $amtS=  $plan[0]['amountSecond'];
           $amtT=  $plan[0]['amountThird'];
           $amtFT=  $plan[0]['amountFourth'];

           $data=  array( $amtF, $amtS, $amtT, $amtFT);
             
           while( $amount>0){
               if($amtF>$amount){
                $amtF-=$amount;
                echo $amtF;
               }
               
           }


        }
        */
        ?>
        {
           
            <script> $('#submited').show();</script>
            <script>setTimeout(()=>{
        window.location="payment.php"
    },3000) </script>
            <?php
                exit(0);
                ?>
        }
        
        <?php
    }else if(!$entered){
            ?>
            {
                <script> $('#logo').addClass('d-none');</script>
                <script> $('#invalid').show();</script>
                <script>setTimeout(()=>{
        window.location="payment.php"
    },3000) </script>
            <?php
                exit(0);
                ?>
            }
        <?php
    }
  
    }
    else{
        ?>
        {
            <script> $('#logo').addClass('d-none');</script>
            <script> $('#invalid').show();</script>
            <script>setTimeout(()=>{
        window.location="payment.php"
    },3000) </script>
            <?php
                exit(0);
                ?>
        }
    <?php   
    }
}
?>
<script>

function validate(){
 y = reg.value;
 

 $.post("./search.php", {"reg": y}, (result)=>{
     
     let user = JSON.parse(result);
     $('#check').show();
     $("#check").html(` 
                            <i class="fa fa-info-circle fa-2x"></i>
                          ${user.name} &nbsp; ${user.surname}`);
     

     
 });
}


</script>
</body>
</html>


 