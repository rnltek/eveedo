<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:/index.php?ref=connect");}
include("../inc.config.php");
$qparent = "SELECT * FROM `sections` WHERE `section_id`=".$_GET['s']." ORDER BY `section_name` ASC";
$rparent = $connect->query($qparent);
$parent=mysqli_fetch_array($rparent);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo Connect</title>
        <link rel="stylesheet" href="../css/animate.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!--<link rel="stylesheet" href="/css/bootstrap-theme.css" />-->
        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <link rel="stylesheet" href="../css/pace.css" />
        <link rel="stylesheet" href="../css/eveedo.css" />
        <link rel="stylesheet" href="../css/pnotify.css">
    </head>
    <body style="width: 100%;">
        <div class="container-fluid" style="margin-bottom:50px;">
            <div class="row fixed-top" style="background:#0d5a4c;height:42px;line-height:42px;">
                <div class="col-md-6" style="color:#f2f2f2;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="../logo.png" height="20"/>&nbsp;Administration
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="row" style="margin-top:50px;">
                <div class="col-md-3" style="font-size:12px;">
                    <p>
                        <a style="padding:2px;font-size:14px;display:block;"  href="/admin/"><span style="width:20px;text-align:center;" class="fa fa-home"></span>&nbsp;&nbsp;Home</a>
                        <a style="padding:2px;background:#0d5a4c;color:#f2f2f2;font-size:14px;display:block;"  href="/admin/sections.php"><span style="width:20px;text-align:center;" class="fa fa-link"></span>&nbsp;&nbsp;Manage Sections</a>
                        <a style="padding:2px;font-size:14px;display:block;" href="/admin"><span style="width:20px;text-align:center;" class="fa fa-comments fa-lg"></span>&nbsp;&nbsp;Messages</a>
                        <a style="padding:2px;font-size:14px;display:block;" href="/admin"><span style="width:20px;text-align:center;" class="fa fa-folder fa-lg"></span>&nbsp;&nbsp;Shared Folders</a>
                    </p>
                    <form action="save-section.php" method="post">
                        <table width="100%">
                            <tr><td colspan="2">Add New Section</td></tr>
                            <tr>
                                <td>
                        <input type="hidden" name="parent" id="parent" value="<?php echo $_GET['s'];?>"/>
                        <input style="display:inline;" type="text" name="section_name" id="section_name" class="form-control" placeholder="enter section name" required autofocus/>
                                </td>
                                <td>
                        <input style="display:inline;" type="submit" class="btn btn-default" value="Save Section"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-md-9" style="font-size:12px;text-align:left;">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Manage Sections (<?php echo $parent['section_name'];?>)</h3>
                            <p style="font-size:14px;">
                            Click a Section, to move to its sub-sections if any. Use the add section to add sub-sections. 
                                <?php
                                if($parent['section_parent']=="0"){
                                ?>
                                <a href="sections.php"><span style="font-size:14px;padding:4px;width:32px;text-align:center;float:right;" class="fa fa-arrow-left"></span></a>
                                <?php
                                }else{
                                ?>
                                <a href="sections-expand.php?s=<?php echo $parent['section_parent'];?>"><span style="font-size:14px;padding:4px;width:32px;text-align:center;float:right;" class="fa fa-arrow-left"></span></a>
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    include("../inc.config.php");
                    $qsections = "SELECT * FROM `sections` WHERE `section_parent`=".$_GET['s']." ORDER BY `section_name` ASC";
                    $rsections = $connect->query($qsections);
                    while ($section=mysqli_fetch_array($rsections)){
                        echo "<div class='col-md-2' style='padding:4px;'><a href='sections-expand.php?s=".$section['section_id']."' style='font-size:14px;padding:4px;display:block;'>".$section['section_name']."</a></div>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/tether.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/pace.js"></script>
        <script type="text/javascript" src="../js/pnotify.js"></script>
        <div id="system"></div>
    </body>
</html>