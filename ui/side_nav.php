 

/*Second
 * Get posted Data
 * by youngkunjez
 * date 20/09/2018
 */


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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $data[0]['full_name']; ?></div>
                    <div class="email"><b><?php echo $data[0]['reg_number']; ?></b></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="fa fa-sort-desc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color:#1269ad"></i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#profile_with_icon_title"><i class="fa fa-user"></i> Profile</a></li>
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
                    <li >
                        <a href="index.php">
                            <i class="fa fa-dashboard text-primary">
                            <span>Dashboard</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-folder-open">
                            <span>Registration</span></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="fa fa-calendar text-primary">
                            <span>Payment Plan</span>
                        </a></i>
                        <ul class="ml-menu">
                            <li class="#">
                                <a class ="fa fa-plus text-success" href="./apply.php">&nbsp;&nbsp; New Payment Plan</a>
                            </li>
                            <br>
                            <li>
                                <a class="fa fa-recycle"href="pages/tables/jquery-datatable.html">&nbsp;&nbsp; Payment plan History</a>
                            </li>
                            <br>
                            <li>
                                <a class="fa fa-wrench" href="pages/tables/editable-table.html">&nbsp;&nbsp; Terms & Conditions</a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-graduation-cap">
                            <span>My results</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-bars">
                            <span>Fees Statement</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-cubes">
                            <span>Fees Structure</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-book">
                            <span>E-Resources</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-twitter text-primary">
                            <span>Tweeter</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-envelope text-danger">
                            <span class="text-danger">G-mail</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-youtube-play text-danger">
                            <span class="text-danger">Youtube</span></i>
                        </a>
                    </li>
                    <li >
                        <a href="index.php">
                            <i class="fa fa-power-off text-danger">
                            <span class="text-danger">Log Out</span></i>
                        </a>
                    </li>
                  
                   
                </ul>
            </div>
            
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
