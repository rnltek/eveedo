<?php
ini_set('display_errors', '1');
session_start();
$ecn = $_COOKIE['ecn'];
$token = $_POST['folder'];
$item_name = $_POST['item_name'];
$item_description = $_POST['item_description'];
$tags = $_POST['tags'];
$privacy = $_POST['privacy'];

$target_dir = "../user/".$ecn."/";
function TokenGen($len){
    $result = "";
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
        $randItem = array_rand($charArray);
        $result .= "".$charArray[$randItem];
    }
    return $result;
}
$uploadOk = 1;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$itemType = pathinfo($target_file,PATHINFO_EXTENSION);
$newfile = strtoupper(md5(time())).TokenGen(50).".".$itemType;
//$target_file = $target_dir . $newfile;
// Allow certain file formats
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfile)) {
        //echo "The file ". $newfile. " has been uploaded.";
$item = "../user/".$ecn."/".$newfile; // the image to crop
$dest_item = "../user/".$ecn."/F_".$newfile; // make sure the directory is writeable
$item_size = filesize($item);
function crop_img($imgSrc){
    //getting the image dimensions
    list($width, $height) = getimagesize($imgSrc);

    //saving the image into memory (for manipulation with GD Library)
    $myImage = imagecreatefromjpeg($imgSrc);

    // calculating the part of the image to use for thumbnail
    if ($width > $height) {
        $y = 0;
        $x = ($width - $height) / 2;
        $smallestSide = $height;
    } else {
        $x = 0;
        $y = ($height - $width) / 2;
        $smallestSide = $width;
    }

    // copying the part into thumbnail
    $thumbSize = min(300,300);
    $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
    imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

    //unlink($imgSrc);
    imagejpeg($thumb,$imgSrc);
    //@imagedestroy($myImage);
    //@imagedestroy($thumb);
}
//        crop_img($image);
        include("../inc.config.php");
        $item_token = strtoupper(md5(time())).TokenGen(50);
        $item = str_replace("../","/",$item);
        $item_icon="";
        $item_icon="/images/no_image.jpg";
        if($itemType=="jpg"){$item_icon=$item;}
        if($itemType=="jpeg"){$item_icon=$item;}
        if($itemType=="gif"){$item_icon=$item;}
        if($itemType=="png"){$item_icon=$item;}
        
$section = $_POST['section'];
$section_image = $_POST['section_image'];
$section_color = $_POST['section_color'];
        
        $connect->query("INSERT INTO  `folder_items` (`ecn`,`folder`,`item_name`,`item_description`,`item_type`,`item_token`,`item_url`,`item_icon`,`privacy`,`item_size`,`tags`,`section`,`section_image`,`section_color`) VALUES('$ecn','$token','$item_name','$item_description','$itemType','$item_token','$item','$item_icon','$privacy','$item_size','$tags','".$section."','".$section_image."','".$section_color."')");
        ?>
        <script>window.location="../folder.php?t=<?php echo $token;?>";</script>
        <?php
        
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
?>