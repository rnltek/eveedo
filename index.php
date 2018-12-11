<?php
session_start();
//header("Location:discover.php");
if (@$_GET['a']='login'){}else{header("Location:login.php");}
if(isset($_COOKIE['ecn'])){header("Location:discover.php");}
if(!isset($_COOKIE['ecn'])){header("Location:discover.php");}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="stylesheet" href="./css/bootstrap.min.css" >
        <link rel="stylesheet" href="./css/bootstrap-theme.css" >
    </head>
    <body style="background:#0240a8;background-color:#555555;">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding:25px;">
                    <form action="/do/do.login.php" method="post">
                        <p align="center">
                            <img src="logo.png"/>
                        </p>
                        <p>
                            <input type="hidden" name="ref" id="ref" value="<?php echo @$_GET['ref'];?>"/>
                            <input type="text" name="e" id="e" class="form-control form-control-lg" placeholder="Enter ECN or Email"/>
                        </p>
                        <p>
                            <input type="password" name="p" id="p" class="form-control form-control-lg" placeholder="Enter Password"/>
                        </p>
                        <p>
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" />
                        </p>
                        <p align="center">
                            <a href="register.php" class="btn btn-warning btn-block btn-lg">No Account? Register Now.</a>
                        </p>
                        <p align="center">
                            <a href="forgot.password.php" class="btn btn-default btn-block btn-lg">Forgot Password? Reset.</a>
                        </p>
                        <p style="color:#f2f2f2;">
                            You must be logged in to use the member only features. Non-members can use the search but will be unable to save items or articles.
                        </p>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script src="./js/jquery-3.1.1.slim.min.js"></script>
        <script src="./js/tether/1.4.0/js/tether.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>