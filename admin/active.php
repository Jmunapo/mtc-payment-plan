<?php
require_once("../account/sessions.php");

if(isset($_SESSION['admin'])){
  
    $admin_username = $_SESSION['admin'];

    $db=new DBHelper();
    
    $username = $_REQUEST['reg'];
    
    $data = $db->getDetails('admin_login','username', $admin_username);
    $data0=$db->getDetails('applicants','reg_number', $username);
    if(sizeof($data) == 0){
        header("Refresh:0 url=plan-applicants.php");
        exit(0);
    }
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
        <!--  font awesome style-->

        <link rel="stylesheet" href="../fa/css/font-awesome.css">
    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />



    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- includes-->
    <?php
        include('lib/includes/sidenav.php');
     ?>

      <?php
        include('lib/includes/topnav.php');
     ?>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

    <style>
        .d-none{
           display:none !important;
        }
        .icon{
            margin-left:40%;
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
    <!-- Top Bar -->
    
    <!-- #Top Bar -->
    

       
        

    <section class="content">
        <div class="container-fluid">
           

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
         
                                        <li><a href="javascript:void(0);" data-type="prompt" >Notify</a></li>
                                        <li><a href="javascript:void(0);" data-type="autoclose-timer" id="refresh">Leave for now</a></li>
                                        <li><a href="javascript:void(0);" data-type="autoclose-timer" id="history"></a><button type="button" id="notify" class=" btn bg-teal btn-sm waves-effect m-r-10 changcolor">View Student's History</button></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="body">
                            <div class="row clearfix js-sweetalert">
                            <div class="col-xs-12 ">
                            <p><b>PAYMENT PLAN DETAILS</b></p>

                                </div>
                               
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>FULL NAME:</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data2[0]['surname'];?>&nbsp;&nbsp;<?php echo $data2[0]['name'];?></p>
                                   
                                </div>
            
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p>GURDIAN:</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <p><?php echo $data2[0]['relationship'];?></p>
                                   
                                </div>
                               
                                 <div id="unapproved" class="table-responsive col-xs-12 ">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>DATES:</th>
                                            <th>AMOUNT</th>
                                            <th>STATUS</th>
                                            <th>LAPSE</th>
                                        </tr>
                                    </thead>
                                 
                                  
                                    <tbody>
                                        <?php
                                            $arr = array('First', 'Second', 'Third', 'Fourth');

                                            include 'lib/includes/main.func.php';
                                            foreach ($arr as &$value) {
                                                ?>
                                                    <tr>
                                                        <td class="not-show-h"><?php echo  $data0[0]['date'.$value];?></td>
                                                        <td class="not-show-d"><?php echo  '$'.$data0[0]['amount'.$value]; ?></td>
                                                        
                                                        <td class="not-show-s"> <?php echo checkmDate($data0[0]['date'.$value], $data0[0]['amount'.$value]); ?></td>
                                                        <td class="not-show-s"> <?php echo checkmDays($data0[0]['date'.$value], $data0[0]['amount'.$value]); ?></td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                         
       <script src="../plugins/jquery/jquery.min.js"></script>
       <script>   
        var arrA = $(".not-show-h");
        var arrC = $(".not-show-d");
        var arrD = $(".not-show-d");

        var arrStatus = $(".not-show-s");

        
      
        for (let i = 0; i < arrA.length; i++) {
            const th = arrA[i];
                     
            if(($(th)[0].innerText).trim() === "0000-00-00"){
                $(th).addClass('d-none');
            }
        }

        for (let i = 0; i < arrC.length; i++) {
            const el = arrC[i];
            if(($(el)[0].innerText).trim() === "$-1"){
                $(el).addClass('d-none');
            }
            
        }
        for (let i = 0; i < arrD.length; i++) {
            const el = arrD[i];
            if(($(el)[0].innerText).trim() === "0"){
                $(el).HTML(`d-none`);
            }
            
        }

        for(let i = 0; i < arrStatus.length; i++){
            const sEl = $(arrStatus[i]).siblings()[0];
            if($(sEl).hasClass('d-none')){
                $(arrStatus[i]).addClass('d-none');
            }
        }

         
        
    </script>
                            </div>

                                <div class="col-xs-12 col-sm-12 txt ">
                                    <p><b>SUBMITTED REASON</b></p>
                                    <p ><?php echo $data0[0]['reason']; ?></P>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <button class="btn btn-primary waves-effect col-xs-12 col-md-12 changcolor" data-type="prompt3">CUSTOM NOTIFICATION</button>
                                    </div>
                               
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <button class="btn btn-primary waves-effect col-xs-12 col-md-12 changcolor" data-type="with-custom-icon2">AUTOMATIC NOTIFICATION</button>
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
    <script src="../plugins/jquery/jquery.min.js"></script>
    

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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js & Table js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>
    <script src="../js/pages/ui/animations.js"></script>

     <script src="assets/js/applicants.js"></script>
</body>

</html>
