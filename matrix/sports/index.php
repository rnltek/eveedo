<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/" />
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eveedo</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="/css/font-awesome.css" rel="stylesheet">
        <link href="/css/animate.css" rel="stylesheet">
        <link href="/css/pace.css" rel="stylesheet">
        <link href="/css/pnotify.css" rel="stylesheet">
        <link href="/css/bootstrap-theme.css" rel="stylesheet">
        <link href="/css/colors.css" rel="stylesheet">
        <link href="/css/eveedo.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" style="height:100%;">
            <div class="row" style="margin-bottom:0px;position:fixed;top:0px;width:100%;z-index:9;">
                <div class="col-md-11 col-xs-10" style="height:42px;background:#d2d2d2;line-height:40px;padding-left:25px;"><img src="logo.png" style="width:120px;"/>

                </div>
                <div class="col-md-1 col-xs-2" style="background:#000000;height:42px;">

                </div>
            </div>
            <div class="row" style="height:100%;margin-top:-1px;">
                <div class="col-md-11 col-xs-10" style="padding-left:25px;padding-top:25px;">
                    <h1 style="color:#f2f2f2;">Sports</h1>
                    <section id="pinBoot">
                        <?php
                        include("../../inc.config.php");
                        $qitems = "SELECT * FROM `matrix` WHERE `section`='Sports' ORDER BY `pubdateyear` DESC,`pubdatemonth` DESC,`pubdateday` DESC,`pubdatehour` DESC,`pubdateminute` DESC LIMIT 0,24";
                        $ritems = $connect->query($qitems);
                        while($item = mysqli_fetch_array($ritems)){
                            $source_icon = "images/sports.png";
                        ?>
                        <article class="white-panel">
                            <p style="margin:0px;padding:0px;">
                                <img src="<?php echo $source_icon;?>" height="24" style="width:auto;height:24px;line-height:32px;margin:4px;"/>
                                <span style="float:right;padding-right:10px;">
                                    <a style="color:#3b5998;font-size:24px;line-height:32px;text-decoration:none;" class="fa fa-facebook-square fa-lg" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $item['url'];?>&t=<?php echo $item['url'];?>'); return false;"></a>
                                    <a style="color:#0084b4;font-size:24px;line-height:32px;text-decoration:none;" class="fa fa-twitter-square fa-lg" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Found%20it%20on%20Eveedo%20News' + <?php echo $item['title'];?> + ':%20 ' + <?php echo $item['url'];?>); return false;"></a>                                
                                </span>
                            </p>
                            <a href="<?php echo $item['url'];?>" target="_blank"><img src="<?php echo $item['image'];?>" alt=""></a>
                            <h5 style="padding-left:10px;margin-top:5px;margin-bottom:0px;"><a href="<?php echo $item['url'];?>" target="_blank"><?php echo $item['title'];?></a></h5>
                            <p style="padding:10px;margin:0px;padding-top:5px;"><?php echo $item['description'];?></p>
                        </article>
                        <?php
                        }
                        ?>
                    </section>
                </div>
                <div class="col-md-1 col-xs-2" style="background:#000000;height:100%;position:fixed;right:0px;z-index:10;">
                    <div id="sidebar" style="width:100%;">
                    <p align="center" style="padding-top:10px;">
                        <a href="/user"><img src="/images/home.png" width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/folders"><img src="/images/folder.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/news"><img src="/images/news.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/sports"><img src="/images/sports.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/music"><img src="/images/music.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/science"><img src="/images/science.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/space"><img src="/images/space.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/health"><img src="/images/health.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/education"><img src="/images/education.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    <p align="center" style="padding-top:10px;">
                        <a href="/matrix/travel"><img src="/images/travel.png"  width="90%" style="width:90%;height:auto;"/></a>
                    </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.slimscroll.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery-ui.min.js"></script>
        <script src="/js/bootstrap-tagsinput.min.js"></script>
        <script src="/js/jquery.fullscreen.js"></script>
        <script src="/js/pace.js"></script>
        <script src="/js/pnotify.js"></script>
        <!-- HTML5 Speech Recognition API -->
        <script>
$(function(){
    $('#sidebar').slimScroll({
        height: '100%'
    });
});            function startDictation() {

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