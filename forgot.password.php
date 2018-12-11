<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" >
        <link rel="stylesheet" href="/css/bootstrap-theme.css" >
    </head>
    <body style="background:#0240a8;background-color:#0240a8;">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding:25px;color:#f2f2f2;">
                    <form action="send.instructions.php" method="post">
                        <p align="center">
                            <img src="logo.png"/>
                        </p>
                        <h3 style="text-align:center;color:#f2f2f2;">Reset Password</h3>
                        <p>Enter the email address used when you registered for an account. Instructions to reset your password will be sent.</p>
                        <p>
                            Email Address
                            <input type="email" name="e" id="e" class="form-control" placeholder="Enter Email"/>
                        </p>
                        <p>
                            <input type="submit" class="btn btn-primary btn-block" value="Send Instructions" />
                        </p>
                        <p align="center">
                            <a href="/" class="btn btn-default btn-block">Have Account? Login Now.</a>
                        </p>
                        <p align="center">
                            <a href="register.php" class="btn btn-warning btn-block">No Account? Register Now.</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
        <div id="system"></div>
        <script>
            $(document).ready(function(){
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.watchPosition(showPosition);
                    }
                }
                function showPosition(position) {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;
                    document.cookie = "lat="+lat;
                    document.cookie = "lon="+lon;
                }
                getLocation();
            });
        </script>
    </body>
</html>