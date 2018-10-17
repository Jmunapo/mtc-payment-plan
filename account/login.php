<?php

include('../config.php');

// print_r(MTC_HOME);

// header('Location: '.MTC_HOME.'/pages/sign-in.html');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MTC | Login</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

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

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">MTC</a>
            <small>Payment Plan</small>
        </div>
        <div class="card">
            <div class="body">
            <div class="alert alert-danger d-none" id="invalid-cred">
                Invalid Credentials
            </div>
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Reg Number" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5 d-hidden" >
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 d-hidden">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="javascript:;">Forgot Password?</a>
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
</body>

</html>

<?php
if(isset($_POST['username']) && $_POST['password']){
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    require_once('../php/hawk/DBHelper.php');

    $db = new DBHelper();

    $login = $db->getDetailsPass('students_login', 'reg_number', 'password', $username, $password);

    if (sizeof($login) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';
        header('Location: ../index.php');
        exit();
    }

    $admin = $db->getDetailsPass('admin_login', 'username', 'password', $username, $password);

    if (sizeof($admin) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header('Location: ../admin/index.php');
        exit();
    }

    ?>

        <script>
            $('#invalid-cred').show();
        </script>
    <?php



    var_dump($login);

}