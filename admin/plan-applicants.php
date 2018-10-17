<?php

session_start();
require_once("../php/hawk/DBHelper.php");

if(isset($_SESSION['username'])){
    $db = new DBHelper();
    $username = $_SESSION['username'];
    $unapproved = " ";
    $approved = "approved";

    $data = $db->getDetails('admin_login','username', $username);
    $unapprovedApplic = $db->getDetails('applicants','status', $unapproved);
    $approvedApplic = $db->getDetails('applicants','status', $approved);

    $allApplicants = $db->getAllValues('applicants');

    $defaulters = array_filter($approvedApplic, function ($d){
        $nowDate = new DateTime("yesterday");
        $tomorrowDate = new DateTime("tomorrow");
        $dFst = $tomorrowDate;
        $dSec = $tomorrowDate;
        $dTrd = $tomorrowDate;
        $dFth = $tomorrowDate;

        if($d['dateFirst'] != '0000-00-00'){
            $dFst = new DateTime($d['dateFirst']);

        }
        if($d['dateSecond'] != '0000-00-00'){
            $dSec = new DateTime($d['dateSecond']);
        }
        if($d['dateThird'] != '0000-00-00'){
            $dTrd = new DateTime($d['dateThird']);
        }
        if($d['dateFourth'] != '0000-00-00'){
            $dFth = new DateTime($d['dateFourth']);
        }
        
        
        if($nowDate >= $dFst || $nowDate >= $dSec  || $nowDate >= $dTrd  || $nowDate >= $dFth ){
            return true;
        }else {
            return false;
        }
    });
      
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MTC Plan Applicants</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
     <!---Link to font awesome-->
     <link rel="stylesheet" href="../fa/css/font-awesome.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/main.css">
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
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../index.html">ADMINBSB - MATERIAL DESIGN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?php echo count($unapprovedApplic);?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
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
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="../index.html">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pages/typography.html">
                            <i class="material-icons">text_fields</i>
                            <span>Typography</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pages/helper-classes.html">
                            <i class="material-icons">layers</i>
                            <span>Helper Classes</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Widgets</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Cards</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../pages/widgets/cards/basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/cards/colored.html">Colored</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/cards/no-header.html">No Header</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Infobox</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>User Interface (UI)</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/ui/alerts.html">Alerts</a>
                            </li>
                            <li>
                                <a href="../pages/ui/animations.html">Animations</a>
                            </li>
                            <li>
                                <a href="../pages/ui/badges.html">Badges</a>
                            </li>

                            <li>
                                <a href="../pages/ui/breadcrumbs.html">Breadcrumbs</a>
                            </li>
                            <li>
                                <a href="../pages/ui/buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="../pages/ui/collapse.html">Collapse</a>
                            </li>
                            <li>
                                <a href="../pages/ui/colors.html">Colors</a>
                            </li>
                            <li>
                                <a href="../pages/ui/dialogs.html">Dialogs</a>
                            </li>
                            <li>
                                <a href="../pages/ui/icons.html">Icons</a>
                            </li>
                            <li>
                                <a href="../pages/ui/labels.html">Labels</a>
                            </li>
                            <li>
                                <a href="../pages/ui/list-group.html">List Group</a>
                            </li>
                            <li>
                                <a href="../pages/ui/media-object.html">Media Object</a>
                            </li>
                            <li>
                                <a href="../pages/ui/modals.html">Modals</a>
                            </li>
                            <li>
                                <a href="../pages/ui/notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="../pages/ui/pagination.html">Pagination</a>
                            </li>
                            <li>
                                <a href="../pages/ui/preloaders.html">Preloaders</a>
                            </li>
                            <li>
                                <a href="../pages/ui/progressbars.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="../pages/ui/range-sliders.html">Range Sliders</a>
                            </li>
                            <li>
                                <a href="../pages/ui/sortable-nestable.html">Sortable & Nestable</a>
                            </li>
                            <li>
                                <a href="../pages/ui/tabs.html">Tabs</a>
                            </li>
                            <li>
                                <a href="../pages/ui/thumbnails.html">Thumbnails</a>
                            </li>
                            <li>
                                <a href="../pages/ui/tooltips-popovers.html">Tooltips & Popovers</a>
                            </li>
                            <li>
                                <a href="../pages/ui/waves.html">Waves</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Forms</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/forms/basic-form-elements.html">Basic Form Elements</a>
                            </li>
                            <li>
                                <a href="../pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                            </li>
                            <li>
                                <a href="../pages/forms/form-examples.html">Form Examples</a>
                            </li>
                            <li>
                                <a href="../pages/forms/form-validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="../pages/forms/form-wizard.html">Form Wizard</a>
                            </li>
                            <li>
                                <a href="../pages/forms/editors.html">Editors</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">PAYMENT PLANS</i>
                            <span>Tables</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                            <a onclick="switchTable('unapproved')" data-target="#navbar-collapse"  class="navbar-toggle" href="javascript:;">Unapproved Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('approved')" data-target="#navbar-collapse"  class="navbar-toggle" href="javascript:;">Approved Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('defaulters')" data-target="#navbar-collapse"  class="navbar-toggle" href="javascript:;">Defaulted Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('settled')" data-target="#navbar-collapse"  class="navbar-toggle" href="javascript:;">Settled Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('all')" data-target="#navbar-collapse"  class="navbar-toggle" href="javascript:;">All Plans</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Medias</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/medias/image-gallery.html">Image Gallery</a>
                            </li>
                            <li>
                                <a href="../pages/medias/carousel.html">Carousel</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">pie_chart</i>
                            <span>Charts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/charts/morris.html">Morris</a>
                            </li>
                            <li>
                                <a href="../pages/charts/flot.html">Flot</a>
                            </li>
                            <li>
                                <a href="../pages/charts/chartjs.html">ChartJS</a>
                            </li>
                            <li>
                                <a href="../pages/charts/sparkline.html">Sparkline</a>
                            </li>
                            <li>
                                <a href="../pages/charts/jquery-knob.html">Jquery Knob</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Example Pages</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/examples/sign-in.html">Sign In</a>
                            </li>
                            <li>
                                <a href="../pages/examples/sign-up.html">Sign Up</a>
                            </li>
                            <li>
                                <a href="../pages/examples/forgot-password.html">Forgot Password</a>
                            </li>
                            <li>
                                <a href="../pages/examples/blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="../pages/examples/404.html">404 - Not Found</a>
                            </li>
                            <li>
                                <a href="../pages/examples/500.html">500 - Server Error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">map</i>
                            <span>Maps</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/maps/google.html">Google Map</a>
                            </li>
                            <li>
                                <a href="../pages/maps/yandex.html">YandexMap</a>
                            </li>
                            <li>
                                <a href="../pages/maps/jvectormap.html">jVectorMap</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../changelogs.html">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                    <li class="header">LABELS</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Payment Plan Applicants
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 id="applicants-title">
                                unapproved plans
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <button type="button" id="notify" class="d-none btn bg-teal btn-lg waves-effect m-r-10">Notify All</button>
                                </li> 
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="switchTable('unapproved')" href="javascript:;">Unapproved</a></li>
                                        <li><a onclick="switchTable('approved')" href="javascript:;">Approved</a></li>
                                        <li><a onclick="switchTable('defaulters')" href="javascript:;">Defaulters</a></li>
                                        <li><a onclick="switchTable('settled')" href="javascript:;">Settled Plans</a></li>
                                       
                                        <li><a onclick="switchTable('all')" href="javascript:;">All</a></li>
                                    </ul>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                       <div class="body">
                            <div id="unapproved" class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Reg Number</th>
                                            <th>Full Name</th>
                                            <th>Programme</th>
                                            <th>Intake</th>
                                            <th>Resident</th>
                                            <th>Span</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Reg Number</th>
                                            <th>Full Name</th>
                                            <th>Programme</th>
                                            <th>Intake</th>
                                            <th>Resident</th>
                                            <th>Span</th>
                                            <th>Balance</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $num=count($unapprovedApplic);
                                       
                                        for($i=0; $i<$num ;$i++ ){

                                           $name=$unapprovedApplic[$i]['reg_number'];
                                           $data3=$db->getDetails('personal','reg_number', $name);
                                           $data4=$db->getDetails('education','reg_number', $name);
                                           $data5=$db->getDetails('accounts','reg_number', $name);
                                           $res=$data4[0]['resident'];
                                           $place="";
                                           if($res==1){
                                               $place="Yes";
                                           }
                                           else{
                                               $place="No";
                                           }
                                            ?>
                                            <tr class='plan-row'>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $data3[0]['surname'];?>&nbsp;<?php echo $data3[0]['name'];?></td>
                                            
                                                <td><?php echo $data4[0]['program'];?></td>
                                                <td><?php echo $data4[0]['intake'];?></td>
                                                <td><?php echo $place;?></td>
                                                <td><?php echo $unapprovedApplic[$i]['plan_span'];?></td>
                                                <td>$<?php echo $data5[0]['totalfeesacrued']-$data5[0]['totalpayments'];?>-00</td>
                                            </tr>
                                            
                                        <?php    
                                        
                                    }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="approved" class="table-responsive d-none">

                                <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        <th>Reg Number</th>
                                            <th>Full Name</th>
                                            <th>Programme</th>
                                            <th>Intake</th>
                                            <th>Resident</th>
                                            <th>Span</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Reg Number</th>
                                            <th>Full Name</th>
                                            <th>Programme</th>
                                            <th>Intake</th>
                                            <th>Resident</th>
                                            <th>Span</th>
                                            <th>Balance</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $in=count($approvedApplic);
                                       
                                        for($i=0; $i<$in ;$i++ ){

                                           $name=$approvedApplic[$i]['reg_number'];
                                           $data3=$db->getDetails('personal','reg_number', $name);
                                           $data4=$db->getDetails('education','reg_number', $name);
                                           $data5=$db->getDetails('accounts','reg_number', $name);
                                           $res=$data4[0]['resident'];
                                           $place="";
                                           if($res==1){
                                               $place="Yes";
                                           }
                                           else{
                                               $place="No";
                                           }
                                            ?>
                                            <tr class="plan-row <?php echo $unapprovedApplic[0]['status'] ?>">
                                            
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $data3[0]['surname'];?>&nbsp;<?php echo $data3[0]['name'];?></td>
                                           
                                            <td><?php echo $data4[0]['program'];?></td>
                                            <td><?php echo $data4[0]['intake'];?></td>
                                            <td><?php echo $place;?></td>
                                            <td><?php echo $unapprovedApplic[$i]['plan_span'];?></td>
                                            <td>$<?php echo $data5[0]['totalfeesacrued']-$data5[0]['totalpayments'];?>-00</td>
                                            </tr>
                                            
                                    <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                            <div id="all" class="table-responsive d-none">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        <th>Reg Number</th>
                                            <th>Full Name</th>
                                            <th>Programme</th>
                                            <th>Intake</th>
                                            <th>Resident</th>
                                            <th>Span</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Reg Number</th>
                                            <th>Full Name</th>
                                            <th>Programme</th>
                                            <th>Intake</th>
                                            <th>Resident</th>
                                            <th>Span</th>
                                            <th>Balance</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $in2=count($allApplicants);
                                      
                                        for($i=0; $i<$in2 ;$i++ ){

                                           $name=$allApplicants[$i]['reg_number'];
                                           $data3=$db->getDetails('personal','reg_number', $name);
                                           $unapprovedApplic=$db->getDetails('applicants','reg_number', $name);
                                           $data4=$db->getDetails('education','reg_number', $name);
                                           $data5=$db->getDetails('accounts','reg_number', $name);
                                           $res=$data4[0]['resident'];
                                           $place="";
                                           if($res==1){
                                               $place="Yes";
                                           }
                                           else{
                                               $place="No";
                                           }
                                            ?>
                                            <tr class="plan-row <?php echo $unapprovedApplic[0]['status'] ?>">
                                            
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $data3[0]['surname'];?>&nbsp;
                                                    <?php echo $data3[0]['name'];?></td>
                                            
                                                <td><?php echo $data4[0]['program'];?></td>
                                                <td><?php echo $data4[0]['intake'];?></td>
                                                <td><?php echo $place;?></td>
                                                <td><?php echo $unapprovedApplic[0]['plan_span'];?></td>
                                                <td>$<?php echo $data5[0]['totalfeesacrued']-$data5[0]['totalpayments'];?>-00</td>
                                            
                                            </tr>
                                            
                                        <?php    
                                        
                                    }
                                      ?>
                                    </tbody>
                                </table>

                            </div>
                        <div id="defaulters" class="table-responsive d-none">
                        
                            <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                    <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>Programme</th>
                                        <th>Intake</th>
                                        <th>Span</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>Programme</th>
                                        <th>Intake</th>
                                        <th>Span</th>
                                        <th>Balance</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                foreach ($defaulters as $default => $value)
                                {
                                    $reg = $value['reg_number'];
                                    $personal = $db->getDetails('personal','reg_number', $reg);
                                    $userInfo = $db->getDetails('applicants','reg_number', $reg);
                                    $eduDetails = $db->getDetails('education','reg_number', $reg);
                                    $accountDetails = $db->getDetails('accounts','reg_number', $reg);
                                    ?>

                                    <tr class="plan-row <?php echo $unapprovedApplic[0]['status'] ?>">
                                                
                                        <td><?php echo $reg;?></td>
                                        <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                    
                                        <td><?php echo $eduDetails[0]['program'];?></td>
                                        <td><?php echo $eduDetails[0]['intake'];?></td>
                                        <td><?php echo $value['plan_span'];?></td>
                                        <td>$<?php echo $accountDetails[0]['totalfeesacrued']-$accountDetails[0]['totalpayments'];?>-00</td>
                                    </tr>
                                <?php
                                #end foreach
                                }
                                ?>
                                </tbody>
                            </table>
                            </div>
                    <div id="settled" class="table-responsive d-none">

                                    <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                            <th>Reg Number</th>
                                                <th>Full Name</th>
                                                <th>Programme</th>
                                                <th>Intake</th>
                                                <th>Resident</th>
                                                <th>Span</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Reg Number</th>
                                                <th>Full Name</th>
                                                <th>Programme</th>
                                                <th>Intake</th>
                                                <th>Resident</th>
                                                <th>Span</th>
                                                <th>Balance</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            $in=count($approvedApplic);
                                        
                                            for($i=0; $i<$in ;$i++ ){

                                            $name=$approvedApplic[$i]['reg_number'];
                                            $data3=$db->getDetails('personal','reg_number', $name);
                                            $data4=$db->getDetails('education','reg_number', $name);
                                            $data5=$db->getDetails('accounts','reg_number', $name);
                                            $res=$data4[0]['resident'];
                                            $place="";
                                            if($res==1){
                                                $place="Yes";
                                            }
                                            else{
                                                $place="No";
                                            }
                                                ?>
                                                <tr class='plan-row'>
                                                
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $data3[0]['surname'];?>&nbsp;<?php echo $data3[0]['name'];?></td>
                                            
                                                <td><?php echo $data4[0]['program'];?></td>
                                                <td><?php echo $data4[0]['intake'];?></td>
                                                <td><?php echo $place;?></td>
                                                <td><?php echo $unapprovedApplic[$i]['plan_span'];?></td>
                                                <td>$<?php echo $data5[0]['totalfeesacrued']-$data5[0]['totalpayments'];?>-00</td>
                                            
                                            
                                                
                                            
                                                </tr>
                                                
                                            <?php    
                                            
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
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

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script src="assets/js/applicants.js?v=100"></script>
</body>

</html>
