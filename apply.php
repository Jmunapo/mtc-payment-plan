
<?php

session_start();
require_once("php/hawk/DBHelper.php");

if(isset($_SESSION['student'])){
    $db=new DBHelper();
        $username=$_SESSION['student'];

        $data=$db->getDetails('students_login','reg_number', $username);
        $data1=$db->getDetails('accounts','reg_number', $username);
        $data2=$db->getDetails('education','reg_number', $username);
        $data3=$db->getDetails('personal','reg_number', $username);
        $balance=$data1[0]['totalfeesacrued']-$data1[0]['totalpayments'];
        $year=$data2[0]['intake'];
        $phone=$data3[0]['phone'];
      
      

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Mtc Plan Apply</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- -------------------------------------------------------------------------------------------------- -->

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link href="css/main.css" rel="stylesheet">

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <?php
        include('./ui/loader.php');

        
    

       
     ?>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <?php
        include('./ui/search_bar.php');
     ?>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php
        include('./ui/top_nav.php');
     ?>
    <!-- #Top Bar -->
    <?php
        include('./ui/side_nav.php');
     ?>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PAYMENT PLAN
  
                 </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2></h2>
                        </div>
                        <div class="body">
                            <form id="form_validation">
                            <input type="text" name="phone" value="<?php echo $phone;?>"  hidden/>
                                <label class="declaration">
                                    <b>DECLARATION 1: </b>
                                    After failing to comply with the 75% payment for registartion due to some circumstances beyond my control,I choose
                                    to settle my  tuition balance through a payment plan.The following reason/s attributed a lot for me to choose this option:
                                </label>
                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="reason" cols="30" rows="4" class="form-control no-resize" minlength="10" maxlength="100" required></textarea>
                                        <label class="form-label">Type your reason (Max 100) </label><br>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Select the plan that suits you</label>
                                    <div class="demo-radio-button" id="select-plan-div">
                                        <input value="1" onchange="selectThis(this)" name="select-plan" type="radio" id="radio_30" class="with-gap" required />
                                        <label for="radio_30">One month Settlement</label>
                                        <input value="2" onchange="selectThis(this)" name="select-plan" type="radio" id="radio_31" class="with-gap radio-col-pink" />
                                        <label for="radio_31">Two months</label>
                                        <input value="3" onchange="selectThis(this)" name="select-plan" type="radio" id="radio_32" class="with-gap radio-col-purple" />
                                        <label for="radio_32">Three months</label>
                                        <input value="4" onchange="selectThis(this)" name="select-plan" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" />
                                        <label for="radio_33">Four months</label>
                                    </div>
                                </div>

                                <script>var even = false;</script>

                                <div id="even" class="even-display">
                                    <div class="form-group">
                                        <input type="checkbox" onchange="even = !even; evenlyDistribute(this)" id="evenly">
                                        <label for="evenly">Evenly distribute Installment</label>
                                    </div>
                                </div>

                                
                                <div id="installs">
                                    
                                </div>                                
                                
                                <br>

                                <label class="declaration">
                                    <b>DECLARATION 2: </b>
                                    I <b><?php echo $data[0]['full_name']; ?></b>, student number <b><?php echo $data[0]['reg_number']; ?> </b>, <b>intake <?php echo $data2[0]['intake']; ?></b> studying <b><?php echo $data2[0]['program']; ?></b> do here by declaring that the 
                                    above information is true and have made the above application in my own capacity.I declare that failure to 
                                    comply with the above will result in my defferement form my studies as <a class="readTnC" data-color="light-blue">read in the terms & conditions</a> of this
                                    application.
                                </label>

                                <br>

                                <div class="form-group">
                                    <input type="checkbox" id="accept_terms" name="accept_terms" required>
                                    <label for="accept_terms">I have <a class="readTnC" data-color="light-blue">read and accept the terms</a></label>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">APPLY</button>
                            </form>

                            <!-- For Material Design Colors -->
                            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Mtc PLAN Terms & Conditions:</h4>
                                        </div>
                                        <div class="modal-body">
                           <h4>Introdction</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="accept" class="btn btn-link waves-effect">ACCEPT</button>
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">DECLINE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/form-validation.js"></script>

    <!-- ------------------Date JS---------------------------- -->
    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <script src="js/pages/forms/basic-form-elements.js"></script>
    <!-- Date JS #END -->

    <script> const balance = <?php echo $balance; ?>; //needed by apply.js
    </script>
    <script src="js/apply.js"></script>

    

</body>

</html>
<?php
}
else {
    header("refresh:0 url=account/login.php");

}