<?php
session_start();
if(!isset($_SESSION['admin_id'])){header("Location:/admin/");}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo | Administration</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/eveedo.css" >
    </head>
    <body style="background:#f2f2f2;">
        <div id="topbar" style="position:fixed;width:100%;right:0px;left:0px;height:42px;top:0px;background:#000000;line-height:42px;padding-left:4px;color:#ffffff;">
            <img src="logo.png" height="28px;"/>&nbsp;Administration
        </div>
        <div class="container" style="margin-top:42px;height:100%;">
            <div class="row" style="height:100%;">
                <div class="col-md-2" style="height:100%;padding-top:25px;">
                    <h5>
                    <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?>
                    </h5>
                    <p>
                        <a href="users.php">Users</a>
                    </p>
                    <p>
                        <a href="admins.php">Admins</a>
                    </p>
                    <p>
                        <a href="sections.php">Sections</a>
                    </p>
                    <p>
                        <a href="folders.php">Folders</a>
                    </p>
                    <p>
                        <a href="logout.php">Logout</a>
                    </p>
                </div>
                <div class="col-md-8" style="padding-top:25px;">
                    <div class="col-md-3 text-center">
                        <div class="panel">
                        <h5>Total Users</h5>
                        <h2>
                            <?php
                            include("inc.config.php");
                            $qusercount = "SELECT * FROM `users`";
                            $rusercount = $connect->query($qusercount);
                            $numusers = mysqli_num_rows($rusercount);
                            echo number_format($numusers);
                            ?>
                        </h2>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <h5>Total Folders</h5>
                        <h2>
                            <?php
                            include("inc.config.php");
                            $qcount = "SELECT * FROM `folders`";
                            $rcount = $connect->query($qcount);
                            $numfolders = mysqli_num_rows($rcount);
                            echo number_format($numfolders);
                            ?>
                            
                        </h2>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div id="system"></div>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>