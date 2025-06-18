<?php
// enkele ssettings ophalen zoals het MASTERPATH
require "../classes/settings.php";
if ($_FILES["file"]["name"]) {
    if (!$_FILES["file"]["error"]) {
        $source = $_FILES["file"]["tmp_name"];
        $info = getimagesize($source);
        if ($info["mime"] == "image/jpeg") {
            $image = imagecreatefromjpeg($source);
        } elseif ($info["mime"] == "image/gif") {
            $image = imagecreatefromgif($source);
        } elseif ($info["mime"] == "image/png") {
            $image = imagecreatefrompng($source);
        }
        $maxw = 1000;
        $maxh = 1000;
        if ($maxw >= $info[0] && $maxh >= $info[1]) {
            $ratio = 1;
        } elseif ($info[0] > $info[1]) {
            $ratio = $maxw / $info[0];
        } else {
            $ratio = $maxh / $info[1];
        }
        $thumb_width = round($info[0] * $ratio);
        $thumb_height = round($info[1] * $ratio);
        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled(
            $thumb,
            $image,
            0,
            0,
            0,
            0,
            $thumb_width,
            $thumb_height,
            $info[0],
            $info[1]
        );
        $name = md5(rand(100, 500));
        $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $filename = $name . "." . $ext;
        imagejpeg($thumb, "../../images/" . $filename, 75);
        $imagePath =
            "http://" . $_SERVER["HTTP_HOST"] . "/" . MASTERPATH . "/images/";
        echo $imagePath . $filename; //change this URL*/
    } else {
        echo $message =
            'Ooops! Your upload triggered the following error:
' . $_FILES["file"]["error"];
    }
}
?>
