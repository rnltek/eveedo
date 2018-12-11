<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:/");}
include("inc.config.php");
$qitem = "SELECT * FROM `folder_items` WHERE `item_token`='".$_GET['t']."'";
$ritem = $connect->query($qitem);
$item = mysqli_fetch_array($ritem);
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
        <style>
            a:hover{text-decoration:none;}
        </style>
    </head>
    <body style="background:#ffffff;background-color:#ffffff;">
        <div style="height:40px;line-height:40px;position:fixed;top:0px;left:0px;width:100%;background:#0240a8;background-color:#0240a8;padding:0px;">
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
        <div style="height:40px;line-height:40px;position:fixed;top:40px;left:0px;right:0px;width:100%;background:#7989a5;background-color:#7989a5;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="home.php"><span class="fa fa-columns fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="folders.php"><span class="fa fa-folder fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="alerts.php"><span class="fa fa-bell fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="extended.php"><span class="fa fa-bars fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <div style="height:40px;line-height:40px;position:fixed;top:80px;left:0px;right:0px;width:100%;background:#f2f2f2;background-color:#f2f2f2;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                        Select Folder
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
                    <?php
                    include("inc.config.php");
                    $qfolders = "SELECT * FROM `folders` WHERE `owner_ecn`='".$_COOKIE['ecn']."' ORDER BY `folder_name` ASC";
                    $rfolders = $connect->query($qfolders);
                    while ($folder = mysqli_fetch_array($rfolders)){
                    ?>
                    <div class="col-md-3"><a href="move.to.folder.php?t=<?php echo $item['item_token'];?>&f=<?php echo $folder['folder_token'];?>&o=<?php echo $item['folder'];?>"><span class="fa fa-folder"></span>&nbsp;&nbsp;<?php echo $folder['folder_name'];?></a></div>
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