<?php
include '../config.php';
libxml_use_internal_errors(true);

// CNN News
$url = "http://rss.cnn.com/rss/edition.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = $xml->channel->item[$i]->description;
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "CNN";
    $category = "News - World Headlines";
    $icon = $app_url.'img/cnn-icon.jpg';

 
    
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','$description','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// BBC News
$url = "http://feeds.bbci.co.uk/news/world/rss.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = $xml->channel->item[$i]->description;
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "BBC";
    $category = "News - World Headlines";
    $icon = $app_url.'img/bbc-icon.jpg';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','$description','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// TechCrunch
$url = "http://feeds.feedburner.com/TechCrunch/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "TechCrunch";
    $category = "News - Technology";
    $icon = $app_url.'img/techcrunch-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// ABC News
$url = "http://feeds.abcnews.com/abcnews/internationalheadlines";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "ABCNEWS";
    $category = "News - World Headlines";
    $icon = $app_url.'img/abcnews-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Wired
$url = "https://www.wired.com/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Wired";
    $category = "News - Technology";
    $icon = $app_url.'img/wired-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// ESPN
$url = "http://www.espn.com/espn/rss/news";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "ESPN";
    $category = "Sports";
    $icon = $app_url.'img/espn-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Aljazeera
$url = "http://www.aljazeera.com/xml/rss/all.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "ALJAZEERA";
    $category = "News - World Headlines";
    $icon = $app_url.'img/aljazeera-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Mashable
$url = "http://feeds.feedburner.com/Mashable";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Mashable";
    $category = "Pop Culture";
    $icon = $app_url.'img/mashable-icon.jpg';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Lifehacker
$url = "http://feeds.gawker.com/lifehacker/full";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Life Hacker";
    $category = "Lifestyle";
    $icon = $app_url.'img/lifehacker-icon.jpg';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Venture Beat
$url = "http://feeds.feedburner.com/venturebeat/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Venture Beat";
    $category = "Financial";
    $icon = $app_url.'img/venturebeat-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Outdoor News Daily
$url = "http://outdoornewsdaily.com/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Outdoor News Daily";
    $category = "Outdoors";
    $icon = $app_url.'img/outdoor-news-daily-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Outdoor News Daily
$url = "http://outdoornewsdaily.com/category/hunting-news/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Outdoor News Daily";
    $category = "Hunting";
    $icon = $app_url.'img/outdoor-news-daily-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Outdoor News Daily
$url = "http://outdoornewsdaily.com/category/boating-news/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Outdoor News Daily";
    $category = "Boating";
    $icon = $app_url.'img/outdoor-news-daily-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Outdoor News Daily
$url = "http://outdoornewsdaily.com/category/fishing-news/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Outdoor News Daily";
    $category = "Fishing";
    $icon = $app_url.'img/outdoor-news-daily-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Outdoor News Daily
$url = "http://outdoornewsdaily.com/category/recreation-news/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Outdoor News Daily";
    $category = "Recreation";
    $icon = $app_url.'img/outdoor-news-daily-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Outdoor News Daily
$url = "http://outdoornewsdaily.com/category/shooting-news/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Outdoor News Daily";
    $category = "Shooting";
    $icon = $app_url.'img/outdoor-news-daily-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Professional Bowlers Association
$url = "http://feeds.feedburner.com/ProfessionalBowlersAssociationNews";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Professional Bowlers Association";
    $category = "Bowling";
    $icon = $app_url.'img/pba-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// Elle
$url = "http://www.elle.com/rss/fashion.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Elle";
    $category = "Fashion";
    $icon = $app_url.'img/elle-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// WWD
$url = "http://wwd.com/custom-feed/fashion/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "WWD";
    $category = "Fashion";
    $icon = $app_url.'img/wwd-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// InStyle
$url = "http://www.instyle.co.uk/fashion/news.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "InStyle Fashion News";
    $category = "Fashion";
    $icon = $app_url.'img/instyle-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Hollywood Reprter
$url = "http://feeds.feedburner.com/thr/labor";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "The Hollywood Reporter";
    $category = "Acting";
    $icon = $app_url.'img/hollywoodreporter-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}



// MoMA
$url = "https://www.moma.org/feeds/exhibitions.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "MoMA";
    $category = "Art";
    $icon = $app_url.'img/moma-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// MoMA
$url = "http://www.moma.org/feeds/today_at_moma.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "MoMA";
    $category = "Art";
    $icon = $app_url.'img/moma-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// MoMA
$url = "http://www.moma.org/feeds/filmexhibitions.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "MoMA";
    $category = "Art";
    $icon = $app_url.'img/moma-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// MoMA
$url = "http://www.moma.org/feeds/inside_out.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "MoMA";
    $category = "Art";
    $icon = $app_url.'img/moma-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Astrology.com
$url = "https://www.horoscope.com/us/horoscopes/general/horoscope-general-daily-rss.aspx";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Astrology.com";
    $category = "Astrology";
    $icon = $app_url.'img/horoscope-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}



