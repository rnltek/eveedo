<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:/");}
include("inc.config.php");
$ecn = $_COOKIE['ecn'];
$quser = "SELECT * FROM `users` WHERE `ecn`='$ecn'";
$ruser = $connect->query($quser);
$user = mysqli_fetch_array($ruser);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/bootstrap-theme.css" />
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/pace.css" />
        <link rel="stylesheet" href="/css/eveedo.css" />
    </head>
    <body style="background:#ffffff;background-color:#ffffff;">
        <div class="container-fluid" style="margin-bottom:50px;">
            <div class="row fixed-top" style="background:#0240a8;height:42px;line-height:42px;">
                <div class="col-md-12 col-xs-12" style="color:#f2f2f2;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="/logo.png" height="20"/>
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
                            Select Interest
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container" style="margin-top:130px;">
            <div class="row align-items-start" >
    <?php
                include("inc.config.php");
                    $qinterest = "SELECT * FROM `sections` WHERE `section_parent`='0' ORDER BY `section_name` ASC";
                    $rinterest = $connect->query($qinterest);
                    while ($interest = mysqli_fetch_array($rinterest)){
                ?>
                    <div class="col">
                        <a href="save.interest.php?i=<?php echo $interest['section_name'];?>">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="<?php echo $interest['section_image'];?>" style="width:68px;height:68px;margin:5px;background:#<?php echo $interest['section_color'];?>;"/><br />
                    <?php echo $interest['section_name'];?>
                    </p>
                        </a>
                    </div>                    
                <?php
                }
                ?>
            </div>
        </div>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
    </body>
</html>