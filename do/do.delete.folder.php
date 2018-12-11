<?php
ini_set('display_errors', 0);
session_start();
include("../inc.config.php");
$token = $_GET['t'];
$qfolder1 = "SELECT * FROM `folders` WHERE `folder_token`='$token'";
$rfolder1 = $connect->query($qfolder1);
$folder1 = mysqli_fetch_array($rfolder1);
if($folder1['folder_image']<>'images/folder.png'){unlink("../".$folder1['folder_image']);}
if($folder1['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder1['folder_cover']);}
$token1 = $folder1['folder_token'];
$qfolder2 = "SELECT * FROM `folders` WHERE `parent_folder`='$token1'";
$rfolder2 = $connect->query($qfolder2);
$folder2 = mysqli_fetch_array($rfolder2);
if($folder2['folder_image']<>'images/folder.png'){unlink("../".$folder2['folder_image']);}
if($folder2['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder2['folder_cover']);}
$token2 = $folder2['folder_token'];
$qfolder3 = "SELECT * FROM `folders` WHERE `parent_folder`='$token2'";
$rfolder3 = $connect->query($qfolder3);
$folder3 = mysqli_fetch_array($rfolder3);
if($folder3['folder_image']<>'images/folder.png'){unlink("../".$folder3['folder_image']);}
if($folder3['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder3['folder_cover']);}
$token3 = $folder3['folder_token'];
$qfolder4 = "SELECT * FROM `folders` WHERE `parent_folder`='$token3'";
$rfolder4 = $connect->query($qfolder4);
$folder4 = mysqli_fetch_array($rfolder4);
if($folder4['folder_image']<>'images/folder.png'){unlink("../".$folder4['folder_image']);}
if($folder4['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder4['folder_cover']);}
$token4 = $folder4['folder_token'];
$qfolder5 = "SELECT * FROM `folders` WHERE `parent_folder`='$token4'";
$rfolder5 = $connect->query($qfolder5);
$folder5 = mysqli_fetch_array($rfolder5);
if($folder5['folder_image']<>'images/folder.png'){unlink("../".$folder5['folder_image']);}
if($folder5['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder5['folder_cover']);}
$token5 = $folder5['folder_token'];
$qfolder6 = "SELECT * FROM `folders` WHERE `parent_folder`='$token5'";
$rfolder6 = $connect->query($qfolder6);
$folder6 = mysqli_fetch_array($rfolder6);
if($folder6['folder_image']<>'images/folder.png'){unlink("../".$folder6['folder_image']);}
if($folder6['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder6['folder_cover']);}
$token6 = $folder6['folder_token'];
$qfolder7 = "SELECT * FROM `folders` WHERE `parent_folder`='$token6'";
$rfolder7 = $connect->query($qfolder7);
$folder7 = mysqli_fetch_array($rfolder7);
if($folder7['folder_image']<>'images/folder.png'){unlink("../".$folder7['folder_image']);}
if($folder7['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder7['folder_cover']);}
$token7 = $folder7['folder_token'];
$qfolder8 = "SELECT * FROM `folders` WHERE `parent_folder`='$token7'";
$rfolder8 = $connect->query($qfolder8);
$folder8 = mysqli_fetch_array($rfolder8);
if($folder8['folder_image']<>'images/folder.png'){unlink("../".$folder8['folder_image']);}
if($folder8['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder8['folder_cover']);}
$token8 = $folder8['folder_token'];
$qfolder9 = "SELECT * FROM `folders` WHERE `parent_folder`='$token8'";
$rfolder9 = $connect->query($qfolder9);
$folder9 = mysqli_fetch_array($rfolder9);
if($folder9['folder_image']<>'images/folder.png'){unlink("../".$folder9['folder_image']);}
if($folder9['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder9['folder_cover']);}
$token9 = $folder9['folder_token'];
$qfolder10 = "SELECT * FROM `folders` WHERE `parent_folder`='$token9'";
$rfolder10 = $connect->query($qfolder10);
$folder10 = mysqli_fetch_array($rfolder10);
if($folder10['folder_image']<>'images/folder.png'){unlink("../".$folder10['folder_image']);}
if($folder10['folder_image']<>'images/folder_cover.jpg'){unlink("../".$folder10['folder_cover']);}
$token10 = $folder10['folder_token'];
$qitems1 = "SELECT * FROM `folder_items` WHERE `folder`='$token1'";
$ritems1 = $connect->query($qitems1);
while($item1 = mysqli_fetch_array($ritems1)){
    if (strpos($item1['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item1['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token1'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token1'");
$qitems2 = "SELECT * FROM `folder_items` WHERE `folder`='$token2'";
$ritems2 = $connect->query($qitems2);
while($item2 = mysqli_fetch_array($ritems2)){
    if (strpos($item2['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item2['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token2'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token2'");
$qitems3 = "SELECT * FROM `folder_items` WHERE `folder`='$token3'";
$ritems3 = $connect->query($qitems3);
while($item3 = mysqli_fetch_array($ritems3)){
    if (strpos($item3['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item3['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token3'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token3'");
$qitems4 = "SELECT * FROM `folder_items` WHERE `folder`='$token2'";
$ritems4 = $connect->query($qitems4);
while($item4 = mysqli_fetch_array($ritems4)){
    if (strpos($item4['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item4['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token4'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token4'");
$qitems5 = "SELECT * FROM `folder_items` WHERE `folder`='$token5'";
$ritems5 = $connect->query($qitems5);
while($item5 = mysqli_fetch_array($ritems5)){
    if (strpos($item5['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item5['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token5'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token5'");
$qitems6 = "SELECT * FROM `folder_items` WHERE `folder`='$token6'";
$ritems6 = $connect->query($qitems6);
while($item6 = mysqli_fetch_array($ritems6)){
    if (strpos($item6['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item6['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token6'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token6'");
$qitems7 = "SELECT * FROM `folder_items` WHERE `folder`='$token7'";
$ritems7 = $connect->query($qitems7);
while($item7 = mysqli_fetch_array($ritems7)){
    if (strpos($item7['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item7['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token7'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token7'");
$qitems8 = "SELECT * FROM `folder_items` WHERE `folder`='$token8'";
$ritems8 = $connect->query($qitems8);
while($item8 = mysqli_fetch_array($ritems8)){
    if (strpos($item8['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item8['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token8'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token8'");
$qitems9 = "SELECT * FROM `folder_items` WHERE `folder`='$token9'";
$ritems9 = $connect->query($qitems9);
while($item9 = mysqli_fetch_array($ritems9)){
    if (strpos($item9['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item9['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token9'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token9'");
$qitems10 = "SELECT * FROM `folder_items` WHERE `folder`='$token10'";
$ritems10 = $connect->query($qitems10);
while($item10 = mysqli_fetch_array($ritems10)){
    if (strpos($item10['item_icon'], "/user/") !== false) {
        $itemdel = '../'.$item10['item_icon'];
        unlink($itemdel);
    }
}
$connect->query("DELETE FROM `folder_items` WHERE `folder`='$token10'");
$connect->query("DELETE FROM `folders` WHERE `folder_token`='$token10'");
?>
<script>
    window.location="../folders.php";
</script>