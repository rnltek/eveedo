<?php
session_start();
//if(!isset($_COOKIE['ecn'])){header("Location:/");}
include("inc.config.php");
if(isset($_COOKIE['ecn'])){
$ecn = $_COOKIE['ecn'];
$quser = "SELECT * FROM `users` WHERE `ecn`='$ecn'";
$ruser = $connect->query($quser);
$user = mysqli_fetch_array($ruser);
}
$q = trim($_GET['q']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/bootstrap-theme.css" />
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/pace.css" />
        <link rel="stylesheet" href="/css/eveedo.css" />
        <style>
            #pinBoot {
                position: relative;
                max-width: 100%;
                width: 100%;
                z-index: 9;
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
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
    </head>
    <body style="background:#ffffff;background-color:#ffffff;width:100%;">
        <div class="container-fluid" style="margin-bottom:50px;">
            <div class="row fixed-top" style="background:#eeeeee;height:42px;line-height:42px;">
                <div class="col-md-12 col-xs-12" style="color:#555555;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="/logo.png" height="20"/>&nbsp;Matrix
                </div>
            </div>
              <div style="height:40px;line-height:40px;position:fixed;top:40px;left:0px;right:0px;width:100%;background:#9fcd4f;background-color:#9fcd4f;z-index:9999;">
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
                            Results
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                        <td width="25%" valign="middle" align="center">
                        </td>
                        <td width="25%" valign="middle" align="center">
                            <a href="javascript:void(0);" onclick="history.back();"><span style="color:#9fcd4f;" class="fa fa-arrow-left fa-lg"></span></a>
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
                                    <span style="border:0px;color:#9fcd4f;" class="fa fa-search"></span> 
                                </div>
                                <input class="form-control" id="q" name="q" style="cursor:text;" type="search" placeholder="search..." autofocus/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h4>Results for "<?php echo $q;?>"</h4>
                        <section id="pinBoot">
                            <?php
                            include ("inc.config.php");
                            $qfolders = "SELECT * FROM `folders` WHERE MATCH(tags,folder_name,folder_description) AGAINST ('+$q' IN BOOLEAN MODE) AND `folder_private`='Public' ORDER BY `created` DESC LIMIT 4";
                            $rfolders = $connect->query($qfolders);
                            while ($folder = mysqli_fetch_array($rfolders)){
                            ?>
                            <article class="white-panel" style="width:100%;border:1px solid #<?php echo $folder['section_color'];?>">
                                <div style="background:#<?php echo $folder['section_color'];?>;color:#f2f2f2;padding:5px;width:100%;"><img style="height:20px;width:20px;line-height:24px;" src="<?php echo $folder['section_image'];?>"/>&nbsp;Folder</div>
                                <a href="folder.php?t=<?php echo $folder['folder_token'];?>">
                                    <img src="<?php echo $folder['folder_image'];?>" style="width:100%;" onerror="if (this.src != 'images/no_image.jpg') this.src = 'images/no_image.jpg';"/>
                                </a>
                                <div style="width:100%;height:auto;padding:10px;">
                                    <h5>
                                        <?php echo $folder['folder_name'];?>
                                    </h5>
                                    <p style="word-wrap: break-word;">
                                        <?php echo $folder['folder_description'];?>
                                    </p>
                                </div>
                                <div style="width:100%;height:auto;position:relative;bottom:0px;background:#<?php echo $folder['section_color'];?>;text-align:center;line-height:40px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://my.eveedo.com/folder.php?t=<?php echo $folder['folder_token'];?>" target="_blank"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-facebook-square fa-lg"></span></a> &nbsp;
                                    <a href="https://twitter.com/intent/tweet?text=%20Check%20out%20this%20awesome%20content,%20Found%20it%20on%20Eveedo:%20folder.php?t=https://my.eveedo.com/folder.php?t=<?php echo $folder['folder_token'];?>" target="_blank"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-twitter-square fa-lg"></span></a> &nbsp;
                                    <a href="//pinterest.com/pin/create/link/?url=https://my.eveedo.com/folder.php?t=<?php echo $folder['folder_token'];?>&media=https://my.eveedo.com/<?php echo $folder['folder_image'];?>&description=<?php echo $folder['folder_description'];?>" target="_blank"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-pinterest-square fa-lg"></span></a>
                                    <?php 
                                if($folder['owner_ecn']==$_COOKIE['ecn']){
                                    ?> &nbsp;
                                    <a href="edit.folder.php?t=<?php echo $folder['folder_token'];?>"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-edit fa-lg"></span></a>
                                    <?php
                                }
                                    ?>
                                    <?php 
                                if(isset($_COOKIE['ecn'])){
                                    ?> &nbsp;
                                    <span onclick="$('#save-<?php echo $folder['folder_token'];?>-to-folder').show();" style="cursor:pointer;color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-save fa-lg"></span>
                                    <?php
                                }
                                    ?>
                                    &nbsp;
                                    <a target="_blank" href="https://my.eveedo.com/folder.php?t=<?php echo $folder['folder_token'];?>"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-chevron-circle-right fa-lg"></span></a>
                                </div>
                                <div id="save-<?php echo $folder['folder_token'];?>-to-folder" style="display:none;position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:9999;">
                                    <table width="100%" height="100%">
                                        <tr>
                                            <td valign="middle" align="center">
                                                <table width="100%" height="100%">
                                                    <tr>
                                                        <td valign="middle" align="center">
                                                            <div class="container">
                                                                <div class="row" style="background:#f2f2f2;padding:10px;border:1px solid #cccccc;">
                                                                    <h4 class="col-md-12">Select where you wish to save item to.<span onclick="$('#save-<?php echo $folder['folder_token'];?>-to-folder').hide();" style="float:right;cursor:pointer;" class="fa fa-close fa-lg"></span></h4>
                                                                    <?php
                                $qsfolders = "SELECT * FROM `folders` WHERE `owner_ecn`='$ecn' ORDER by `parent_folder` ASC, `folder_name` ASC";
                                $rsfolders = $connect->query($qsfolders);
                                while($sfolder = mysqli_fetch_array($rsfolders)){
                                                                    ?>
                                                                    <div class="col-md-3">
                                                                        <a href="save.folder.to.folder.php?of=<?php echo $folder['folder_token'];?>&nf=<?php echo $sfolder['folder_token'];?>">
                                                                            <?php echo $sfolder['folder_name'];?>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </article>
                            <?php
                            }
                            ?>
                            <?php
                            include ("inc.config.php");
                            $qitems = "SELECT * FROM `folder_items` WHERE MATCH(tags,item_name,item_description) AGAINST ('+$q' IN BOOLEAN MODE) AND `privacy`='Public' ORDER BY `created` DESC LIMIT 24";
                            $ritems = $connect->query($qitems);
                            while ($item = mysqli_fetch_array($ritems)){
                            ?>
                            <article class="white-panel" style="width:100%;border:1px solid #<?php echo $item['section_color'];?>">
                                <div style="background:#<?php echo $item['section_color'];?>;color:#f2f2f2;padding:5px;width:100%;"><img style="height:20px;width:20px;line-height:24px;" src="<?php echo $item['section_image'];?>"/>&nbsp;
                                    <?php echo $item['section'];?>
                                </div>
                                <a href="<?php echo $item['item_url'];?>" target="_blank">
                                    <img src="<?php echo $item['item_icon'];?>" style="width:100%;" onerror="if (this.src != '/images/no_image.jpg') this.src = '/images/no_image.jpg';"/>
                                </a>
                                <div style="width:100%;height:auto;padding:10px;">
                                    <h5>
                                        <?php echo $item['item_name'];?>
                                    </h5>
                                    <p style="word-wrap: break-word;">
                                        <?php echo $item['item_description'];?>
                                    </p>
                                </div>
                                <div style="width:100%;height:auto;position:relative;bottom:0px;background:#<?php echo $item['section_color'];?>;text-align:center;line-height:40px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $item['item_url'];?>" target="_blank"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-facebook-square fa-lg"></span></a> &nbsp;
                                    <a href="https://twitter.com/intent/tweet?text=%20Check%20out%20this%20awesome%20content,%20Found%20it%20on%20Eveedo:%20<?php echo $item['item_url'];?>" target="_blank"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-twitter-square fa-lg"></span></a> &nbsp;
                                    <a href="//pinterest.com/pin/create/link/?url=<?php echo $item['item_url'];?>&media=<?php echo $item['item_icon'];?>&description=<?php echo $item['item_description'];?>" target="_blank"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-pinterest-square fa-lg"></span></a>
                                    <?php 
                                if($item['ecn']==$_COOKIE['ecn']){
                                    ?> &nbsp;
                                    <a href="edit.item.php?t=<?php echo $item['item_token'];?>"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-edit fa-lg"></span></a>
                                    <?php
                                }
                                    ?>
                                    <?php 
                                if(isset($_COOKIE['ecn'])){
                                    ?> &nbsp;
                                    <span onclick="$('#save-<?php echo $item['item_token'];?>-to-folder').show();" style="cursor:pointer;color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-save fa-lg"></span>
                                    <?php
                                }
                                    ?>
                                    &nbsp;
                                    <a target="_blank" href="<?php echo $item['item_url'];?>"><span style="color:#f2f2f2;font-size:28px;line-height:40px;" class="fa fa-chevron-circle-right fa-lg"></span></a>
                                </div>
                                <div id="save-<?php echo $item['item_token'];?>-to-folder" style="display:none;position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:9999;">
                                    <table width="100%" height="100%">
                                        <tr>
                                            <td valign="middle" align="center">
                                                <table width="100%" height="100%">
                                                    <tr>
                                                        <td valign="middle" align="center">
                                                            <div class="container">
                                                                <div class="row" style="background:#f2f2f2;padding:10px;border:1px solid #cccccc;">
                                                                    <h4 class="col-md-12">Select where you wish to save item to.<span onclick="$('#save-<?php echo $item['item_token'];?>-to-folder').hide();" style="float:right;cursor:pointer;" class="fa fa-close fa-lg"></span></h4>
                                                                    <?php
                                $qsfolders = "SELECT * FROM `folders` WHERE `owner_ecn`='$ecn' ORDER by `parent_folder` ASC, `folder_name` ASC";
                                $rsfolders = $connect->query($qsfolders);
                                while($sfolder = mysqli_fetch_array($rsfolders)){
                                                                    ?>
                                                                    <div class="col-md-3">
                                                                        <a href="save.item.to.folder.php?i=<?php echo $item['item_token'];?>&f=<?php echo $sfolder['folder_token'];?>">
                                                                            <?php echo $sfolder['folder_name'];?>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </article>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                </div>
            </div>
        </div>
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
            ;
            (function($, window, document, undefined) {
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
                    this.options = $.extend({}, defaults, options);
                    this._defaults = defaults;
                    this._name = pluginName;
                    this.init();
                }

                Plugin.prototype.init = function() {
                    var self = this,
                        resize_finish;

                    $(window).resize(function() {
                        clearTimeout(resize_finish);
                        resize_finish = setTimeout(function() {
                            self.make_layout_change(self);
                        }, 11);
                    });

                    self.make_layout_change(self);

                    setTimeout(function() {
                        $(window).resize();
                    }, 500);
                };

                Plugin.prototype.calculate = function(single_column_mode) {
                    var self = this,
                        tallest = 0,
                        row = 0,
                        $container = $(this.element),
                        container_width = $container.width();
                    $article = $(this.element).children();

                    if (single_column_mode === true) {
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

                        if (single_column_mode === false) {
                            current_column = (index % columns);
                        } else {
                            current_column = 0;
                        }

                        for (var t = 0; t < columns; t++) {
                            $this.removeClass('c' + t);
                        }

                        if (index % columns === 0) {
                            row++;
                        }

                        $this.addClass('c' + current_column);
                        $this.addClass('r' + row);

                        prevAll.each(function(index) {
                            if ($(this).hasClass('c' + current_column)) {
                                top += $(this).outerHeight() + self.options.padding_y;
                            }
                        });

                        if (single_column_mode === true) {
                            left_out = 0;
                        } else {
                            left_out = (index % columns) * (article_width + self.options.padding_x);
                        }

                        $this.css({
                            'left': left_out,
                            'top': top
                        });
                    });

                    this.tallest($container);
                    $(window).resize();
                };

                Plugin.prototype.tallest = function(_container) {
                    var column_heights = [],
                        largest = 0;

                    for (var z = 0; z < columns; z++) {
                        var temp_height = 0;
                        _container.find('.c' + z).each(function() {
                            temp_height += $(this).outerHeight();
                        });
                        column_heights[z] = temp_height;
                    }

                    largest = Math.max.apply(Math, column_heights);
                    _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
                };

                Plugin.prototype.make_layout_change = function(_self) {
                    if ($(window).width() < _self.options.single_column_breakpoint) {
                        _self.calculate(true);
                    } else {
                        _self.calculate(false);
                    }
                };

                $.fn[pluginName] = function(options) {
                    return this.each(function() {
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