// NASA
$url = "https://www.nasa.gov/rss/dyn/breaking_news.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "NASA";
    $category = "Astronomy";
    $icon = $app_url.'img/nasa-icon.jpg';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}




// NASA
$url = "https://www.nasa.gov/rss/dyn/earth.rss";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "NASA";
    $category = "Astronomy";
    $icon = $app_url.'img/nasa-icon.jpg';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Blog Basics
$url = "http://feeds.feedburner.com/BlogBasics";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Blog Basics";
    $category = "Blogging";
    $icon = $app_url.'img/blogging-icon.png';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Craft Stylish
$url = "http://www.craftstylish.com//feeds/rss/all.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Craft Stylish";
    $category = "Crafts";
    $icon = $app_url.'img/craftstylish-icon.jpg';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// Make
$url = "http://makezine.com/category/craft/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "Make.com";
    $category = "Crafts";
    $icon = $app_url.'img/make-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Dance
$url = "http://www.prweb.com/rss2/9912dance.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Dance";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Books
$url = "http://www.prweb.com/rss2/artbooks.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Books";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Art
$url = "http://www.prweb.com/rss2/fineart.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Art";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Education
$url = "http://www.prweb.com/rss2/education.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Education";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Entertainment
$url = "http://www.prweb.com/rss2/entertainment.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Entertainment";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Movies
$url = "http://www.prweb.com/rss2/aemovies.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Movies/Theater";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Astronomy
$url = "http://www.prweb.com/rss2/sciastr.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Astronomy";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Music
$url = "http://www.prweb.com/rss2/music.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Music";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Photography
$url = "http://www.prweb.com/rss2/9914photography.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Photography";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Video Games
$url = "http://www.prweb.com/rss2/aevideogames.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Video Games";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Internet
$url = "http://www.prweb.com/rss2/aewebsites.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Internet";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Technology
$url = "http://www.prweb.com/rss2/technology.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Technology";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Travel
$url = "http://www.prweb.com/rss2/businesstravel.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Travel";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Fashion
$url = "http://www.prweb.com/rss2/lsfashion.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Fashion";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Fitness
$url = "http://www.prweb.com/rss2/lshealthfitness.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Fitness";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Religion
$url = "http://www.prweb.com/rss2/religionother.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Religion";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Programming
$url = "http://www.prweb.com/rss2/computerprogram.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Programming";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Financial
$url = "http://www.prweb.com/rss2/finance.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Financial";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Pets
$url = "http://www.prweb.com/rss2/9968pets.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Pets";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}



// PRWeb Outdoors
$url = "http://www.prweb.com/rss2/sportsoutdoors.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Outdoors";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Money
$url = "http://www.prweb.com/rss2/9964money.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Financial";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Food
$url = "http://www.prweb.com/rss2/indfood.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Food";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}



// PRWeb Food
$url = "http://www.prweb.com/rss2/foodsafety.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Food";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Blogging
$url = "http://www.prweb.com/rss2/blogging.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Blogging";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Gardening
$url = "http://www.prweb.com/rss2/landscapinggardening.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Gardening";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Health
$url = "http://www.prweb.com/rss2/medical.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Health";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Health
$url = "http://www.prweb.com/rss2/medaltmed.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Health";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Health
$url = "http://www.prweb.com/rss2/medcardiology.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Health";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Health
$url = "http://www.prweb.com/rss2/medgeneral.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Health";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Health
$url = "http://www.prweb.com/rss2/medfamily.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Health";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Health
$url = "http://www.prweb.com/rss2/meddisease.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Health";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Home Decor
$url = "http://www.prweb.com/rss2/homeinteriors.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Home Decor";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}

// PRWeb Lifestyle
$url = "http://www.prweb.com/rss2/lifestyle.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Lifestyle";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Sports
$url = "http://www.prweb.com/rss2/sports.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Sports";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Sports
$url = "http://www.prweb.com/rss2/sportsbaseball.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Sports";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


// PRWeb Sports
$url = "http://www.prweb.com/rss2/sportsbasketball.xml";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = strip_tags($xml->channel->item[$i]->description);
    $pubDate = $xml->channel->item[$i]->pubDate;
    $source = "PRWeb";
    $category = "Sports";
    $icon = $app_url.'img/prweb-icon.gif';
    if($link>'0'){
        $qtest = "SELECT * FROM `vetted_links` WHERE `link`='$link'";
        $rtest = $EveedoMatrix->query($qtest);
        $exists = mysqli_num_rows($rtest);
        if($exists==0){
            $pubdate=date("Y/m/d h:m:s A",strtotime($pubDate));
            $EveedoMatrix->query("INSERT INTO `vetted_links` (`link`,`category`,`title`,`description`,`source`,`icon`,`pubdate`) VALUES('$link','$category','$title','".$description."','$source','$icon','".mysqli_real_escape_string($EveedoMatrix,$pubdate)."')");
        }
    }
}


?>