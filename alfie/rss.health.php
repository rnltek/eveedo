<?php
$url = "https://www.healthcanal.com/blood-heart-circulation/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `folder_items` WHERE `item_url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `folder_items` (`item_token`,`item_url`,`item_name`,`item_description`,`item_icon`,`tags`,`section`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$tags)."','$section');");
            }
        }
    }
}
$url = "https://www.healthcanal.com/bones-muscles/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `matrix` WHERE `url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `matrix` (`token`,`source`,`origin`,`url`,`title`,`description`,`image`,`published`,`pubdate`,`tags`,`pubdatemonth`,`pubdateday`,`pubdateyear`,`section`,`pubdatehour`,`pubdateminute`,`pubdatesecond`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$source)."','".mysqli_real_escape_string($connect,$origin)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$published)."','".$pubDate."','".mysqli_real_escape_string($connect,$tags)."','$pubdatemonth','$pubdateday','$pubdateyear','$section','$pubdatehour','$pubdateminute','$pubdatesecond');");
            }
        }
    }
}
$url = "https://www.healthcanal.com/child-health/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `matrix` WHERE `url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `matrix` (`token`,`source`,`origin`,`url`,`title`,`description`,`image`,`published`,`pubdate`,`tags`,`pubdatemonth`,`pubdateday`,`pubdateyear`,`section`,`pubdatehour`,`pubdateminute`,`pubdatesecond`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$source)."','".mysqli_real_escape_string($connect,$origin)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$published)."','".$pubDate."','".mysqli_real_escape_string($connect,$tags)."','$pubdatemonth','$pubdateday','$pubdateyear','$section','$pubdatehour','$pubdateminute','$pubdatesecond');");
            }
        }
    }
}
$url = "https://www.healthcanal.com/disorders-conditions/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `matrix` WHERE `url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `matrix` (`token`,`source`,`origin`,`url`,`title`,`description`,`image`,`published`,`pubdate`,`tags`,`pubdatemonth`,`pubdateday`,`pubdateyear`,`section`,`pubdatehour`,`pubdateminute`,`pubdatesecond`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$source)."','".mysqli_real_escape_string($connect,$origin)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$published)."','".$pubDate."','".mysqli_real_escape_string($connect,$tags)."','$pubdatemonth','$pubdateday','$pubdateyear','$section','$pubdatehour','$pubdateminute','$pubdatesecond');");
            }
        }
    }
}
$url = "https://www.healthcanal.com/health-informatics/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `matrix` WHERE `url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `matrix` (`token`,`source`,`origin`,`url`,`title`,`description`,`image`,`published`,`pubdate`,`tags`,`pubdatemonth`,`pubdateday`,`pubdateyear`,`section`,`pubdatehour`,`pubdateminute`,`pubdatesecond`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$source)."','".mysqli_real_escape_string($connect,$origin)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$published)."','".$pubDate."','".mysqli_real_escape_string($connect,$tags)."','$pubdatemonth','$pubdateday','$pubdateyear','$section','$pubdatehour','$pubdateminute','$pubdatesecond');");
            }
        }
    }
}
$url = "https://www.healthcanal.com/life-style-fitness/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `matrix` WHERE `url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `matrix` (`token`,`source`,`origin`,`url`,`title`,`description`,`image`,`published`,`pubdate`,`tags`,`pubdatemonth`,`pubdateday`,`pubdateyear`,`section`,`pubdatehour`,`pubdateminute`,`pubdatesecond`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$source)."','".mysqli_real_escape_string($connect,$origin)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$published)."','".$pubDate."','".mysqli_real_escape_string($connect,$tags)."','$pubdatemonth','$pubdateday','$pubdateyear','$section','$pubdatehour','$pubdateminute','$pubdatesecond');");
            }
        }
    }
}
$url = "https://www.healthcanal.com/lungs-breathing/feed/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 50; $i++){
    if(@$xml->channel->item[$i]->title>'0'){
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        $pubdate=date("Y/m/d h:m:j A",strtotime($pubDate));
        $pubdatemonth = date("m",strtotime($pubDate));
        $pubdateday = date("d",strtotime($pubDate));
        $pubdateyear = date("Y",strtotime($pubDate));
        $pubdatehour = date("h",strtotime($pubDate));
        $pubdateminute = date("m",strtotime($pubDate));
        $pubdatesecond = date("j",strtotime($pubDate));
        $source = "Health";
        $og = fetch_og($link);
        if(@$og['title']>'0'){
            $title = @$og['title'];
            $description = @$og['description'];
            $tags = eveedo_keywords($description);
            $image = @$og['image'];
            $url = $link;
            $origin = "US";
            $published = "1";
            $section = "Health";
            $token = "N".strtoupper(md5(time())).TokenGen(50);
            $qtest = "SELECT * FROM `matrix` WHERE `url`='".$url."'";
            $rtest = $connect->query($qtest);
            $test = mysqli_num_rows($rtest);
            if($test==0){
                $connect->query("INSERT INTO `matrix` (`token`,`source`,`origin`,`url`,`title`,`description`,`image`,`published`,`pubdate`,`tags`,`pubdatemonth`,`pubdateday`,`pubdateyear`,`section`,`pubdatehour`,`pubdateminute`,`pubdatesecond`) VALUES('".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$source)."','".mysqli_real_escape_string($connect,$origin)."','".mysqli_real_escape_string($connect,$url)."','".mysqli_real_escape_string($connect,$title)."','".mysqli_real_escape_string($connect,$description)."','".mysqli_real_escape_string($connect,$image)."','".mysqli_real_escape_string($connect,$published)."','".$pubDate."','".mysqli_real_escape_string($connect,$tags)."','$pubdatemonth','$pubdateday','$pubdateyear','$section','$pubdatehour','$pubdateminute','$pubdatesecond');");
            }
        }
    }
}
?>