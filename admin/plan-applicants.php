<?php
require_once("../account/sessions.php");

if(isset($_SESSION['admin'])){
    $unapproved = " ";
    $approved = "approved";
    $settled  ="settled";
  
   
  

    $data = $dbHelper->getDetails('admin_login','username', $username);
    $unapprovedApplic = $dbHelper->getDetails('applicants','status', " ");
    $settledplans = $dbHelper->getDetails('applicants','status', $settled);
    $info = $dbHelper->getDetails('applicants','status', $approved);
    $allApplicants = $dbHelper->getAllValues('applicants');

    $defaulters = array_filter($allApplicants, function ($d){
        $nowDate = new DateTime("yesterday");
        $tomorrowDate = new DateTime("tomorrow");
        $dFst = $tomorrowDate;
        $dSec = $tomorrowDate;
        $dTrd = $tomorrowDate;
        $dFth = $tomorrowDate;

        if($d['dateFirst'] != '0000-00-00' && $d['amountFirst'] != 0 ){
            $dFst = new DateTime($d['dateFirst']);

        }
        if($d['dateSecond'] != '0000-00-00' && $d['amountSecond'] != 0 ){
            $dSec = new DateTime($d['dateSecond']);
        }
        if($d['dateThird'] != '0000-00-00' && $d['amountThird'] != 0 ){
            $dTrd = new DateTime($d['dateThird']);
        }
        if($d['dateFourth'] != '0000-00-00' && $d['amountFourth'] != 0){
            $dFth = new DateTime($d['dateFourth']);
        }
        
        if($nowDate >= $dFst || $nowDate >= $dSec  || $nowDate >= $dTrd  || $nowDate >= $dFth ){
            
            return true;
        }else {
            return false;
        }


    });

    $activeplans= array_filter($allApplicants, function($a){
        $nowDate = new DateTime("yesterday");
        $tomorrowDate = new DateTime("tomorrow");
        $dFst = $tomorrowDate;
        $dSec = $tomorrowDate;
        $dTrd = $tomorrowDate;
        $dFth = $tomorrowDate;

        if($a['dateFirst'] != '0000-00-00' && $a['amountFirst'] != 0 ){
            $dFst = new DateTime($a['dateFirst']);

        }
        if($a['dateSecond'] != '0000-00-00' && $a['amountSecond'] != 0 ){
            $dSec = new DateTime($a['dateSecond']);
        }
        if($a['dateThird'] != '0000-00-00' && $a['amountThird'] != 0 ){
            $dTrd = new DateTime($a['dateThird']);
        }
        if($a['dateFourth'] != '0000-00-00' && $a['amountFourth'] != 0){
            $dFth = new DateTime($a['dateFourth']);
        }
        
        if($nowDate >= $dFst || $nowDate >= $dSec  || $nowDate >= $dTrd  || $nowDate >= $dFth ){
            
            return false;
        }else {
            if($a['status']=="settled" || $a['status']=="")  {
            
                return false;
            }else {
                return true;
            }
        }
    });

    function testRange($DbDate){
        $fiveDaysToGo = date_modify(new DateTime("today"), '+5 day');
        $nowDate = new DateTime("today");
        return ($nowDate <= $DbDate && $DbDate <= $fiveDaysToGo );
    }

    $dueinfivedays= array_filter($activeplans, function($a){
        $yesterdayDate = new DateTime("yesterday");
        
        $dFst = $dSec = $dTrd = $dFth = $yesterdayDate;

        

        if($a['dateFirst'] != '0000-00-00' && $a['amountFirst'] != 0 ){
            $dFst = new DateTime($a['dateFirst']);

        }
        if($a['dateSecond'] != '0000-00-00' && $a['amountSecond'] != 0 ){
            $dSec = new DateTime($a['dateSecond']);
        }
        if($a['dateThird'] != '0000-00-00' && $a['amountThird'] != 0 ){
            $dTrd = new DateTime($a['dateThird']);
        }
        if($a['dateFourth'] != '0000-00-00' && $a['amountFourth'] != 0){
            $dFth = new DateTime($a['dateFourth']);
        }

        if(testRange($dFst) || testRange($dSec) || testRange($dTrd) || testRange($dFth)){
            return true;
        }

        return false;

    });
    
    $numOfFiveDaysToPay = count($dueinfivedays);


//five days 
function testRange2($DbDate){
    $fiveDaysToGo = date_modify(new DateTime("today"), '-5 day');
    $nowDate = new DateTime("today");
    $numberofDays=$nowDate->diff($DbDate);
    $nom = $numberofDays->format(' %a days');
  
    return ( $fiveDaysToGo<= $DbDate && $DbDate <=$nowDate  );
}

$dueinfivedaysago= array_filter($defaulters, function($a){
    $tomorrowDate = new DateTime("tomorrow");
    
    $dFst = $dSec = $dTrd = $dFth = $tomorrowDate;

    

    if($a['dateFirst'] != '0000-00-00' && $a['amountFirst'] != 0 ){
        $dFst = new DateTime($a['dateFirst']);

    }
    if($a['dateSecond'] != '0000-00-00' && $a['amountSecond'] != 0 ){
        $dSec = new DateTime($a['dateSecond']);
    }
    if($a['dateThird'] != '0000-00-00' && $a['amountThird'] != 0 ){
        $dTrd = new DateTime($a['dateThird']);
    }
    if($a['dateFourth'] != '0000-00-00' && $a['amountFourth'] != 0){
        $dFth = new DateTime($a['dateFourth']);
    }

    if(testRange2($dFst) || testRange2($dSec) || testRange2($dTrd) || testRange2($dFth)){
        return true;
    }

    return false;

});

$numOfFiveDaysago = count($dueinfivedaysago);
}

