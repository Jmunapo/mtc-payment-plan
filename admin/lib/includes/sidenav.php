<section>
        <!-- Left Sidebar -->
        <style>
        .sidebar{
            background:#ffffff;
        }
        </style>
        <aside id="leftsidebar" class="sidebar" >
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                <img src="../uploads/<?php echo $data[0]['image']; ?> " width="45" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name sidetext" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data[0]['full_name'] ;?></div>
                    <div class="email"><?php echo $data[0]['post'] ;?></div>
                  
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            
            <div class="menu ">
                <ul class="list">
                    <li class="header" style="background-color:#1269ad;color:white">MAIN NAVIGATION</li>
                    <br>
                    <li class="#">
                        <a href="index.php">
                            <i class="fa fa-arrows fa-2x">
                            <span class="sidetext">Main Dashboard</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="http://www.mutareteachers.ac.zw/">
                            <i class="fa fa-database fa-2x">
                            <span class="sidetext">All Students</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="plan-applicants.php">
                            <i class="fa fa-folder-open fa-2x">
                            <span class="sidetext">Payment Plans</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="http://www.mutareteachers.ac.zw/">
                            <i class="fa fa-cubes fa-2x">
                            <span class="sidetext">Registered Students</span>
                        </a></i>
                 
                    </li>
                    
                    <hr>
                    <li class="#">
                        <a href="http://www.mutareteachers.ac.zw/">
                            <i class="fa fa-envelope" style="color:#1269ad">
                            <span class="sidetext"  style="color:#1269ad">MTC Mail</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="#top">
                            <i class="fa fa-graduation-cap">
                            <span class="sidetext">My Profile</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="tweeter.php">
                            <i class=" fa fa-twitter text-primary">
                            <span class="sidetext">Tweeter</span>
                        </a></i>
                        
                    </li>
                    <li class="#">
                        <a href="signout.php">
                            <i class=" fa fa-sign-out text-danger">
                            <span class="sidetext">Sign Out</span>
                        </a></i>
                        
                    </li>
                  
                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal"style="background:#1269ad;color:white;font-family:New-Times-Roman" >
                <div class="copyright"  >
                   MTC &copy;2018.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
      
        <!-- #END# Right Sidebar -->
    </section>