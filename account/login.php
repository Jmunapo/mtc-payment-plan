<?php
include('../config.php');
require_once('./sessions.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MTC | Login</title>
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
            <div class="alert alert-danger d-none" id="invalid-cred">
                Invalid Credentials
            </div>
                <form id="sign_in" method="POST" action="./login.php">
                    <div class="msg">THE JEWEL OF EXCELLENCE:</div>
                    <div class="logo">
                        <img src="../images/download.png" width="30%" height="50%" alt="" style="margin-left:33%">
                    </div>
                
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user fa-2x"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Reg Number" required autofocus>
                        </div>
                    </div>

                   
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock fa-2x"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect changcolor" name="sub" type="submit">SIGN IN</button>
                        </div>
                    </div>
                   
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 d-hidden">
                            <a href="#"><?php echo  date("H:i:A");?></a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="#"><?php echo  date("d-M-Y");?></a>
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
    if(isset($_POST['username']) && $_POST['password']){
    
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $db = new DBHelper();

        $login = $db->getDetailsPass('students_login', 'reg_number', 'password', $username, $password);
        if (sizeof($login) == 1) {
            $_SESSION['student'] = $username;
            $_SESSION['role'] = 'student';
            ?>
            <script> window.location.reload()</script>
            <?php
            //header('Location: ../indexz.php');
            exit(0);
        }

        $admin = $db->getDetailsPass('admin_login', 'username', 'password', $username, $password);

        if (sizeof($admin) == 1) {
            $_SESSION['admin'] = $username;
            $_SESSION['role'] = 'admin';
            ?>
            <script> window.location.reload()</script>
            <?php
            exit(0);
        }

    ?>
        <script> $('#invalid-cred').show();</script>
    <?php
    }
?>
</body>
</html>


 