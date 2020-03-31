# PicCuter
PHP九宫格分图(将一张图分成9张，并保存)
# PicCuter->set_save_dir(dir)
设置9张图片保存的文件夹(相对路径),默认为当前文件夹
# PicCuter->cut_picture($src_path,$width)
$src_path:图片地址(本地图片，网络图片无效)
$width:裁剪后单张图片的宽默认为250px 高度会按原图比例自适应
