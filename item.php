<?php
include ("inc.config.php");
$qitem = "SELECT * FROM `folder_items` WHERE `item_token`='".$_GET['t']."'";
$ritem = $connect->query($qitem);
$item = mysqli_fetch_array($ritem);
?>
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
        <div class="row" style="margin-top:75px;margin-bottom:10px;">
            <div class="col-md-12 col-xs-12">
                <h3>
                    <a href="folder.php?t=<?php echo $item['folder'];?>"><span style="float:right;margin-right:15px;" class="fa fa-arrow-left"></span></a>                
                    <a href="edit.item.php?t=<?php echo $_GET['t'];?>"><span style="float:right;margin-right:15px;" class="fa fa-pencil"></span></a>
                </h3>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-md-1"></div>
            <div class="col-md-3 col-xs-12" style="padding:5px;">
                <img src="<?php echo $item['item_icon'];?>" style="width:99%;"/>
            </div>
            <div class="col-md-7 col-xs-12">
                <h2><?php echo $item['item_name'];?></h2>
                <p style="font-size:16px;padding-right:10px;"><?php echo $item['item_description'];?></p>
                <p style="font-size:14px;"><strong>Tags</strong><br /><?php echo $item['tags'];?></p>
                <p style="font-size:12px;color:#999999;">Added:&nbsp;<?php echo date('D M d, Y h:j:s A',strtotime($item['created']));?></p>
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