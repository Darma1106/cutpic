<?php
// $src_path = 'Files/19/10/09/15706428531630.JPG';
$imgfpixel = 250;
$ar =  explode('/', $src_path);
$name = end($ar);
    static $num = 1;
    $ext = pathinfo($name)['extension'];
    $filename = pathinfo($name)['filename'];
    $img_info = getimagesize($src_path);
    //裁剪区域的宽和高
    $width = $img_info[0]/3;
    $height = $img_info[1]/3;
    $src = imagecreatefromstring(file_get_contents($src_path));
    //将裁剪区域复制到新图片上，并根据源和目标的宽高进行缩放或者拉升
    $new_image = imagecreatetruecolor($imgfpixel, $imgfpixel);
    for ($y=0; $y <3 ; $y++) { 
    for ($x=0; $x <3 ; $x++) { 
        $new_x = $x*$img_info[0]/3;
        $new_y = $y*$img_info[1]/3;   
    imagecopyresampled($new_image, $src, 0, 0, $new_x, $new_y, $imgfpixel, $imgfpixel, $width, $height);
    //保存图片
    imagejpeg($new_image,$filename.'_'.$num.'.'.$ext);
        $num ++;
}
}
imagedestroy($src);
imagedestroy($new_image);
?>