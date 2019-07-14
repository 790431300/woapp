<?php
$str=file_get_contents('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/admin/file/search/dir_file.php?path='.$_POST['path']);

$array=explode("#WO#",$str);
//print_r($array);

echo '目录和文件共搜到'.count($array).'个，匹配到的内容如下<br/>';

foreach($array as $key=>$val){
if (strstr($val,$_POST['dir_file']) !== false ){
echo '<a href="../..//wo_dir_file.php?path='.$val.'"><p style="padding:0px">'.$val.'</p></a>';
}}

print_r($list);