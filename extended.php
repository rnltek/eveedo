<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:login.php");}
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
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/pace.css" />
    </head>
    <body style="background:#ffffff;background-color:#ffffff;">
            <div class="row fixed-top" style="background:#eeeeee;height:42px;line-height:42px;">
                <div class="col-md-12 col-xs-12" style="color:#555555;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="logo.png" height="20"/>&nbsp;Matrix
                </div>
            </div>
        <div style="height:40px;line-height:40px;position:fixed;top:40px;left:0px;right:0px;width:100%;background:#4a9ed7;background-color:#4a9ed7;">
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
        <div style="height:40px;line-height:40px;position:fixed;top:80px;left:0px;right:0px;width:100%;background:#f2f2f2;background-color:#f2f2f2;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a href="javascript:void(0);" onclick="history.back();"><span class="fa fa-arrow-left fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a href="/do/do.logout.php"><span class="fa fa-power-off fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="container" style="margin-top:150px;">
            <div class="row">
                <div class="col-md-4" style="margin-bottom:5px;">
                    <h4 style="border-bottom:1px solid #cccccc;padding-bottom:10px;">My Details<a href="edit.account.php"><span style="float:right;" class="fa fa-pencil"></span></a></h4>
                    <table width="100%">
                        <tr>
                            <td valign="top">
                                <h5 style="margin-bottom:5px;"><?php echo $_COOKIE['full_name'];?></h5>
                                <p style="font-size:16px;">
                                    <?php echo $user['ecn'];?><br />
                                    <?php echo $user['gender'].' - '.$_COOKIE['birthday'];?><br />
                                    <?php echo $user['location'];?><br />
                                    <?php echo $user['email'];?>
                                </p>
                                <p>
                                    <a href="change.password.php" style="font-size:16px;"><span style="font-size:20px;" class="fa fa-lock fa-lg"></span>&nbsp;&nbsp;Change Password</a>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4" style="margin-bottom:25px;">
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
//$userdir = "c:/wamp64/www/user/".$ecn;
$userdir = "/var/www/html/user/".$ecn;
$max = human_filesize($user['max_bytes']);
$ttl = human_filesize(folderSize($userdir));
//$ttl = human_filesize($ttl);

                    ?>
                    <h4 style="border-bottom:1px solid #cccccc;padding-bottom:10px;">Usage</h4>
                    <table width="100%">
                        <tr>
                            <td><strong>Used</strong></td>
                            <td align="right"><strong>Max</strong></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <?php echo $ttl;?>
                            </td>
                            <td valign="top" align="right">
                                <?php echo $max;?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4" style="margin-bottom:25px;">
                    <h4 style="border-bottom:1px solid #cccccc;padding-bottom:10px;">Interests<a href="select.interest.php"><span style="float:right;" class="fa fa-plus"></span></a></h4>
                    <?php
                    include("inc.config.php");
                    $qinterest = "SELECT * FROM `interests` WHERE `ecn`='$ecn' ORDER BY `interest` ASC";
                    $rinterest = $connect->query($qinterest);
                    $exists = mysqli_num_rows($rinterest);
                    if($exists==0){
                    ?>
                    <p style="font-size:14px;">
                        You have not selected any interests yet.
                    </p>
                    <?php
                    }
                    while ($interest = mysqli_fetch_array($rinterest)){
                    ?>
                        <a href="delete.interest.php?i=<?php echo $interest['id'];?>"><span class="fa fa-minus"></span></a>&nbsp;&nbsp;<?php echo $interest['interest'];?><br />
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
    </body>
</html>