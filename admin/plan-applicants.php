<?php
require_once("../account/sessions.php");

if(isset($_SESSION['admin'])){
    $unapproved = " ";
    $approved = "approved";

    $data = $dbHelper->getDetails('admin_login','username', $username);
    $unapprovedApplic = $dbHelper->getDetails('applicants','status', " ");
    $info = $dbHelper->getDetails('applicants','status', $approved);

    $allApplicants = $dbHelper->getAllValues('applicants');

    $defaulters = array_filter($unapprovedApplic, function ($d){
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
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?php echo count($unapprovedApplic);?></span>
                        </a>
                                            </li>
                   
                    <!-- #END# Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-graduation-cap fa-2x"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">MY ACCOUNT</li>
                            <li class="body">

                            <li><a href="javascript:void(0);"><i class="fa fa-graduation-cap fa-2x text-success"></i>&nbsp;&nbsp;My Profile</li></a>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-envelope fa-2x" style="color:#1269ad"></i>&nbsp;&nbsp;MTC-Mail</li></a>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-sign-out fa-2x text-primary"></i>&nbsp;&nbsp;Sign Out</li></a>
                            
              
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
                    <li class="#">
                        <a href="index.php">
                            <i class="fa fa-home">
                            <span>Home</span>
                        </a></i>
                    </li>
                    <li class="active" >
                        <a href="javascript:void(0);" class="menu-toggle" >
                            <i class="fa fa-folder-open">&nbsp;&nbsp;&nbsp;PAYMENT PLANS</i>
                        </a>
                        <ul class="ml-menu" >
                            <li class="#">
                            <a onclick="switchTable('unapproved')" data-target="#navbar-collapse"  class="navbar-toggle fa fa-exclamation-triangle text-warning removehove" href="javascript:;">&nbsp;&nbsp;&nbsp;Unapproved Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('approved')" data-target="#navbar-collapse"  class="navbar-toggle fa fa-check text-success" href="javascript:;"> &nbsp;&nbsp;&nbsp;Approved Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('defaulters')" data-target="#navbar-collapse"  class="navbar-toggle fa fa-close text-danger " href="javascript:;"> &nbsp;&nbsp;&nbsp;Defaulted Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('settled')" data-target="#navbar-collapse"  class="navbar-toggle fa fa-check-square" href="javascript:;"> &nbsp;&nbsp;&nbsp;Settled Plans</a>
                            </li>
                            <li>
                            <a onclick="switchTable('active')" data-target="#navbar-collapse"  class="navbar-toggle fa fa-refresh" href="javascript:;"> &nbsp;&nbsp;&nbsp;Active</a>
                            </li>
                            <li>
                            <a onclick="switchTable('all')" data-target="#navbar-collapse"  class="navbar-toggle fa fa-bars" href="javascript:;"> &nbsp;&nbsp;&nbsp;All Plans</a>
                            </li>
                        </ul>
                    
                    </li>
                    <li class="#">
                        <a href="all.php">
                            <i class="fa fa-database">
                            <span>All Students</span>
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
                                    
                                    <button type="button" id="notify" class="d-none btn bg-teal btn-lg waves-effect m-r-10 changcolor ">Notify All Defaulters</button>
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
                                        <li><a onclick="switchTable('active')" href="javascript:;">Active Plans</a></li>
                                       
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
                                        $unapp_applicants = $dbHelper->getDetails('applicants','status', $unapproved);
                                        foreach($unapp_applicants as $u_applic)
                                        {
                                    ?>
                                        



                                    <?php    
                                        }
                                    ?>
                                        <?php
                                        $num=count($unapprovedApplic);
                                       
                                        for($i=0; $i<$num ;$i++ ){

                                           $name=$unapprovedApplic[$i]['reg_number'];
                                           $data3=$dbHelper->getDetails('personal','reg_number', $name);
                                           $data4=$dbHelper->getDetails('education','reg_number', $name);
                                           $data5=$dbHelper->getDetails('accounts','reg_number', $name);
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
                                        $in=count($info);
                                       
                                        for($i=0; $i<$in ;$i++ ){

                                           $name=$info[$i]['reg_number'];
                                           $data3=$dbHelper->getDetails('personal','reg_number', $name);
                                           $data4=$dbHelper->getDetails('education','reg_number', $name);
                                           $data5=$dbHelper->getDetails('accounts','reg_number', $name);
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
                                            <td><?php echo $info[$i]['plan_span'];?></td>
                                            <td>$<?php echo $data5[0]['totalfeesacrued']-$data5[0]['totalpayments'];?>-00</td>
                                         
                                          
                                            
                                          
                                            </tr>
                                            
                                        <?php    
                                        
                                    }
                                      ?>

                                    </tbody>
                                </table>
                            </div>
                            <div id="active" class="table-responsive d-none">

                                    <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                            <th>Reg Number</th>
                                                <th>Full Name</th>
                                                <th>Programme</th>
                                                <th>Intake</th>
                                                <th>Resident</th>
                                                <th>Span</th>
                                                <th>Plan Balance</th>
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
                                                <th>Plan Balance</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            $in=count($info);
                                        
                                            for($i=0; $i<$in ;$i++ ){

                                            $name=$info[$i]['reg_number'];
                                            $data3=$dbHelper->getDetails('personal','reg_number', $name);
                                            $data4=$dbHelper->getDetails('education','reg_number', $name);
                                            $data5=$dbHelper->getDetails('accounts','reg_number', $name);
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
                                                <td><?php echo $info[$i]['plan_span'];?></td>
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
                                           $data3=$dbHelper->getDetails('personal','reg_number', $name);
                                           $unapprovedApplic=$dbHelper->getDetails('applicants','reg_number', $name);
                                           $data4=$dbHelper->getDetails('education','reg_number', $name);
                                           $data5=$dbHelper->getDetails('accounts','reg_number', $name);
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
                                    $personal = $dbHelper->getDetails('personal','reg_number', $reg);
                                    $userInfo = $dbHelper->getDetails('applicants','reg_number', $reg);
                                    $eduDetails = $dbHelper->getDetails('education','reg_number', $reg);
                                    $accountDetails = $dbHelper->getDetails('accounts','reg_number', $reg);
                                    ?>

                                    <tr class='def-row'>
                                                
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
                                            $in=count($info);
                                        
                                            for($i=0; $i<$in ;$i++ ){

                                            $name=$info[$i]['reg_number'];
                                            $data3=$dbHelper->getDetails('personal','reg_number', $name);
                                            $data4=$dbHelper->getDetails('education','reg_number', $name);
                                            $data5=$dbHelper->getDetails('accounts','reg_number', $name);
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
                                                <td><?php echo $info[$i]['plan_span'];?></td>
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
    <script src="assets/js/applicants.js"></script>
</body>

</html>
