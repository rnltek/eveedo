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
                    <li>
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>                    
                    <li>
                        <a href="users.php"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
                    </li>                    
                    <li class="active">
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
                    <li>Dashboard</li>
                    <li class="active">Admins</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START WIDGET SPACE -->
                            <div class="widget widget-default widget-item-icon" style="padding:25px;">
                                <p style="font-size:14px;margin-bottom:25px;">
                                    Use this system to add,edit, and delete administrators.
                                    <a style="float:right;" href="add.admin.php" class="btn btn-default">Add Administrator</a>
                                </p>
                                <table width="100%" class="table-striped" style="font-size:14px;">
                                    <tr>
                                        <td style="font-weight:bold;padding:4px;" align="left">
                                        Last Name
                                        </td>
                                        <td style="font-weight:bold;padding:4px;" align="left">
                                        First Name
                                        </td>
                                        <td style="font-weight:bold;padding:4px;" align="left">
                                        Username
                                        </td>
                                        <td align="center"></td>
                                    </tr>
                                    <?php
                                    include("inc.config.php");
                                    $qadmins = "SELECT * FROM `admins` ORDER BY `last_name` ASC";
                                    $radmins = $connect->query($qadmins);
                                    while ($admin = mysqli_fetch_array($radmins)){
                                    ?>
                                    <tr>
                                        <td style="padding:4px;" align="left">
                                        <?php echo $admin['last_name'];?>
                                        </td>
                                        <td style="padding:4px;" align="left">
                                        <?php echo $admin['first_name'];?>
                                        </td>
                                        <td style="padding:4px;" align="left">
                                        <?php echo $admin['username'];?>
                                        </td>
                                        <td style="padding:4px;" align="right">
                                        <a href="edit.admin.php?i=<?php echo $admin['admin_id'];?>" class="btn btn-xs btn-default">Edit</a>
                                        <a href="delete.admin.php?i=<?php echo $admin['admin_id'];?>" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
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
