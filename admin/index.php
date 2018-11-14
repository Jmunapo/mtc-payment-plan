
<?php
    require_once("../account/sessions.php");
    $data = $dbHelper->getDetails('admin_login','username', $username);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Home</title>
    <!-- Favicon-->
    <link rel="icon" href="../download.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
  <!-- font awesome-->
  <link rel="stylesheet" href="../fa/css/font-awesome.css">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <?php
        include('ui/loader.php');
    ?>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <?php
        include('ui/search_bar.php');
    ?>
    <?php
        include('lib/includes/sidenav.php');
     ?>

      <?php
        include('lib/includes/topnav.php');
     ?>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    
    <!-- #Top Bar -->
   
    <section class="content">
        <br>
        <div class="container-fluid">
            <div class="row block-header" style="background:white;height:35px;padding-top:15px;">&nbsp;&nbsp;
            
                <h2 class="fa fa-diamond fa-2x"style="color:silver">  THE JEWEL DASHBOARD</h2>
                
            </div>
        <br>

        
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pan" >
                    <div class="info-box bg-white hover-expand-effect" onclick="window.location='http://www.mutareteachers.ac.zw/'">
                        <div class="icon">
                            <i class="fa fa-database" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                            <div class="text" style="color:#1269ad !important"><b>ALL STUDENTS</b></div>
                            <div class="number count-to" data-from="0" data-to="2000" data-speed="1000" data-fresh-interval="20" style="color:#1269ad !important"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-white hover-expand-effect"  onclick="window.location='http://www.mutareteachers.ac.zw/'">
                        <div class="icon">
                        <i class="fa fa-cubes" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                        <div class="text" style="color:#1269ad !important"><b>REGISTERED </b></div>
                            <div class="number count-to" data-from="0" data-to="851" data-speed="1000" data-fresh-interval="20" style="color:#1269ad !important"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-white hover-expand-effect" onclick="window.location='http://www.mutareteachers.ac.zw/'">
                        <div class="icon">
                        <i class="fa fa-exclamation-triangle" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                        <div class="text" style="color:#1269ad !important"><b>UN-REGISTERED </b></div>
                            <div class="number count-to" data-from="0" data-to="149" data-speed="1000" data-fresh-interval="20"  style="color:#1269ad !important"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-white hover-expand-effect" onclick="window.location='plan-applicants.php';">
                        <div class="icon">
                        <i class="fa fa-folder-open" style="color:#1269ad"></i>
                        </div>
                        <div class="content">
                        <div class="text" style="color:#1269ad !important"><b>PAYMENT PLANS </b></div>
                            <div class="number count-to" data-from="0" data-to="145" data-speed="1000" data-fresh-interval="20" style="color:#1269ad !important"></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2 style="color:#1269ad"><b>PUBLISH A NOTE</b></h2>
                                </div>
                               
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-pencil" style="color:#1269ad"></i>
                                    </a>
                            
                                </li>
                            </ul>
                        </div>
                        <style>
                        .removeb{
                            font-weight:normal;
                        }
                        </style>
                      
                        <div class="body" style="background-color: #e9e9e9;height:381px;color:#1269ad">
                       
                                <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="form-label removeb">NOTE SUBJECT:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control " placeholder="Type Note Subject"/>
                                        </div>
                                    </div>
                                
                                </div>
                            
                                
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                    <label class="form-label removeb">NOTE BODY:</label>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please type the Note here..."></textarea>
                                        </div>
                                    </div>
                                
                         
                            <div class="form-group">
                                    <label class="form-label removeb">Select the note importance Level:</label>
                                    <div class="demo-radio-button" id="select-plan-div">
                                        <input value="1"  name="select-plan" type="radio" id="radio_30" class="with-gap" required />
                                        <label for="radio_30">General</label>
                                        <input value="2"  name="select-plan" type="radio" id="radio_31" class="with-gap radio-col-pink" />
                                        <label for="radio_31">Important</label>
                                        <input value="3" name="select-plan" type="radio" id="radio_32" class="with-gap radio-col-purple" />
                                        <label for="radio_32">Very Important</label>
                                        
                                    </div>
                                    <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button class="btn btn-primary waves-effect col-xs-12 col-sm-12 col-md-12 col-lg-12 changcolor3" data-type="prompt">PUBLISH MY NOTE</button>
                                    </div>
                                </div>
            
                                </div>

                        
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- #END# CPU Usage -->
            
          


                <div class="row" id="top">
              <div class="col-md-8 grid-margin stretch-card bg1"  >
                <div class="card "style="padding-top:8px">
                    <label for="validationCustom04">&nbsp;&nbsp;&nbsp;<i class="fa fa-diamond fa-2x ">&nbsp;&nbsp;&nbsp;USER PROFILE</i>
                    </label>
                    <div class="table-responsive" style="background-color: #e9e9e9">
                        <table class="table">
                          
                          <tbody>
                            <tr>
                              <td>
                                  <i class=" fa td1">&nbsp&nbsp&nbsp;TITLE:</i>
                              </td>
                              <td>
                                  <i class=" fa ">&nbsp&nbsp&nbsp;Mr</i>
                              </td>
    
            
                            </tr>
                            <tr>
                              <td>
                                  <i class=" fa td1">&nbsp&nbsp&nbsp;FIRST NAME</i>
                              
                              </td>
                              <td>
                                  <i class=" fa">&nbsp&nbsp&nbsp;Emmanuel</i>
                              </td>
                             
                            </tr>
                            <tr>
                              <td>
                                  <i class=" fa td1">&nbsp&nbsp&nbsp;LAST NAME:</i>
                              </td>
                              <td>
                                  <i class=" fa">&nbsp&nbsp&nbsp;Kunjenjema</i>
                              </td>
                             
                            </tr>
                            <tr>
                              <td>
                                  <i class=" fa td1">&nbsp&nbsp&nbsp;POST:</i>
                              </td>
                              <td>
                                  <i class=" fa">&nbsp&nbsp&nbsp;Registrar</i>
                              </td>
                              
                            </tr>
                            <tr>
                                <td>
                                    <i class=" fa td1">&nbsp&nbsp&nbsp;HIEGHEST QUALIFICATION:</i>
                                </td>
                                <td>
                                    <i class=" fa">&nbsp&nbsp&nbsp;Bsc computer science</i>
                                </td>
                                
                              </tr>
                              <tr>
                                  <td>
                                      <i class=" fa td1">&nbsp&nbsp&nbsp;INSTITUTION:</i>
                                  </td>
                                  <td>
                                      <i class=" fa">&nbsp&nbsp&nbsp;Great Zimbabwe University(2015 - 2018)</i>
                                  </td>
                                  
                                </tr>
                                <tr>
                                  <td>
                                      <i class=" fa td1">&nbsp&nbsp&nbsp;CURRENT:</i>
                                  </td>
                                  <td>
                                      <i class=" fa">&nbsp&nbsp&nbsp;Research Study</i>
                                  </td>
                                  
                                </tr>
                          </tbody>
                        </table>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button class="btn btn-primary waves-effect col-xs-12 col-sm-12 col-md-12 col-lg-12 changcolor3">Edit Profile</button>
                        </div>
                        <br>
                        <br>
                        </div>
                </div>
              </div>

              <div class="col-md-4 grid-margin stretch-card bg1" >
                  <div class="card" style="background-color: #e9e9e9">
                    <a href="javascript:void(0);" style="float: right; padding: 10px;">
                        <i class="fa fa-camera fa-2x" style="color:#1269ad"></i>
                    </a>
                      
                    <div class="all text-center "style="border:0px">
                        <img  src="../images/20171001_114842 - Copy.jpg" alt="no image"  width="90%" style=
                        "border-radius:50%" >
                    </div>
                    <br>
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

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/index.js"></script>
    <script src="assets/js/main_custom.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script src="assets/js/applicants.js"></script>
</body>

</html>
