 

/*Second
 * Get posted Data
 * by youngkunjez
 * date 20/09/2018
 */
 <style>
 .sidetext{
   
    
    font-family: "Roboto",serif;
    line-height:15px;
    color:#999 !important;
    font-weight: bold;
    font-size: 18pt;
    overflow: hidden
  
   
  
   
    
    
}
 </style>


   <link rel="stylesheet" href="fa/css/font-awesome.css">
    <section >
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" style="background:#fff;overflow-y:hidden !important;" >
            <!-- User Info -->
            <div class="user-info" style="border-bottom:1px solid #1269ad">
                <div class="image">
                    <img src="uploads/<?php echo $data[0]['image']; ?> " width="45" height="53" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name sidetext" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $data[0]['full_name']; ?></div>
                    <div class="email"><b><?php echo $data[0]['reg_number']; ?></b></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="fa fa-sort-desc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color:#1269ad"></i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#profile_with_icon_title"><i class="fa fa-user "></i> Profile</a></li>
                            <li role="separator" class="divider"></li>
                 

                            <li><a href="javascript:void(0);"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- #User Info -->
            <!-- Menu -->
            
            <div class="menu" >
              
                <ul class="list">
  
                <div class="header" style="background-color:#1269ad;color:white">STUDENT PORTAL</div>
                <br>
                    <li >
                        <a href="index.php" >
                            <i class="fa fa-arrows fa-2x">
                            <span class="sidetext">Dashboard</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="http://www.mutareteachers.ac.zw/">
                            <i class="fa fa-calendar  fa-2x sidetext">
                            <span class="sidetext">Registration</span></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="fa fa-folder-open  fa-2x">
                            <span class="sidetext">Payment Plan</span>
                        </a></i>
                        <ul class="ml-menu" >
                            <li>
                                <a class ="fa fa-plus sidetext text-success" onclick="Checkplan()">&nbsp;&nbsp; New Payment Plan</a>
                            </li>
                            <br>
                            <li>
                                <a class="fa fa-recycle sidetext" onclick="Checkplan2()" >&nbsp;&nbsp; Payment plan History</a>
                            </li>
                            <br>
                            <li>
                                <a class="fa fa-wrench" data-toggle="modal" data-target="#largeModal">&nbsp;&nbsp; Terms & Conditions</a>
                            </li>
                        </ul>
                    </li>
                     <hr>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-twitter text-primary">
                            <span class="sidetext">Tweeter</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-envelope text-danger">
                            <span class="text-danger sidetext">G-mail</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-youtube-play text-danger">
                            <span class="text-danger sidetext">Youtube</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-sign-out text-primary">
                            <span class="text-danger sidetext">Log Out</span></i>
                        </a>
                    </li>
                  
                   
                </ul>
            </div>
            <div class="legal"style="background:#1269ad;color:white;font-family:New-Times-Roman" >
                <div class="copyright"  >
                   MTC &copy;2018.
                </div>
            </div>
        </aside>
        <!-- #END# Left Sidebar -->
        
        
    </section>
