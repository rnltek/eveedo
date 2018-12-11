<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eveedo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/pace.css" rel="stylesheet">
        <link href="css/pnotify.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/colors.css" rel="stylesheet">
        <link href="css/eveedo.css" rel="stylesheet">
        <style>
            a:hover{text-decoration:none;}
        </style>    
    </head>
    <body>
        <div style="height:42px;background:#0240a8;width:100%;padding-left:15px;padding-right:15px;line-height:42px;position:fixed;top:0px;left:0px;width:100%;z-index:9;">
            <img src="logo.png" height="28" onclick="window.location='/';" style="cursor:pointer;height:28px;width:auto;float:left;line-height:42px;display:inline;margin-top:7px;margin-right:25px;"/>
            <form style="line-height:42px;">
                <table>
                    <tr>
                        <td>
                            <input type="search" class="form-control" placeholder="Search" style="border:0px;background:Transparent;color:#ffffff;"/>
                        </td>
                        <td style="padding-left:4px;">
                            <span style="color:#999999;width:32px;text-align:center;cursor:pointer;"  class="fa fa-search fa-lg"></span>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="display:inline;position:fixed;top:42px;width:100%;height:42px;background:#f2f2f2;width:100%;z-index:9;">
            <table width="100%" height="100%">
                <tr>
                    <td align="center" width="25%" align="center" valign="middle">
                        <a href="home.php"><span class="fa fa-columns fa-lg" style="cursor:pointer;font-size:28px;width:32px;text-align:center;color:#cccccc;"></span></a>
                    </td>
                    <td align="center" width="25%" align="center" valign="middle">
                        <a href="folders.php"><span class="fa fa-folder fa-lg" style="cursor:pointer;font-size:28px;width:32px;text-align:center;color:#0240a8;"></span></a>
                    </td>
                    <td align="center" width="25%" align="center" valign="middle">
                        <a href="alerts.php"><span class="fa fa-bell fa-lg" style="cursor:pointer;font-size:28px;width:32px;text-align:center;color:#cccccc;"></span></a>
                    </td>
                    <td align="center" width="25%" align="center" valign="middle">
                        <a href="extended.php"><span class="fa fa-bars fa-lg" style="cursor:pointer;font-size:28px;width:32px;text-align:center;color:#cccccc;"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="container-fluid">
            <div class="row" style="margin-top:75px;">
                <div class="col-md-12 col-xs-12">
                    <h3>Add New Folder</h3>
                    <form action="do/do.create.folder.php" method="post">
                        <input type="hidden" name="parent" id="parent" value="<?php echo $_GET['p'];?>"/>
                        <p>
                            <input type="text" name="folder_name" id="folder_name" class="form-control input-lg" placeholder="New Folder Name" required autofocus/>
                        </p>
                        <p>
                            <textarea name="folder_description" id="folder_description" class="form-control input-lg" placeholder="Folder Description" required></textarea>
                        </p>
                        <p>
                            <select class="form-control input-lg" name="privacy" id="privacy">
                                <option value="Public">Public</option>
                                <option value="Public">Private</option>
                            </select>
                        </p>
                        <p>
                            <textarea name="folder_tags" id="folder_tags" class="form-control input-lg" placeholder="Enter keywords separated by comma" required></textarea>
                        </p>
                        <p>
                            <input type="submit" class="btn btn-success btn-block btn-lg" value="Save New Folder"/>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div id="system"></div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap-tagsinput.min.js"></script>
        <script src="js/jquery.fullscreen.js"></script>
        <script src="js/pace.js"></script>
        <script src="js/pnotify.js"></script>
        <script>
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(showPosition);
                }
            }
            function showPosition(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                $("#system").load("/do/update.location.php?lat=" + lat + "&lon=" + lon);
            }
            $(document).ready(function(){
                getLocation();
            });
        </script>
    </body>
</html>