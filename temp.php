<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MTC | Payment Plan - Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php
        include('./ui/styles.php');
     ?>
</head>

<body class="theme-light-blue">
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

    <!-- Add Main Section -->
    <section class="content">
        <div class="container-fluid">
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>APPLICATION FORM</h2>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST">
                                <h3>Step 1</h3>
                                <fieldset>
                                    <label class="declaration">
                                        <b>DECLARATION: </b>
                                        After failing to comply with the 75% payment for registartion due to some circumstances beyond my control,I choose
                                        to settle my  tuition balance through a payment plan.The following reason/s attributed a lot for me to choose this option:
                                    </label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="description" cols="30" rows="4" class="form-control no-resize" minlength="10" maxlength="100" required></textarea>
                                            <label class="form-label">Type your reason (Max 100) </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Select the plan that suits you</label>
                                        <div class="demo-radio-button" id="select-plan-div">
                                            <input onchange="selectThis(this)" name="select-plan" type="radio" id="radio_30" class="with-gap" required />
                                            <label for="radio_30">One month Settlement</label>
                                            <input onchange="selectThis(this)" name="select-plan" type="radio" id="radio_31" class="with-gap radio-col-pink" />
                                            <label for="radio_31">Two months</label>
                                            <input onchange="selectThis(this)" name="select-plan" type="radio" id="radio_32" class="with-gap radio-col-purple" />
                                            <label for="radio_32">Three months</label>
                                            <input onchange="selectThis(this)" name="select-plan" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" />
                                            <label for="radio_33">Four months</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>Step 2</h3>
                                <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" class="p-date form-control" min="2017-04-01" max="2017-04-30" placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Amount.">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>Final</h3>
                                <fieldset>
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>

    


    <!-- END# Main Section -->
    <?php
        include('./ui/scripts.php');
     ?>
     

    <script>
        //document.getElementById("myDate").min = "1999-01-01";
        $(".p-date").attr("min", "07/12/2018");
        function selectThis(radio){
            console.log(radio);
        }
    </script>
</body>

</html>
