<?php
ini_set('display_errors', '1');
session_start();
$ecn = $_COOKIE['ecn'];
$target_dir = "../avatars/";
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
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$newfile = strtoupper(md5(time())).TokenGen(50).".".$imageFileType;
//$target_file = $target_dir . $newfile;
// Allow certain file formats
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfile)) {
        //echo "The file ". $newfile. " has been uploaded.";
$image = "../avatars/".$newfile; // the image to crop
$dest_image = "../avatars/t_".$ecn.".".$imageFileType; // make sure the directory is writeable

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
    $thumbSize = min(350,350);
    $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
    imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

    //unlink($imgSrc);
    imagejpeg($thumb,$imgSrc);
    //@imagedestroy($myImage);
    //@imagedestroy($thumb);
}
        crop_img($image);
        include("config.php");
        $image = str_replace("../","/",$image);
        $connect->query("UPDATE `users` SET `avatar`='$image' WHERE `ecn`='$ecn'");
        $cookie_name = "avatar";
        $cookie_value = "$image";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        $_SESSION['avatar_changed']="true";
        ?>
        <script>window.location="../profile";</script>
        <?php
        
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
?>