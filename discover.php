<?php
session_start();
//if(!isset($_COOKIE['ecn'])){header("Location:/");}
//include("inc.config.php");
//$ecn = $_COOKIE['ecn'];
//$quser = "SELECT * FROM `users` WHERE `ecn`='$ecn'";
//$ruser = $connect->query($quser);
//$user = mysqli_fetch_array($ruser);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="shortcut icon" type="image/png" href="icon.png"/>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />-->
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
        <div class="container-fluid" style="margin-bottom:150px;">
            <div class="row fixed-top" style="background:#eeeeee;height:42px;line-height:42px;">
                <div class="col-md-12 col-xs-12" style="color:#555555;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="logo.png" height="20"/>&nbsp;Matrix
                </div>
            </div>
            <div style="height:40px;line-height:40px;position:fixed;top:40px;left:0px;right:0px;width:100%;background:#4a9ed7;background-color:#4a9ed7;z-index:9999;">
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
                            Discover
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                        <td width="25%" valign="middle" align="center">
                            <a href="javascript:void(0);" onclick="history.back();"><span style="color:#4a9ed7;"  class="fa fa-arrow-left fa-lg"></span></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container" style="margin-top:130px;">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-12">
                        <form style="line-height:40px;text-align:center;" action="search.results.php" method="get">
                            <div class="input-group" style="border:0px;">
                                <div class="input-group-addon" style="background:Transparent;">
                                    <span style="border:0px;color:#4a9ed7;" class="fa fa-search"></span> 
                                </div>
                                <input class="form-control" id="q" name="q" style="cursor:text;" type="search" placeholder="search..." autofocus/>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row align-items-start" style="margin-top:50px;">
                    <div class="col-md-12 col-xs-12">
                        <h3 style="color:#555555;">Discover what is on Eveedo</h3>
                        <p style="color:#4a9ed7;">Start by selecting an Interest below</p>
                        <div class="row align-items-start" >

                            <?php
                            include ("inc.config.php");
                            $qsection = "SELECT * FROM `sections` where `section_parent`='0' ORDER BY `section_name` ASC";
                            $rsection = $connect->query($qsection);
                            while ($section = mysqli_fetch_array($rsection)){
                            ?>
                            <div class="col-md-2" style="text-align:center;">
                                <a href="discover.more.php?i=<?php echo $section['section_id'];?>">
                                    <p align="center" style="font-size:12px;">
                                        <img src="<?php echo $section['section_image'];?>" style="background:#<?php echo $section['section_color'];?>;width:68px;height:68px;margin:5px;"/><br />
                                        <?php echo $section['section_name'];?>
                                    </p>
                                </a>
                            </div>                    
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:50px;" >
                    <div class="col-md-6 col-xs-12">
                        <h3 style="color:#555555;">Publishers!</h3>
                        <p style="color:#4a9ed7;">Submit your website or Blog now <strong>FREE</strong>. Fast and easy. Get more exposure, extend your visiblity. Get more visitors.</p>
                        <p style="color:4a9ed7;">Eveedo will review and approve your website or blog for public viewing. We will send you an email letting you know when your Website/Blog is approved.</p>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <form>
                            <p>URL:<br/>
                                <input type="url" name="url" id="url" placeholder="ie: https://mysite.com or https://read.tumblr.com" class="form-control"/>
                            </p>
                            <p>Email:<br />
                                <input type="email" name="email" id="email" placeholder="ie: me@mail.com" class="form-control"/>
                            </p>
                            <p align="right"><input type="submit" class="btn btn-primary" value="Submit"/></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
        <script>
            $(document).ready(function() {
                $('#pinBoot').pinterest_grid({
                    no_columns: 4,
                    padding_x: 10,
                    padding_y: 10,
                    margin_bottom: 50,
                    single_column_breakpoint: 700
                });
            });

            /*
Ref:
Thanks to:
http://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html
*/


            /*
    Pinterest Grid Plugin
    Copyright 2014 Mediademons
    @author smm 16/04/2014

    usage:

     $(document).ready(function() {

        $('#blog-landing').pinterest_grid({
            no_columns: 4
        });

    });


*/
            ;(function ($, window, document, undefined) {
                var pluginName = 'pinterest_grid',
                    defaults = {
                        padding_x: 10,
                        padding_y: 10,
                        no_columns: 3,
                        margin_bottom: 50,
                        single_column_breakpoint: 700
                    },
                    columns,
                    $article,
                    article_width;

                function Plugin(element, options) {
                    this.element = element;
                    this.options = $.extend({}, defaults, options) ;
                    this._defaults = defaults;
                    this._name = pluginName;
                    this.init();
                }

                Plugin.prototype.init = function () {
                    var self = this,
                        resize_finish;

                    $(window).resize(function() {
                        clearTimeout(resize_finish);
                        resize_finish = setTimeout( function () {
                            self.make_layout_change(self);
                        }, 11);
                    });

                    self.make_layout_change(self);

                    setTimeout(function() {
                        $(window).resize();
                    }, 500);
                };

                Plugin.prototype.calculate = function (single_column_mode) {
                    var self = this,
                        tallest = 0,
                        row = 0,
                        $container = $(this.element),
                        container_width = $container.width();
                    $article = $(this.element).children();

                    if(single_column_mode === true) {
                        article_width = $container.width() - self.options.padding_x;
                    } else {
                        article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
                    }

                    $article.each(function() {
                        $(this).css('width', article_width);
                    });

                    columns = self.options.no_columns;

                    $article.each(function(index) {
                        var current_column,
                            left_out = 0,
                            top = 0,
                            $this = $(this),
                            prevAll = $this.prevAll(),
                            tallest = 0;

                        if(single_column_mode === false) {
                            current_column = (index % columns);
                        } else {
                            current_column = 0;
                        }

                        for(var t = 0; t < columns; t++) {
                            $this.removeClass('c'+t);
                        }

                        if(index % columns === 0) {
                            row++;
                        }

                        $this.addClass('c' + current_column);
                        $this.addClass('r' + row);

                        prevAll.each(function(index) {
                            if($(this).hasClass('c' + current_column)) {
                                top += $(this).outerHeight() + self.options.padding_y;
                            }
                        });

                        if(single_column_mode === true) {
                            left_out = 0;
                        } else {
                            left_out = (index % columns) * (article_width + self.options.padding_x);
                        }

                        $this.css({
                            'left': left_out,
                            'top' : top
                        });
                    });

                    this.tallest($container);
                    $(window).resize();
                };

                Plugin.prototype.tallest = function (_container) {
                    var column_heights = [],
                        largest = 0;

                    for(var z = 0; z < columns; z++) {
                        var temp_height = 0;
                        _container.find('.c'+z).each(function() {
                            temp_height += $(this).outerHeight();
                        });
                        column_heights[z] = temp_height;
                    }

                    largest = Math.max.apply(Math, column_heights);
                    _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
                };

                Plugin.prototype.make_layout_change = function (_self) {
                    if($(window).width() < _self.options.single_column_breakpoint) {
                        _self.calculate(true);
                    } else {
                        _self.calculate(false);
                    }
                };

                $.fn[pluginName] = function (options) {
                    return this.each(function () {
                        if (!$.data(this, 'plugin_' + pluginName)) {
                            $.data(this, 'plugin_' + pluginName,
                                   new Plugin(this, options));
                        }
                    });
                }

            })(jQuery, window, document);
        </script>
    </body>
</html>