?>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MTC Plan Applicants</title>
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

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
     <!---Link to font awesome-->
     <link rel="stylesheet" href="../fa/css/font-awesome.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/main.css">

    <!--includes -->
    <?php
        include('lib/includes/sidenav.php');
     ?>
</head>

<body class="theme-red">


    <!-- Plans Js Variable -->
    <script>
        var all_plans = Number(<?php echo count($allApplicants); ?>);
        var active_plans = Number(<?php echo count($activeplans); ?>);
        var settled_plans = Number(<?php echo count($settledplans); ?>);
        var defaulted_plans = Number(<?php echo count($defaulters); ?>);
    </script>
    <!-- #END of Plans Js Variable -->
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
                <a class=" navbar-brand center"  href="#"><img src="../images/download.png"  height="44px" style="margin-top:-20px"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-bell" data-toggle="tooltip" role="button"  data-placement="left" title="click to view submitted applications"></i>
                            <span class="label-count "data-toggle="tooltip" role="button"  data-placement="left" title="click to view submitted applications"><?php echo count($unapprovedApplic);?></span>
                        </a>
                        <ul class="dropdown-menu menu1">
                            <li class="header">APPLICANTS NOTIFICATIONS</li>
                            <li class="body">
                            <li >
                            <a href="#top" onclick="switchTable('unapproved')" data-target="#navbar-collapse" ><i class="fa fa-flag fa-2x  text-primary"></i>&nbsp;&nbsp;<?php echo count($unapprovedApplic);?>&nbsp;&nbsp;Applicant/s are waiting..</li>  </a>
                            <li role="separator" class="divider"></li>
                            <li ><a href="#graph"><i class="fa fa-bar-chart fa-2x text-success"></i>&nbsp;&nbsp;Important Analysis graph</li></a>
                            <li role="separator" class="divider"></li>
                            <li style="background:#1269ad;color:white" ><a href="javascript:void(0);"></li></a>
                            
                        </ul>
                    </li>
                              

                    <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" >
                    <i class="fa fa-bell" data-toggle="tooltip" role="button"  data-placement="left" title="click to view due & overdue plans"></i>
                      <span class="label-count" data-toggle="tooltip" role="button"  data-placement="left" title="click to view due & overdue plans" style="background:red"><?php echo $numOfFiveDaysToPay + $numOfFiveDaysago;?></span>
                        </a>
                      
                        <ul class="dropdown-menu">
                            <li class="header">ACTIVITY NOTIFICATIONS</li>
                            <li class="body">
                            <li >
                           
                            <a href="#top" onclick="switchTable('due')" data-target="#navbar-collapse" ><i class="fa fa-flag fa-2x  text-primary"></i>&nbsp;&nbsp;<?php echo $numOfFiveDaysToPay;?>&nbsp;&nbsp;Plan/s due within 5 days</li>  </a>
                            <li role="separator" class="divider"></li>
                            <li >
                            <a href="#top" onclick="switchTable('overdue')" data-target="#navbar-collapse" ><i class="fa fa-flag fa-2x   text-danger"></i>&nbsp;&nbsp;<?php echo $numOfFiveDaysago;?> Plan/s overdue by five days</li> </a>
                            <li role="separator" class="divider"></li>
                            <li ><a href="#graph"><i class="fa fa-bar-chart fa-2x text-success"></i>&nbsp;&nbsp;Important Analysis graph</li></a>
                            <li role="separator" class="divider"></li>
                            <li style="background:#1269ad;color:white" ><a href="javascript:void(0);"></li></a>
                            
                        </ul>
                    </li>
                   
                    <!-- #END# Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-graduation-cap" data-toggle="tooltip" role="button"  data-placement="left" title="click to view account options"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">MY ACCOUNT</li>
                            <li class="body">

                            <li><a href="javascript:void(0);"><i class="fa fa-graduation-cap fa-2x text-success"></i>&nbsp;&nbsp;My Profile</li></a>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-envelope fa-2x" style="color:#1269ad"></i>&nbsp;&nbsp;MTC-Mail</li></a>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"  class="signout-btn"><i class=" fa fa-sign-out fa-2x text-primary"></i>&nbsp;&nbsp;Sign Out</li></a>
                            
              
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" data-close="true"><i class="fa fa-diamond fa-2x" style="color:gold"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
   

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Payment Plan Applicants
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="top">
                        <div class="header">
                            <h2 id="applicants-title">
                                unapproved plans
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons" style="color:white">more_vert</i>
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
                                            <tr class='active-row'>
                                            
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $data3[0]['surname'];?>&nbsp;<?php echo $data3[0]['name'];?></td>
                                           
                                            <td><?php echo $data4[0]['program'];?></td>
                                            <td><?php echo $data4[0]['intake'];?></td>
                                            <td><?php echo $place;?></td>
                                            <td><?php echo $info[$i]['plan_span'];?></td>
                                            
                                         
                                          
                                            
                                          
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
                                                <th>span</th>
                                                
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Reg Number</th>
                                                <th>Full Name</th>
                                                <th>Programme</th>
                                                <th>Intake</th>
                                                <th>span</th>
                                               
                                                <th>status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                foreach ($activeplans as $active => $value)
                                {
                                    $reg = $value['reg_number'];
                                    $personal = $dbHelper->getDetails('personal','reg_number', $reg);
                                    $userInfo = $dbHelper->getDetails('applicants','reg_number', $reg);
                                    $eduDetails = $dbHelper->getDetails('education','reg_number', $reg);
                                    $accountDetails = $dbHelper->getDetails('accounts','reg_number', $reg);
                                    $status=$userInfo[0]['status'] ;
                                    $statusValue=" ";
                                    if($status =="approved"){

                                        $statusValue = "0";
                                    }
                                    else{
                                        $statusValue=$status;
                                    }    
                                    
                                    ?>

                                    <tr class='active-row'>
                                                
                                        <td><?php echo $reg;?></td>
                                        <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                    
                                        <td><?php echo $eduDetails[0]['program'];?></td>
                                        <td><?php echo $eduDetails[0]['intake'];?></td>
                                        <td><?php echo $value['plan_span'];?></td>
                                        <?php
                                        if($statusValue >=0 &&  $statusValue < 10){
                                            ?>
                                            <td style="background:red;color:white"><?php echo $statusValue;?> %</td>
                                            <?php
                                        }
                                        
                                        elseif($statusValue >=10 &&  $statusValue < 50){
                                            ?>
                                             <td style="background:#1269ad;color:white"><?php echo $statusValue;?> %</td>
                                             <?php
                                        }
                                        else{
                                            ?>
                                             <td style="background:green;color:white"><?php echo $statusValue;?> %</td>
                                             <?php
                                        }
                                       ?>
                                    
                                       
                                    </tr>
                                <?php
                                #end foreach
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
                                           $status=$unapprovedApplic[0]['status'];
                                           $stas="";
                                             
                                           if($res==1){
                                               $place="Yes";
                                           }
                                           else{
                                               $place="No";
                                           }
                                            ?>
                                            <tr class='plan-rows'>
                                            
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $data3[0]['surname'];?>&nbsp;
                                                <?php echo $data3[0]['name'];?></td>
                                           
                                            <td><?php echo $data4[0]['program'];?></td>
                                            <td><?php echo $data4[0]['intake'];?></td>
                                            <td><?php echo $place;?></td>
                                            <td><?php echo $unapprovedApplic[0]['plan_span'];?></td>
                                            
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
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>Programme</th>
                                        <th>Intake</th>
                                        <th>Span</th>
                                        <th>status</th>
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
                                    $status=$userInfo[0]['status'] ;
                                    $statusValue=" ";
                                    if($status =="approved"){

                                        $statusValue = "0";
                                    }
                                    else{
                                        $statusValue=$status;
                                    }    
                                    
                                    ?>
                                    
                                    <tr class='def-row'>
                                                
                                        <td><?php echo $reg;?></td>
                                        <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                    
                                        <td><?php echo $eduDetails[0]['program'];?></td>
                                        <td><?php echo $eduDetails[0]['intake'];?></td>
                                        <td><?php echo $value['plan_span'];?></td>
                                       
                                        <?php
                                        if($statusValue >=0 &&  $statusValue < 10){
                                            ?>
                                            <td style="background:red;color:white"><?php echo $statusValue;?> %</td>
                                            <?php
                                        }
                                        
                                        elseif($statusValue >10 &&  $statusValue < 50){
                                            ?>
                                             <td style="background:#1269ad;color:white"><?php echo $statusValue;?> %</td>
                                             <?php
                                        }
                                        else{
                                            ?>
                                             <td style="background:green;color:white"><?php echo $statusValue;?> %</td>
                                             <?php
                                        }
                                       ?>
                                    </tr>
                                <?php
                                #end foreach
                                }
                                ?>
                                </tbody>
                               
                            </table>
                            <button id="sendMsg2" type="button" data-color="blue"  class="btn btn-blue waves-effect m-r-20" data-toggle="modal" data-target="#largeModal2">SEND MESSAGES</button>
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
                                                <th>status</th>
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
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            $in=count($settledplans);
                                        
                                            for($i=0; $i<$in ;$i++ ){

                                            $name=$settledplans[$i]['reg_number'];
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
                                                <td><?php echo $settledplans[$i]['plan_span'];?></td>
                                                <td class="fa fa-check text-success"></td>
  
                                                </tr>
                                                
                                            <?php    
                                            
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    </div>
                                        <!-- 5days to become due -->
                                    <div id="due" class="table-responsive d-none">
                                        <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                <th>Reg Number</th>
                                                    <th>Full Name</th>
                                                    <th>Programme</th>
                                                    <th>Intake</th>
                                                    
                                                    <th>Span</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>Reg Number</th>
                                                    <th>Full Name</th>
                                                    <th>Programme</th>
                                                    <th>Intake</th>
                                                    
                                                    <th>Span</th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php

                                            foreach ( $dueinfivedays as $due => $value)
                                            {
                                                $reg = $value['reg_number'];
                                                $personal = $dbHelper->getDetails('personal','reg_number', $reg);
                                                $userInfo = $dbHelper->getDetails('applicants','reg_number', $reg);
                                                $eduDetails = $dbHelper->getDetails('education','reg_number', $reg);
                                                $accountDetails = $dbHelper->getDetails('accounts','reg_number', $reg);
                                                ?>

                                                <tr class='active-row'>
                                                            
                                                    <td><?php echo $reg;?></td>
                                                    <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                                
                                                    <td><?php echo $eduDetails[0]['program'];?></td>
                                                    <td><?php echo $eduDetails[0]['intake'];?></td>
                                                    <td><?php echo $value['plan_span'];?></td>
                                                   
                                                </tr>
                                            <?php
                                            #end foreach
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <button id="sendMsg" type="button" data-color="blue"  class="btn btn-blue waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">SEND MESSAGES</button>
                                    </div>

                                    <div id="overdue" class="table-responsive d-none">
                                        <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                <th>Reg Number</th>
                                                    <th>Full Name</th>
                                                    <th>Programme</th>
                                                    <th>Intake</th>
                                                    
                                                    <th>Span</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>Reg Number</th>
                                                    <th>Full Name</th>
                                                    <th>Programme</th>
                                                    <th>Intake</th>
                                                    
                                                    <th>Span</th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php

                                            foreach ( $dueinfivedaysago as $due => $value)
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
                                                   
                                                </tr>
                                            <?php
                                            #end foreach
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <button id="sendMsg3" type="button" data-color="blue"  class="btn btn-blue waves-effect m-r-20" data-toggle="modal" data-target="#largeModal3">SEND MESSAGES</button>
                                    </div>
                                </div>
                        </div>
                        <div id="graph" class="card">
                            <div class="header">
                                <h4>Payment Plan Analysis Chart</h4>
                            </div>
                            <div class="body">
                                <canvas id="bar_chart" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                       <center> <div class="modal-header">
                        
                       <a class=" navbar-brand center"  href="#"><img src="../images/download.png"  height="44px" style="margin-top:-20px"></a>
                        <h4 class="modal-title" id="defaultModalLabel">MUTARE TEACHERS COLLEGE</h4>
                       
                        </div>
                        </center>
                        <div class="modal-body">
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>REG NUMBER</th>
                                        <th>FULL NAME</th>
                                        <th>MOBILE NUMBER</th>
                                        <th>SENDING STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                   
                                foreach ( $dueinfivedays as $value)
                                            {
                                                $reg = $value['reg_number'];
                                                $personal = $dbHelper->getDetails('personal','reg_number', $reg);
                                              
                                             
                                                ?>

                                                <tr>
                                                            
                                                    <td><?php echo $reg;?></td>
                                                    <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                                    <td><?php echo $personal[0]['phone'];?> </td>
                                                    <td>
                                                   
                                                    <div class="progress">
                                                    <div  id="_<?php echo $reg; ?>" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div> 
                                                    
                                                    </td>
                                                        </tr>
                                                
                                            <?php
                                            #end foreach
                                            }
                                            ?>
                                    
                                    
                                </tbody>
                            </table>
                           
                        </div>
                        </div>
                        <div class="modal-footer">
                          
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hide to Background</button>
                        </div>
                    </div>
                </div>
            </div>
            

             <div class="modal fade" id="largeModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                       <center> <div class="modal-header">
                        
                       <a class=" navbar-brand center"  href="#"><img src="../images/download.png"  height="44px" style="margin-top:-20px"></a>
                        <h4 class="modal-title" id="defaultModalLabel">MUTARE TEACHERS COLLEGE</h4>
                       
                        </div>
                        </center>
                        <div class="modal-body">
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>REG NUMBER</th>
                                        <th>FULL NAME</th>
                                        <th>MOBILE NUMBER</th>
                                        <th>SENDING STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                   
                                foreach ( $defaulters as $value)
                                            {
                                                $reg = $value['reg_number'];
                                                $personal = $dbHelper->getDetails('personal','reg_number', $reg);
                                              
                                             
                                                ?>

                                                <tr class='def-row'>
                                                            
                                                    <td><?php echo $reg;?></td>
                                                    <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                                    <td><?php echo $personal[0]['phone'];?> </td>
                                                    <td>
                                                   
                                                    <div class="progress">
                                                    <div  id="_<?php echo $reg; ?>" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div> 
                                                    
                                                    </td>
                                                        </tr>
                                                
                                            <?php
                                            #end foreach
                                            }
                                            ?>
                                    
                                    
                                </tbody>
                            </table>
                           
                        </div>
                        </div>
                        <div class="modal-footer">
              
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hide to Background</button>
                        </div>
                    </div>
                </div>
            </div>




             <div class="modal fade" id="largeModal3" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                       <center> <div class="modal-header">
                        
                       <a class=" navbar-brand center"  href="#"><img src="../images/download.png"  height="44px" style="margin-top:-20px"></a>
                        <h4 class="modal-title" id="defaultModalLabel">MUTARE TEACHERS COLLEGE</h4>
                       
                        </div>
                        </center>
                        <div class="modal-body">
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>REG NUMBER</th>
                                        <th>FULL NAME</th>
                                        <th>MOBILE NUMBER</th>
                                        <th>SENDING STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                   
                                foreach ( $dueinfivedaysago as $value)
                                            {
                                                $reg = $value['reg_number'];
                                                $personal = $dbHelper->getDetails('personal','reg_number', $reg);
                                              
                                             
                                                ?>

                                                <tr class='def-row'>
                                                            
                                                    <td><?php echo $reg;?></td>
                                                    <td><?php echo $personal[0]['surname'];?> <?php echo $personal[0]['name'];?></td>
                                                    <td><?php echo $personal[0]['phone'];?> </td>
                                                    <td>
                                                   
                                                    <div class="progress">
                                                    <div  id="_<?php echo $reg; ?>" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div> 
                                                    
                                                    </td>
                                                        </tr>
                                                
                                            <?php
                                            #end foreach
                                            }
                                            ?>
                                    
                                    
                                </tbody>
                            </table>
                           
                        </div>
                        </div>
                        <div class="modal-footer">
              
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hide to Background</button>
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
    <script src="../js/pages/ui/tooltips-popovers.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    
    <script src="../js/pages/charts/chartjs.js"></script>
    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script src="assets/js/applicants.js"></script>

    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;
                var num = (hash === '#graph')?  $('#top').height()+100 : 14;

                $('html, body').animate({
                    scrollTop:num
                }, 800, function(){
                });
                } // End if
            });
       
            $("#sendMsg").on('click', (event)=>{
                var dueinfive = <?php echo json_encode($dueinfivedays); ?>;
                console.log(dueinfive);
                var dueVals = Object.values(dueinfive);
                dueVals.forEach(val => {
                    let rant = Math.random();
                    var reg  = val.reg_number;
                    var type = "active";
                    setTimeout(() => {
                        $.post("../php/action/send_text2.php", {reg, type});
                        let elem = $(`#_${reg}`);
                        $(elem).removeClass('active progress-bar-striped');
                    }, rant *10* 1000);
                });

                
            })
       

         $("#sendMsg2").on('click', (event)=>{
                var defaulty = <?php echo json_encode($defaulters); ?>;
                console.log(defaulty);
                var defVals = Object.values(defaulty);
                defVals.forEach(val => {
                    let rant = Math.random();
                    var reg  = val.reg_number;
                    var type = "default";
                    setTimeout(() => {
                        $.post("../php/action/send_text2.php", {reg, type});
                        let elem = $(`#_${reg}`);
                        $(elem).removeClass('active progress-bar-striped');
                    }, rant *10* 1000);
                });

                
            })
            

             $("#sendMsg3").on('click', (event)=>{
                var fivedays = <?php echo json_encode($dueinfivedaysago); ?>;
                console.log(fivedays);
                var overduefVals = Object.values(fivedays);
                overduefVals.forEach(val => {
                    let rant = Math.random();
                    var reg  = val.reg_number;
                    var type = "default";
                    setTimeout(() => {
                        $.post("../php/action/send_text2.php", {reg, type});
                        let elem = $(`#_${reg}`);
                        $(elem).removeClass('active progress-bar-striped');
                    }, rant *10* 1000);
                });

             }) 

            });
            
       


       
    </script>
</body>

</html>
