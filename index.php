

<?php

session_start();
require_once("php/hawk/DBHelper.php");

if(!isset($_SESSION['student'])){
    header("refresh:0 url=account/login.php");
    exit(0);
}
    $db=new DBHelper();
    $username=$_SESSION['student'];

    /**
     * Variables
     */

    $data = $db->getDetails('students_login','reg_number', $username);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MTC | Payment Plan - Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="download.png" type="image/x-icon">

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
      <?php
        include('./ui/terms_and_conditions.html');
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
    <?php
           
           $plan=$db->getDetails('applicants','reg_number',$username);
           if(sizeof($plan)>0){
           $stats=" ";
           $status=$plan[0]['status'];
           if($status=="approved" || (1<=$status && $status<=99.9)){
               ?>
            <script>
            var all_plans = 1;
            
        </script>

           
           <div id ="already" class="alert alert-info alert-dismissible" role="alert" style="margin-top:-5%">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a href="my_plan.php" style="color:#fff"> You have an active plan, Click to View Details</a>
            </div>
          
           <?php
            }
            elseif($status==$stats){
                ?>
                <script>
                var all_plans = 1;
                
            </script>
    
               
               <div id ="already" class="alert alert-info alert-dismissible" role="alert" style="margin-top:-5%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <a href="my_plan.php" style="color:#fff"> You have have a pending application waiting for approval. Click to View Details</a>
                </div>
              
               <?php 
            }
            else{
                ?>
                <script>
            var all_plans = 0;
            
        </script>
                
                <div id ="already" class="alert alert-info alert-dismissible" role="alert" style="margin-top:-5%">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a href="apply.php" style="color:#fff"> Check out the new Feature "MTC payment plan",Try It Now</a>
            </div>
                <?php
            }
            
             
           
        }
       
            else{
                ?>
                <script>
            var all_plans = 0;
            
        </script>
                
                <div id ="already" class="alert alert-info alert-dismissible" role="alert" style="margin-top:-5%">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a href="apply.php" style="color:#fff"> Check out the new Feature "MTC payment plan",Try It Now</a>
            </div>
                <?php
            }
            
             
           ?>
           <style>
           .d-none{
               display:none;
           }
           </style>
            <div id="history" class="alert alert-warning alert-dismissible d-none" role="alert" style="margin-top:-5%">
            
          You can not use this link before you create plan history.&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#largeModal" ></a>
     </div>
           <div id="validate" class="alert alert-warning alert-dismissible d-none" role="alert" style="margin-top:-5%">
            
                   Sorry !!! ,You can not apply Now ,You have a pending Plan.&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#largeModal" > <u><i>Read Terms & Conditions of Plans</i></u></a>
            </div>
        
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
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='http://www.mutareteachers.ac.zw/';">
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
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="Checkplan()">
             
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
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='http://www.mutareteachers.ac.zw/';">
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
                    <div class="info-box hover-zoom-effect hover-expand-effect pan" onclick="window.location='http://www.mutareteachers.ac.zw/';">
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
           
            
        
            <style>
                                .dim{
                                    width:100px !important;
                                 
                                   font-size:11pt;
                                    color:#999 !important;
                                }
                                </style>
         
            <hr>
            <!-- new  change-->
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
                                         <img src="images/download.png" width="25" height="25" alt=""> MTC NOTES
                                    </a>
                                </li>
                                
                            </ul>

                            
                                   
                                    
                            <!-- Tab panes -->
                            
                            <div class="tab-content" style="margin-left:2%">
                                <div role="tabpanel" class="tab-pane fade in active" id="messages_with_icon_title">
                                    <div class="bs-example" data-example-id="media-alignment">
                    
                                            <div class="media-body">
                                            <div class="media">
                                            <?php
                                                    $messagesInfo=$db->getLimOrderedData('notices','reg_number',$username,'DESC','date','10');
                                                    
                                                    
                                                    $countmessages=count($messagesInfo);
                                                    for($i=0;$i<$countmessages;$i++){
                                             ?>
                                <div class="media-left">
                                    <a href="#">
                                       <span class='fa fa-inbox fa-2x'></span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading dim"><?php echo $messagesInfo[$i]['post'];?></h4> 
                                    <p><?php echo $messagesInfo[$i]['message']; ?> </p>
                                </div>
                              
                                <div class="media-right ">
                                    <span class="media-object dim">
                                   <center><i class= "fa fa-trash text-primary"></i></center>
                                   
                                        <?php echo $messagesInfo[$i]['date']; ?>

                                    </span>
                                    
                            
                                </div>

                                      <hr >      
                                                
                                                <?php
                                                }
                                                ?>          
                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                <?php
                                                    $reg="public";
                                                    $publicmessagesInfo=$db->getDetails('notices','reg_number',$reg);
                                                    $publiccountmessages=count($publicmessagesInfo);
                                                   
                                                    for($i=0;$i<$publiccountmessages;$i++){
                                             ?>
                                <div class="media-left">
                                    <a href="#">
                                    <img class="media-object" src="images/download.png" width="25" height="25">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading dim"><?php echo $publicmessagesInfo[$i]['post'];?></h4> 
                                    <p> <?php

                                                        echo $publicmessagesInfo[$i]['message'];
                                                ?>
                                                </p>
                                </div>
                             
                               
                                <div class="media-right ">
                                    <span class="media-object dim">
                                   <center><i class= "fa fa-trash text-primary "></i></center>
                                    
                                    <br>
                                    
                                        <?php echo $publicmessagesInfo[$i]['date']; ?>

                                    </span>
                                    
                                    
                                </div>
                            </div>
                                      <hr>      
                                                
                                                        <?php
                                                    }
                                                    ?> 

                                  
                                </div>

                              
                            </div>
                           
                        </div>
                     
                    </div>
                    
                </div>
              
            </div>
           

            
















            
    </section>
                            <!-- Tab panes -->
                            
               
      

    <?php
        include('./ui/scripts.php');
     ?>
</body>

</html>
<script>
    function Checkplan(){
      
        if(all_plans===1){
            $('#already').addClass('d-none');
            $('#validate').show('slow');
            setTimeout(()=>{
                $('#validate').hide('slow');
                $('#already').removeClass('d-none')
             },4000) 
        }
        else{
            window.location= 'apply.php';
        }
      
    }

     function Checkplan2(){
      
      if(all_plans===0){
          $('#already').addClass('d-none');
          $('#history').show('slow');
          setTimeout(()=>{
              $('#history').hide('slow');
              $('#already').removeClass('d-none')
           },4000) 
      }
      else{
          window.location= 'my_plan.php';
      }
    
  }



</script>
 <script src="js/pages/cards/basic.js"></script>