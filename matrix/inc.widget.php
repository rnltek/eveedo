<?php
include("../../inc.config.php");
$qitems = "SELECT * FROM `matrix` WHERE `token`='".$_GET['t']."'";
$ritems = $connect->query($qitems);
$item = mysqli_fetch_array($ritems);
if($item['source']=="CNN US"){$source_icon = "/images/cnn_us.png";}
if($item['source']=="BBC UK"){$source_icon = "/images/bbc.png";}
if($item['source']=="New York Times US"){$source_icon = "/images/nyt.png";}
if($item['source']=="Fox News US"){$source_icon = "/images/foxnews.png";}
if($item['source']=="ABC News US"){$source_icon = "/images/abcnews.png";}
if($item['section']=="Music"){$source_icon = "/images/music.png";}
if($item['section']=="Education"){$source_icon = "/images/education.png";}
if($item['section']=="Science"){$source_icon = "/images/science.png";}
if($item['section']=="Space"){$source_icon = "/images/space.png";}
if($item['section']=="Health"){$source_icon = "/images/health.png";}
if($item['section']=="Travel"){$source_icon = "/images/travel.png";}
if($item['section']=="Sports"){$source_icon = "/images/sports.png";}
if($item['section']=="Fashion"){$source_icon = "/images/fashion.png";}
if($item['section']=="Videos"){$source_icon = "/images/videos.png";}
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
    <p align="left" style="color:#999999;padding:10px;font-size:11px;padding-bottom:0px;"><?php echo $item['tags'];?></p>
</article>
