

<?php

session_start();
require_once("php/hawk/DBHelper.php");

if(!isset($_SESSION['student'])){
    header("refresh:0 url=account/login.php");
    exit(0);
}
    $db=new DBHelper();
    $username=$_SESSION['student'];

    $data=$db->getDetails('students_login','reg_number', $username);
?>
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

<style>
.nack{
    border-top:1px solid #1269ad;
}

</style>
    <section class="content">
    <h6 style="margin-left:87%;color:gold">Wellcome: <?php echo $data[0]['reg_number'];?></h6>
        <div class="container-fluid">
            <div class="block-header" style="margin-top:-5%">

                <h2 >&nbsp;&nbsp;</h2>
            </div>
<hr class="nak">
                        <style>
                            .pan{
                                    cursor: pointer;
                                }
                                .material-icons > img {
                                    vertical-align: unset;
                                }
                        </style>
            <!-- Quick Actions -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='main.php';">
                        <div class="icon">
                       <i class= "material-icons" > <img src="images/ecocash.png" alt="ecocash_image" width="100%"></i>
                        </div>
                        <div class="content">
                            <div class="text">INSTANT</div>
                            <div class="text">PAY NOW</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='apply.php';">
                    <div class="icon ">
                            <i class="fa fa-folder-open" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                            <div class="text">PAYMENT PLAN</div>
                            <div class="text">APPLY NOW</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='app.php';">
                    <div class="icon">
                            <i class="fa fa-cubes" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                            <div class="text">FEES</div>
                            <div class="text"> STRUCTURE </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='app.php';">
                    <div class="icon ">
                            <i class="fa fa-bars" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                            <div class="text">FEES  </div>
                            <div class="text">STATEMENT</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Quick Action -->

            <br>
           

        


            <hr>
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">email</i> MESSAGES
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFILE
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            
                            <div class="tab-content" style="margin-left:2%">
                                <div role="tabpanel" class="tab-pane fade in active" id="messages_with_icon_title">
                                    <div class="bs-example" data-example-id="media-alignment">
                    
                                            <div class="media-body">
                                            <div class="media">
                                            <div class="media-left">
                                                <a href="javascript:void(0);">
                                                   <h4 class="media-heading"><i class="fa fa-envelope">  Top aligned media</h4></i>
                                                </a>
                                            </div>
                                                
                                                <p>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                                    commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                    Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                                    in faucibus.
                                                </p>
                                                <p>
                                                    Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis
                                                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <b>Profile Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
        </div>
    </section>

    <?php
        include('./ui/scripts.php');
     ?>
</body>

</html>