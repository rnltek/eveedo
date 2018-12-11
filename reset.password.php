<?php
session_start();
include ("inc.config.php");
$token = $_GET['t'];
$quser = "SELECT * FROM `users` WHERE `token`='$token'";
$ruser = $connect->query($quser);
$user = mysqli_fetch_array($ruser);
$cookie_name = "ecn";
$cookie_value = $user['ecn'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/pace.css" />
        <style>
            #pinBoot {
                position: relative;
                max-width: 100%;
                width: 100%;
            }
            .white-panel {
                position: absolute;
                background: white;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
                padding: 0px;
            }
            /*
            stylize any heading tags withing white-panel below
            */

            .white-panel h1 {
                font-size: 1em;
            }
            .white-panel h1 a {
                color: #A92733;
            }
            /*
            .white-panel:hover {
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
            margin-top: -5px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            }
            */
        </style>
    </head>
    <body style="background:#ffffff;background-color:#ffffff;">
        <div style="height:40px;line-height:40px;position:fixed;top:0px;left:0px;width:100%;background:#0240a8;background-color:#0240a8;padding:0px;z-index:9999;">
            <div style="float:left;width:120px;line-height:40px;height:auto;margin-left:10px;"><img src="logo.png" style="width:110px;margin-bottom:7px;"/></div>
            <div style="float:right;width:200px;line-height:40px;height:auto;margin-right:10px;">
                <form style="line-height:40px;" action="search.results.php" method="get">
                    <table>
                        <tr>
                            <td>
                                <input type="search" class="form-control" placeholder="Search" style="border:0px;background:Transparent;color:#f2f2f2;" id="q" name="q"/>
                            </td>
                            <td style="padding-left:4px;">
                                <span style="color:#f2f2f2;width:32px;text-align:center;cursor:pointer;"  class="fa fa-search"></span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div style="height:40px;line-height:40px;position:fixed;top:40px;left:0px;right:0px;width:100%;background:#7989a5;background-color:#7989a5;z-index:9999;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="home.php"><span class="fa fa-columns fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="folders.php"><span class="fa fa-folder fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="discover.php"><span class="fa fa-binoculars fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="extended.php"><span class="fa fa-bars fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <div style="height:40px;line-height:40px;position:fixed;top:80px;left:0px;right:0px;width:100%;background:#f2f2f2;background-color:#f2f2f2;z-index:9999;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a href="javascript:void(0);" onclick="history.back();"><span class="fa fa-arrow-left fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <form action="do/do.password.update.php" method="POST">
            <div class="container" style="margin-top:150px;">
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-12">
                        <h4><?php echo $user['first_name'].' '.$user['last_name'];?> (Change Password)</h4>
                    </div>
                </div>
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-6">
                        <p>
                            New Password
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                        </p>
                        <p>
                            <input type="submit" value="Save New Password" class="btn btn-success btn-block"/>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
    </body>
</html>