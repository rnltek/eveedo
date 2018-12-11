<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eveedo</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">
        <link href="../css/pace.css" rel="stylesheet">
        <link href="../css/pnotify.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/colors.css" rel="stylesheet">
        <link href="../css/eveedo.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" style="height:100%;">
            <div class="row" style="margin-bottom:0px;position:fixed;top:0px;width:100%;z-index:9;">
                <div class="col-md-11 col-xs-10" style="height:42px;background:#d2d2d2;line-height:40px;padding-left:25px;"><img src="../logo.png" style="width:120px;"/>

                </div>
                <div class="col-md-1 col-xs-2" style="background:#000000;height:42px;text-align:center;">
                    <span onclick="window.location='../';" class="fa fa-arrow-left fa-lg" style="cursor:pointer;color:#ffffff;font-size:24px;line-height:40px;margin:auto;"></span>
                </div>
            </div>
            <div class="row" style="height:100%;margin-top:-1px;">
                <div class="col-md-12 col-xs-12" style="padding-left:25px;padding-top:25px;">
                    <div style="margin:auto;width:250px;margin-top:50px;">
                        <form>
                            <h3>Search the Matrix</h3>
                            <input type="search" placeholder="Enter item to search for" class="form-control"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery-ui.min.js"></script>
        <script src="../js/bootstrap-tagsinput.min.js"></script>
        <script src="../js/jquery.fullscreen.js"></script>
        <script src="../js/pace.js"></script>
        <script src="../js/pnotify.js"></script>
        <!-- HTML5 Speech Recognition API -->
        <script>
            function startDictation() {

                if (window.hasOwnProperty('webkitSpeechRecognition')) {

                    var recognition = new webkitSpeechRecognition();

                    recognition.continuous = false;
                    recognition.interimResults = false;

                    recognition.lang = "en-US";
                    recognition.start();

                    recognition.onresult = function(e) {
                        document.getElementById('transcript').value
                            = e.results[0][0].transcript;
                        recognition.stop();
                        document.getElementById('labnol').submit();
                    };

                    recognition.onerror = function(e) {
                        recognition.stop();
                    }

                }
            }
        </script>
    </body>
</html>