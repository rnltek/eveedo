<?php
session_start();
if(!isset($_SESSION['admin_id'])){header("Location:pages-login.php");}
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Eveedo Admin</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-white.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar" style="position:fixed;">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.php">Eveedo Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-data">
                                <div id="profile-data-name" class="profile-data-name">
                                    <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?>
                                </div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="active">
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>                    
                    <li>
                        <a href="users.php"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
                    </li>                    
                    <li>
                        <a href="admins.php"><span class="fa fa-lock"></span> <span class="xn-text">Admins</span></a>
                    </li>                    
                    <li>
                        <a href="sections.php"><span class="fa fa-th-list"></span> <span class="xn-text">Sections</span></a>
                    </li>                    
                    <li>
                        <a href="logout.php"><span class="fa fa-power-off"></span> <span class="xn-text">Logout</span></a>
                    </li>                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            <!-- START WIDGET SPACE -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-hdd-o"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">
                                        <?php
                                        function folderSize ($dir)
                                        {
                                            $size = 0;
                                            foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
                                                $size += is_file($each) ? filesize($each) : folderSize($each);
                                            }
                                            return $size;
                                        }
                                        function human_filesize($bytes, $decimals = 2) {
                                            $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
                                            $factor = floor((strlen($bytes) - 1) / 3);
                                            return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
                                        }
                                        //$userdir = "c:/wamp64/www/user/.*";
                                        $userdir = "/var/www/html/user/*";
                                        //$max = human_filesize($user['max_bytes']);
                                        $ttl = human_filesize(folderSize($userdir));
                                        //$ttl = human_filesize($ttl);
                                        echo $ttl;
                                        ?>                            
                                    </div>
                                    <div class="widget-title">Space Used</div>
                                    <div class="widget-subtitle">By Users</div>
                                </div>      
                                <div class="widget-controls">                                
                                </div>
                            </div>                            
                            <!-- END WIDGET SPACE -->
                        </div>
                        <div class="col-md-3">
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-folder"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">
                                        <?php
                                        include("inc.config.php");
                                        $qfolders = "SELECT * FROM `folders`";
                                        $rfolders = $connect->query($qfolders);
                                        $numfolders = mysqli_num_rows($rfolders);
                                        echo number_format($numfolders);
                                        ?>
                                    </div>
                                    <div class="widget-title">Folders</div>
                                    <div class="widget-subtitle">On Eveedo</div>
                                </div>      
                                <div class="widget-controls">                                
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                        </div>
                        <div class="col-md-3">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">
                                        <?php
                                        include("inc.config.php");
                                        $qusers = "SELECT * FROM `users`";
                                        $rusers = $connect->query($qusers);
                                        $numusers = mysqli_num_rows($rusers);
                                        echo number_format($numusers);
                                        ?>
                                    </div>
                                    <div class="widget-title">Registered users</div>
                                    <div class="widget-subtitle">On Eveedo</div>
                                </div>
                                <div class="widget-controls">                                
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                        </div>
                        <div class="col-md-3">
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm" style="padding-top:25px;">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <!--
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>      
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>  
                                -->
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                        </div>
                    </div>
                    <!-- END WIDGETS -->
                    <div class="row">
                        <div class="col-md-4">
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default" style="padding-bottom:10px;height:auto;">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>User Gender</h3>
                                        <span>Count Users by Gender</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;padding-bottom: 5px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: auto;padding:15px;overeflow:auto;">
                                        <?php
                                        include ("inc.config.php");
                                        $qgender = "SELECT `gender`,COUNT(`gender`) as 'countgender' FROM `users` where `gender`>'0' GROUP BY `gender` ORDER BY `gender` ASC";
                                        $rgender = $connect->query($qgender);
                                        while ($gender = mysqli_fetch_array($rgender)){
                                        ?>
                                        <div class="col-md-12">
                                            <span style="font-size:12px;"><?php echo $gender['gender'];?></span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($gender['countgender']);?></span>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                        </div>
                        <div class="col-md-8">
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default" style="padding-bottom:10px;height:auto;">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>User Age</h3>
                                        <span>Count Users by Age</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;padding-bottom: 5px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: auto;padding:15px;overeflow:auto;">
                                        <?php
                                        include ("inc.config.php");
                                        $qage = "SELECT `dob_year` FROM `users`";
                                        $rage = $connect->query($qage);
                                        $a0_13 = 0;
                                        $a14_20 = 0;
                                        $a21_30 = 0;
                                        $a31_40 = 0;
                                        $a41_50 = 0;
                                        $a51_60 = 0;
                                        $a61_over = 0;
                                        while ($age = mysqli_fetch_array($rage)){
                                            $years = date("Y") - $age['dob_year'];
                                            if($years >= 0 && $years <= 13){$a0_13=$a0_13+1;}
                                            if($years >= 14 && $years <= 20){$a14_20=$a14_20+1;}
                                            if($years >= 21 && $years <= 30){$a21_30=$a21_30+1;}
                                            if($years >= 31 && $years <= 40){$a31_40=$a31_40+1;}
                                            if($years >= 41 && $years <= 50){$a41_50=$a41_50+1;}
                                            if($years >= 51 && $years <= 60){$a51_60=$a51_60+1;}
                                            if($years >= 61){$a61_over=$a61_over+1;}
                                            $years = 0;
                                        }
                                        ?>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">0 to 13</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a0_13);?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">14 to 20</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a14_20);?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">21 to 30</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a21_30);?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">31 to 40</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a31_40);?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">41 to 50</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a41_50);?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">51 to 60</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a51_60);?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size:12px;">Over 61</span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($a61_over);?></span>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default" style="padding-bottom:10px;height:auto;">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Users Locations</h3>
                                        <span>Count by Location</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;padding-bottom: 5px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: auto;padding:15px;overeflow:auto;">
                                        <?php
                                        include ("inc.config.php");
                                        $qlocations = "SELECT `country`,COUNT(`country`) as 'countcountry' FROM `users` GROUP BY `country` ORDER BY `country` ASC";
                                        $rlocations = $connect->query($qlocations);
                                        while ($locations = mysqli_fetch_array($rlocations)){
                                        ?>
                                        <div class="col-md-2">
                                            <span style="font-size:12px;"><img src="<?php echo 'flags/'.str_replace(" ","_",strtolower($locations['country'])).'.gif';?>" width="18" height="12"/>&nbsp;<?php echo $locations['country'];?></span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($locations['countcountry']);?></span>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default" style="padding-bottom:10px;height:auto;">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Folder Sections</h3>
                                        <span>Count Folders by Section</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;padding-bottom: 5px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: auto;padding:15px;overeflow:auto;">
                                        <?php
                                        include ("inc.config.php");
                                        $qsections = "SELECT `section`,COUNT(`section`) as 'countsection' FROM `folders` where `section`>'0' GROUP BY `section` ORDER BY `section` ASC";
                                        $rsections = $connect->query($qsections);
                                        while ($sections = mysqli_fetch_array($rsections)){
                                        ?>
                                        <div class="col-md-2">
                                            <span style="font-size:12px;"><?php echo $sections['section'];?></span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($sections['countsection']);?></span>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default" style="padding-bottom:10px;height:auto;">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Item Sections</h3>
                                        <span>Count Items by Section</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;padding-bottom: 5px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: auto;padding:15px;overeflow:auto;">
                                        <?php
                                        include ("inc.config.php");
                                        $qsections = "SELECT `section`,COUNT(`section`) as 'countsection' FROM `folder_items` where `section`>'0' GROUP BY `section` ORDER BY `section` ASC";
                                        $rsections = $connect->query($qsections);
                                        while ($sections = mysqli_fetch_array($rsections)){
                                        ?>
                                        <div class="col-md-2">
                                            <span style="font-size:12px;"><?php echo $sections['section'];?></span>
                                            <span style="font-size:12px;font-weight:bold;float:right;"><?php echo number_format($sections['countsection']);?></span>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                        </div>
                    </div>
                    <!-- START DASHBOARD CHART -->
                    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
                    <div class="block-full-width">
                    </div>                    
                    <!-- END DASHBOARD CHART -->
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue working. Press Yes to logout Administrator.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        <!--<script type="text/javascript" src="js/plugins/moment.min.js"></script>-->
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        
        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="js/settings.js"></script>-->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->         
    </body>
</html>
