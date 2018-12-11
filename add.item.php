<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:/");}
include ("inc.config.php");
$qparent = "SELECT * FROM `folders` WHERE `folder_token`='".$_GET['t']."'";
$rparent = $connect->query($qparent);
$parent = mysqli_fetch_array($rparent);
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
        <link rel="stylesheet" href="css/eveedo.css" />
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
            a:hover{text-decoration:none;}
        </style>
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
        <div class="container" style="margin-top:125px;">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!--<h3><?php echo $parent['folder_name'];?></h3>-->
                    <h5>Select Item to Add</h5>
                </div>
            </div>
            <div class="row align-items-start" style="text-align:center;">
                <a href="add.folder.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/folder.png" style="width:68px;height:68px;background:#0240a8;" /><br />
                    Folder
                    </p>
                </div>
                </a>
                <a href="add.link.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/link.jpg" style="width:68px;height:68px;"/><br />
                    Website
                    </p>
                </div>
                </a>
                <a href="add.word.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_Word_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Word
                    </p>
                </div>
                </a>
                <a href="add.excel.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_Excel_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Excel
                    </p>
                </div>
                </a>
                <a href="add.access.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_Products_Access_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Access
                    </p>
                </div>
                </a>
                <a href="add.powerpoint.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_PowerPoint_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Powerpoint
                    </p>
                </div>
                </a>
                <a href="add.publisher.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_Publisher_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Publisher
                    </p>
                </div>
                </a>
                <a href="add.visio.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_Visio_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Visio
                    </p>
                </div>
                </a>
                <a href="add.project.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/Icon_Products_Project_68x68.jpg" style="width:68px;height:68px;"/><br />
                    Project
                    </p>
                </div>
                </a>
                <a href="add.video.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/videos.png" style="background:#0240a8;width:68px;height:68px;"/><br />
                    Video
                    </p>
                </div>
                </a>
                <a href="add.photo.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/photos.png" style="background:#0240a8;width:68px;height:68px;"/><br />
                    Photo
                    </p>
                </div>
                </a>
                <a href="add.music.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/music.png" style="background:#0240a8;width:68px;height:68px;"/><br />
                    Music
                    </p>
                </div>
                </a>
                <a href="add.zip.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/zip.jpg" style="width:68px;height:68px;"/><br />
                    Zip Archive
                    </p>
                </div>
                </a>
                <a href="add.psd.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/psd.jpg" style="width:68px;height:68px;"/><br />
                    Adobe PSD
                    </p>
                </div>
                </a>
                <a href="add.pdf.php?t=<?php echo $_GET['t'];?>">
                <div class="col col-xs-3">
                    <p align="center" style="font-size:12px;line-height:13px;">
                    <img src="images/pdf.jpg" style="width:68px;height:68px;"/><br />
                    Adobe PDF
                    </p>
                </div>
                </a>
            </div>
        </div>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
    </body>
</html>