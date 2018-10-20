
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
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar ">
        <div class="container-fluid top">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand fa fa-bars " href="index.php"> MTC ADMIN PANEL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                 
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    
                    <li class="dropdown" style="margin-right:">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-user-o fa-2x"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">MY ACCOUNT</li>
                            <li class="body">

                            <li><a href="javascript:void(0);"><i class="fa fa-user-o fa-fw"></i>Profile</li></a>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-envelope fa-fw"></i>Mail</li></a>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);" class="signout-btn"><i class="fa fa-sign-out fa-fw"></i>Sign Out</li></a>
                            
              
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" data-close="true"><i class="fa fa-diamond fa-2x" style="color:gold"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                <img src="../uploads/<?php echo $data[0]['image']; ?> " width="45" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data[0]['full_name'] ;?></div>
                    <div class="email"><?php echo $data[0]['post'] ;?></div>
                  
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header" style="background-color:#1269ad;color:white">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="fa fa-home">
                            <span>Home</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="all.php">
                            <i class="fa fa-database">
                            <span>All Students</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="plan-applicants.php">
                            <i class="fa fa-folder-open">
                            <span>Payment Plans</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="registered.php">
                            <i class="fa fa-cubes">
                            <span>Registered Students</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="un-registered.php">
                            <i class="fa fa-close">
                            <span>Un-Registered Students</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="deffered.php">
                            <i class="fa fa-exclamation-triangle">
                            <span>Deffered Students</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="index.php">
                            <i class="fa fa-envelope" style="color:#1269ad">
                            <span  style="color:#1269ad">MTC Mail</span>
                        </a></i>
                        
                    </li>
                    <hr>
                    <li class="#">
                        <a href="my-profile.php">
                            <i class="fa fa-graduation-cap">
                            <span>My Profile</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="app.php">
                            <i class="fa fa-whatsapp text-success">
                            <span>whatsapp</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="tweeter.php">
                            <i class=" fa fa-twitter text-primary">
                            <span>Tweeter</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="signout.php">
                            <i class=" fa fa-sign-out text-danger">
                            <span>Sign Out</span>
                        </a></i>
                        
                    </li>
                  
                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal"style="background:#1269ad;color:white;font-family:New-Times-Roman" >
                <div class="copyright"  >
                   MTC &copy;2018  youngkunjez & joemags .
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
      
        <!-- #END# Right Sidebar -->
    </section>
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
                    <div class="info-box bg-white hover-expand-effect">
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
                    <div class="info-box bg-white hover-expand-effect">
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
                    <div class="info-box bg-white hover-expand-effect">
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
                    <div class="info-box bg-white hover-expand-effect"onclick="window.location='plan-applicants.php';">
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
            
          


                <div class="row">
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
