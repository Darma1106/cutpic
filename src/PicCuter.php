<?php
class PicCuter{
//保存图片的文件夹，默认当前文件夹
protected $save_dir;
//扩展名
protected $ext;
//文件名
protected $filename;
//图片的长宽
protected $img_info;
//切割后单个图片的长宽，默认250px
protected $imgfpixel;
public function set_save_dir($dir = ''){
    $this->save_dir = $dir;
}
public function cut_picture($src_path,$fpixel = 250){
    //end()要传递一个定义的变量，不然会报警告
    //name为图片文件的名字
    $ar = explode('/', $src_path);
    $name = end($ar);
    $this->imgfpixel = $fpixel;
    $this->ext = pathinfo($name)['extension'];
    $this->filename = pathinfo($name)['filename'];
    $this->img_info = getimagesize($src_path);
    $ans = $this->cut($src_path);
    return $ans;
}
private function cut($src_path){
    $num = 1;
    $pic_src = array();
    $width = $this->img_info[0]/3;
    $height = $this->img_info[1]/3;
    $fpx = $this->imgfpixel;
    // echo $this->imgfpixel;
    $src = imagecreatefromstring(file_get_contents($src_path));
    //将裁剪区域复制到新图片上，并根据源和目标的宽高进行缩放或者拉升
    $new_image = imagecreatetruecolor($fpx, $fpx);
    for ($y=0; $y <3 ; $y++) { 
    for ($x=0; $x <3 ; $x++) { 
        $new_x = $x*$width;
        $new_y = $y*$height;   
    imagecopyresampled($new_image, $src, 0, 0, $new_x, $new_y, $this->imgfpixel, $this->imgfpixel, $width, $height);
    //记录分割的图片
    $p_src = $this->save_dir.'/'.$this->filename.'_'.$num.'.'.$this->ext;
    //保存图片
    imagejpeg($new_image,$p_src);
    array_push($pic_src,$p_src);
        $num ++;
}
}
    //关闭图片文件
    imagedestroy($src);
    imagedestroy($new_image);
    return $pic_src;
}
}
?>