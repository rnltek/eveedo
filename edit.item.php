<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:/");}
include ("inc.config.php");
$qitem = "SELECT * FROM `folder_items` WHERE `item_token`='".$_GET['t']."'";
$ritem = $connect->query($qitem);
$item = mysqli_fetch_array($ritem);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <!--<meta charset="utf-8">-->
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
        </style>
    </head>
    <body style="background:#ffffff;background-color:#ffffff;">
        <div class="container-fluid" style="margin-bottom:150px;">
            <div class="row fixed-top" style="background:#0240a8;height:42px;line-height:42px;">
                <div class="col-md-12 col-xs-12" style="color:#f2f2f2;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="/logo.png" height="20"/>&nbsp;Vault
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
                        <a href="folder.php?t=<?php echo $item['folder'];?>" onclick="history.back();"><span class="fa fa-arrow-left fa-lg"></span></a>
                        </td>
                    </tr>
                </table>
            </div>
        <form action="do/do.item.update.php" method="POST">
        <div class="container" style="margin-top:125px;">
            <div class="row" style="margin-bottom:15px;">
                <div class="col-md-12">
                    <h4><?php echo $item['item_name'];?> (Edit Item)</h4>
                </div>
            </div>
            <div class="row align-items-start" style="margin-bottom:25px;">
                <div class="col-md-4">
                    <img src="<?php echo $item['item_icon'];?>" width="100%" /><br />
                    <a href="change.item.image.php?t=<?php echo $item['item_token'];?>" class="btn btn-default btn-block">Change Image</a>
                    <a href="select.folder.php?t=<?php echo $item['item_token'];?>" class="btn btn-default btn-block">Move to Folder</a>
                    <a href="do/do.delete.item.php?t=<?php echo $item['item_token'];?>&f=<?php echo $item['folder'];?>" class="btn btn-default btn-block">Delete Item</a>
                </div>
                <div class="col-md-8">
                    <p>
                    Item Name
                    <input type="hidden" name="item_token" id="item_token" value="<?php echo $_GET['t'];?>"/>
                    <input type="text" name="item_name" id="item_name" class="form-control form-control-lg" placeholder="Enter a title or name" value="<?php echo $item['item_name'];?>"/>
                    </p>
                    <p>
                    Item Description
                    <textarea rows="5" name="item_description" id="item_description" class="form-control form-control-lg" placeholder="Enter a description"><?php echo $item['item_description'];?></textarea>
                    </p>
                    <table width="100%" style="margin-bottom:15px;">
                        <tr>
                            <td>Section
                                <input type="text" readonly name="section" id="section" class="form-control form-control-lg" placeholder="Choose a Section..." value="<?php echo $item['section'];?>"/>
                                <input type="hidden" name="section_image" id="section_image" value="<?php echo $item['section_image'];?>"/>
                                <input type="hidden" name="section_color" id="section_color" value="<?php echo @$item['section_color'];?>"/>
                            </td>
                            <td width="48" valign="middle">
                                <span onclick="window.location='select.section.php?r=edit.item&t=<?php echo $_GET['t'];?>&f=2';" class="fa fa-search-plus fa-lg" style="color:#0240a8;font-size:32px;cursor:pointer;width:32px;text-align:center;"></span>
                            </td>
                        </tr>
                    </table>
                    <p>
                    Privacy
                    <select name="privacy" id="privacy" class="form-control form-control-lg">
                        <option value="Private" <?php if($item['privacy']=='Private'){echo 'selected';}?>>Private</option>
                        <option value="Public" <?php if($item['privacy']=='Public'){echo 'selected';}?>>Public</option>
                    </select>
                    </p>
                    <p>
                    Tags/Keywords
                    <textarea name="tags" id="tags" class="form-control form-control-lg" placeholder="Enter words separated by comma. No spaces."><?php echo $item['tags'];?></textarea>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Save Changes"/>
                    </p>
                </div>
            </div>
            <div class="row" style="">
                <div class="col">
                    <p><strong>WARNING:</strong> Items containing illegal material, or terroristic related material, will be removed, and/or reported to proper law enforcement authorities.</p>
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