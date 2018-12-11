<?php
ini_set('display_errors', '1');
session_start();
$ecn = $_COOKIE['ecn'];
$token = $_POST['folder'];

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
$dest_item = "../user/".$ecn."/t_".$newfile; // make sure the directory is writeable
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
        if($itemType=="jpg"){$item_icon=$item;}
        if($itemType=="jpeg"){$item_icon=$item;}
        if($itemType=="gif"){$item_icon=$item;}
        if($itemType=="png"){$item_icon=$item;}
        if($itemType=="msi"){$item_icon="/img/icon-msi.png";}
        if($itemType=="exe"){$item_icon="/img/icon-exe.png";}
        if($itemType=="rar"){$item_icon="/img/icon-rar.png";}
        if($itemType=="zip"){$item_icon="/img/icon-zip.png";}
        
        
        $connect->query("UPDATE `folders` SET `folder_image`='$item' WHERE `folder_token`='$token'");
        ?>
        <script>window.location="../edit.folder.php?t=<?php echo $token;?>";</script>
        <?php
        
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
?>