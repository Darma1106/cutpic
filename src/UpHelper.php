<?php
class UpHelper {
protected $flie_destination;
protected $dir;
public function save_upload_file(){
$flies = $this->format_upload_file();
// print_r($flies);
foreach ($flies as $flie) {
    if ($flie['error'] == 0) {
        if (is_uploaded_file($flie['tmp_name'])) {
            //  print_r(pathinfo($flie['name']));
            $destination = $this->dir.'/'.time().mt_rand(1,9999).'.'.pathinfo($flie['name'])['extension'];
            $this->flie_destination = $destination;
            move_uploaded_file($flie['tmp_name'], $destination);
        }
    }
}
}
private function format_upload_file():array{
    $this->makeDir();
    $flies = [];
foreach ($_FILES as $flied) {
    if (is_array($flied['name'])) {
        foreach ($flied['name'] as $id => $value) {
            $flies[] = [
                'name'=>$flied['name'][$id],
                'type'=>$flied['type'][$id],
                'tmp_name'=>$flied['tmp_name'][$id],
                'error'=>$flied['error'][$id],
                'size'=>$flied['size'][$id]
            ];
        }
       
    }
    else {
        $flies[] = $flied;
    }
}
return $flies;
}
private function makeDir():bool{
    $dir_path = 'Files/'.date('y/m');
    $this->dir = $dir_path;
  return  is_dir($dir_path)?:mkdir($dir_path,0755,true);
}
public function get_destination(){
    return $this->flie_destination;
}

}
?>