<?php
if (!file_exists($_GET['path'])) {
exit('文件找不到');
}else{
$file = fopen($_GET['path'],'r');
Header('Content-type: application/octet-stream');
Header('Accept-Ranges: bytes');
Header('Accept-Length:'.filesize($_GET['path']));
Header('Content-Disposition: attachment;filename='.end(explode('/',$_GET['path'])));
// 输出文件内容
echo fread($file,filesize($_GET['path']));
fclose($file);
exit();
}