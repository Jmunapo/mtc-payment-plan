<?php
session_start();
require_once("../php/hawk/DBHelper.php");

if(isset($_SESSION['admin'])){
  
    $admin_username = $_SESSION['admin'];

    $db=new DBHelper();
 

        $username=$_REQUEST['reg'];
       
        $data = $db->getDetails('admin_login','username', $admin_username);
        $data0=$db->getDetails('applicants','reg_number', $username);
        $data2=$db->getDetails('personal','reg_number', $username);
        $data3=$db->getDetails('education','reg_number', $username);


}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Mutare Teachers College</title>
    <!-- Favicon-->
    <link rel="icon" href="../download.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

     <link rel="stylesheet" href="assets/css/main.css">
    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

    <!-- includes-->
    <?php
        include('lib/includes/sidenav.php');
     ?>

      <?php
        include('lib/includes/topnav.php');
     ?>

    
    <link rel="stylesheet" href="../fa/css/font-awesome.css">
    <style>
        .d-none{
           display:none !important;
        }
    </style>

    <script>
        var phone =<?php echo $data2[0]['phone'];?>;
    </script>
</head>


<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    
    <!-- #Top Bar -->
    

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                PAYMENT PLAN APPLICATION
            <?php
          
            ?>
                    
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $data2[0]['reg_number'];?></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-type="ajax-loader">Approve</a></li>
                                        <li><a href="javascript:void(0);" data-type="prompt" >Disapprove</a></li>
                                        <li><a href="javascript:void(0);" data-type="autoclose-timer" id="refresh">Leave for now</a></li>
                                        <li><a href="javascript:void(0);" data-type="autoclose-timer" id="history"></a><button type="button" id="notify" class=" btn bg-teal btn-sm waves-effect m-r-10 changcolor ">View Applicant history</button></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="body">
                            <div class="row clearfix js-sweetalert">
                            <div class="col-xs-12 ">
                                    <p><b>PERSONAL DETAILS</b></p>

                                </div>
                               
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>FULL NAME:</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data2[0]['surname'];?>&nbsp;&nbsp;<?php echo $data2[0]['name'];?></p>
                                   
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>PHONE NUMBER:</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data2[0]['phone'];?></p>
                                   
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>GURDIAN:</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data2[0]['relationship'];?></p>
                                   
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>PHYSICAL ADDRESS</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data2[0]['address'];?><br><?php echo $data2[0]['city'];?></p>
                                   
                                </div>
                                <div class="col-xs-12 ">
                                    <p><b>EDUCATIONAL DETAILS</b></p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>PROGRAM AND INTAKE</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>Diploma in Education, &nbsp;<?php echo $data3[0]['program'];?><br><b>Intake:</b><?php echo $data3[0]['intake'];?></p>
                                   
                                </div>

                                 <div class="col-xs-12 ">
                                    <p><b>PAYMENT PLAN DETAILS</b></p>

                                </div>

                               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo  $data0[0]['dateFirst']; ?></p>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo  $data0[0]['amountFirst']; ?></p>
                                </div>
                                <div class="not-show-d col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data0[0]['dateSecond']; ?></p>
                                </div>
                                <div class="not-show-a col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo  $data0[0]['amountSecond']; ?></p>
                                </div>
                                <div class="not-show-d col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data0[0]['dateThird']; ?></p>
                                </div>
                                <div class="not-show-a col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo  $data0[0]['amountThird']; ?></p>
                                </div>
                                <div class="not-show-d col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data0[0]['dateFourth']; ?></p>
                                </div>
                                <div class="not-show-a col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo  $data0[0]['amountFourth']; ?></p>
                                </div>

                                <div class="col-xs-12 txt ">
                                    <p><b>SUBMITTED REASON</b></p>
                                            <p><?php echo $data0[0]['reason']; ?></P>
                                </div>
                                <style>
                                    .changcolor{
                                        background-color:#1269ad;
                                    }
                                </style>
                               
                                 <a href="plan-applicants.php"><i class="fa fa-caret-left fa-3x">   </i>Back to applicants</a>
                                    
                             
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script>             
        $('#refresh').click(function () {
            setTimeout(function (){
                window.location="plan-applicants.php";
            },2000)
            
        });

        var arrD = $(".not-show-d");
        var arrA = $(".not-show-a");


        for (let i = 0; i < arrD.length; i++) {
            const el = arrD[i];
            if(($(el)[0].innerText).trim() === "0000-00-00"){
                $(el).addClass('d-none');
            }
        }

        for (let i = 0; i < arrA.length; i++) {
            const el = arrA[i];
            if(($(el)[0].innerText).trim() === "-1"){
                $(el).addClass('d-none');
            }
        }
    </script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/ui/confirm.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

</body>

</html>
