<?php
session_start();
if(!isset($_SESSION['aid'])){header("Location:login/");}else{
    include("config.php");
    $admin_id = $_SESSION['aid'];
    $qadmin = "SELECT * FROM `admins` WHERE `admin_id`='$admin_id'";
    $radmin = $birthday->query($qadmin);
    $admin = mysqli_fetch_array($radmin);
    $admin_name = $admin['admin_first_name'].' '.$admin['admin_last_name'];
    $admin_email = $admin['admin_email'];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>The Curation Engine - Administrator</title>
        <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
        <link rel="manifest" href="/img/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/fonts.css">        
        <link rel="stylesheet" href="/css/animate.css">        
        <link rel="stylesheet" href="/css/full-calendar.css">        

        <link rel="stylesheet" href="/css/app.css">        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body data-sa-theme="2" onload="getLocation();">


        <header class="header">
            <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                <i class="zmdi zmdi-menu"></i>
            </div>

            <div class="logo hidden-sm-down">
                <h1><a href="../admin/">The Curation Engine 2.0</a></h1>
            </div>

            <form class="search">
                <div class="search__inner">
                    <input type="text" class="search__text" placeholder="Search for cards, businesses, people...">
                    <i class="fa fa-search search__helper" style="line-height:42px;" data-sa-action="search-close"></i>
                </div>
            </form>

            <ul class="top-nav">
                <li class="hidden-xl-up"><a href="" data-sa-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="top-nav__notify"><i class="fa fa-envelope"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                        <div class="dropdown-header">
                            Messages

                            <div class="actions">
                                <a href="messages.html" class="actions__item zmdi zmdi-plus"></a>
                            </div>
                        </div>

                        <div class="listview listview--hover">
                            <a href="" class="listview__item">
                                <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">
                                        David Belle <small>12:01 PM</small>
                                    </div>
                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">
                                        Jonathan Morris
                                        <small>02:45 PM</small>
                                    </div>
                                    <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">
                                        Fredric Mitchell Jr.
                                        <small>08:21 PM</small>
                                    </div>
                                    <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <img src="demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">
                                        Glenn Jecobs
                                        <small>08:43 PM</small>
                                    </div>
                                    <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <img src="demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">
                                        Bill Phillips
                                        <small>11:32 PM</small>
                                    </div>
                                    <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                </div>
                            </a>

                            <a href="" class="view-more">View all messages</a>
                        </div>
                    </div>
                </li>

                <li class="dropdown top-nav__notifications">
                    <a href="" data-toggle="dropdown" class="top-nav__notify">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                        <div class="dropdown-header">
                            Notifications

                            <div class="actions">
                                <a href="" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                            </div>
                        </div>

                        <div class="listview listview--hover">
                            <div class="listview__scroll scrollbar-inner">
                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">David Belle</div>
                                        <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">Jonathan Morris</div>
                                        <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">Fredric Mitchell Jr.</div>
                                        <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">Glenn Jecobs</div>
                                        <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">Bill Phillips</div>
                                        <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">David Belle</div>
                                        <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">Jonathan Morris</div>
                                        <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">Fredric Mitchell Jr.</div>
                                        <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                    </div>
                                </a>
                            </div>

                            <div class="p-1"></div>
                        </div>
                    </div>
                </li>

                <li class="dropdown hidden-xs-down">
                    <a href="" data-toggle="dropdown"><i class="fa fa-check-circle"></i></a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                        <div class="dropdown-header">Tasks</div>

                        <div class="listview listview--hover">
                            <a href="" class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">HTML5 Validation Report</div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Google Chrome Extension</div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Social Intranet Projects</div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-success" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Bootstrap Admin Template</div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Youtube Client App</div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-danger" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="view-more">View all Tasks</a>
                        </div>
                    </div>
                </li>



            </ul>

            <div class="clock hidden-md-down">
                <div class="time">
                    <span class="time__hours"></span>
                    <span class="time__min"></span>
                    <span class="time__sec"></span>
                </div>
            </div>
        </header>
        
        
<aside class="sidebar">
                <div class="scrollbar-inner">

                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="../img/user-default.png" alt="">
                            <div>
                                <div class="user__name"><?php echo $admin_name;?></div>
                                <div class="user__email"><?php echo $admin_email;?></div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile/?aid=<?php echo $admin_id;?>">View Profile</a>
                            <a class="dropdown-item" href="settings/?aid=<?php echo $admin_id;?>">Settings</a>
                            <a class="dropdown-item" href="logout/">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="navigation__active"><a href="../admin"><i class="fa fa-home"></i> Home</a></li>

                        <li class="navigation__sub @@cardssactive">
                            <a href=""><i class="fa fa-bookmark"></i> Cards</a>

                            <ul>
                                <li class="@@newcardactive"><a href="cards/new/">Create New Card</a></li>
                                <li class="@@searchcardactive"><a href="cards/search/">Search Cards</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub @@foldersactive">
                            <a href=""><i class="fa fa-folder"></i> Folders</a>

                            <ul>
                                <li class="@@newfolderactive"><a href="folders/new/">Create New Folder</a></li>
                                <li class="@@searchfolderactive"><a href="folders/search/">Search Folders</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
        
        
        
        <script src="/js/jquery.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.scrollbar.min.js"></script>
        <script src="/js/jquery-scrollLock.min.js"></script>

        <script src="/js/salvattore.min.js"></script>
        <script src="/js/jquery.flot.js"></script>
        <script src="/js/jquery.flot.resize.js"></script>
        <script src="/js/curvedLines.js"></script>
        <script src="/js/jquery.vmap.min.js"></script>
        <script src="/js/jquery.vmap.world.js"></script>
        <script src="/js/jquery.easypiechart.min.js"></script>
        <script src="/js/jquery.peity.min.js"></script>
        <script src="/js/moment.min.js"></script>
        <script src="/js/fullcalendar.min.js"></script>

        <!-- App functions and actions -->
        <script src="/js/app.min.js"></script>
        <table width="100%" height="100%" id="loader" style="position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:999;">
            <tr>
                <td valign="middle" align="center">
                    <img src="/loading1.gif" width="125"/>
                </td>
            </tr>
        </table>
        <script>
            $(document).ready(function(){
                $('#loader').fadeOut();
            });        
        </script>        
        <div style="position:fixed;width:100%;height:auto;bottom:15px;left:15px;" id="demo"></div>
<script>
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude; 
    $('#demo').load('update.session.php?lat='+ position.coords.latitude + '&lon=' + position.coords.longitude)
}
</script>        
    </body>
</html>        