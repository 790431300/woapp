<?php
//获取文件大小
function fs($size){
$mod=1024;
$units=explode(' ','B KB MB GB TB PB');
for($i=0;$size>$mod;$i++) {
$size /= $mod;
}
return round($size,2).''.$units[$i];
}


//获取文件夹
function wo_dir($path,$path_filename='/.'){
$dirs = scandir($path.$path_filename);
foreach ($dirs as $value){
$val=$value;
$value=$path.'/'.$value;
if(is_dir($value) and $val != '.' and $val != '..'){
//可用空间
$fs=fs(disk_free_space($value));
//最新修改时间
$dft=filemtime($value);
//目录下文件数据
$dc=count(scandir($value))-2;
$str.='<div class="H-qq-item H-vertical-middle H-overflow-hidden">
<div class="H-flexbox-horizontal H-box-sizing-border-box H-theme-background-color-white H-border-vertical-bottom-after H-clear-both H-padding-horizontal-both-10 H-padding-vertical-both-8 H-touch-active" onclick="wo_url(\'?path='.$value.'\')"><div style="width:50px;height:50px;"><img src="http://'.$_SERVER['HTTP_HOST'].'/system/image/folder.png" class="H-width-100-percent H-height-100-percent H-display-block H-border-radius-square H-border-both" /></div><div class="H-flex-item H-padding-horizontal-both-10 H-vertical-middle H-overflow-hidden"><div class="H-width-100-percent"><strong class="H-font-weight-normal H-display-block H-font-weight-500 H-font-size-16 H-text-show-row-1">'.$val.'</strong><div class="H-theme-font-color-999 H-font-size-14 H-padding-vertical-top-3 H-text-show-row-1">'.date("Y-m-d H:i:s",$dft).'</div></div></div><div class="H-font-size-12 H-theme-font-color-999 white-space-nowrap H-text-align-right"><label class="H-display-block">'.$fs.'</label><span class="H-badge H-display-inline-block H-margin-vertical-top-8"><label class="H-display-inline-block H-vertical-middle H-theme-background-color1 H-theme-font-color-white H-font-size-12">'.$dc.'</label></span></div></div><div class="H-qq-menu H-vertical-middle H-position-relative H-overflow-hidden"><div class="H-font-size-16 H-padding-horizontal-both-20 H-theme-background-color1 H-display-block H-theme-font-color-white white-space-nowrap" onclick="rename(\''.$value.'\');">重命名</div><div class="H-font-size-16 H-padding-horizontal-both-20 H-theme-background-color-red H-display-block H-theme-font-color-white white-space-nowrap" onclick="rmdir(\''.$value.'\');">删除</div></div></div>';
}}
return $str;
}



//获取文件
function wo_file($path,$path_filename='/.'){
$dirs = scandir($path.$path_filename);

foreach ($dirs as $value){
$val=$value;
$value=$path.'/'.$val;
if(is_file($value) and $value != '.' and $value != '..'){
//最新修改时间
$dft=filemtime($value);
$fs=fs(filesize($value));
//文件格式
$file_type=pathinfo($value);
switch ($file_type['extension']) {
case 'mp3':$url='music.png';$x='audio';break;
case 'wav':$url='music.png';$x='audio';break;
case 'php':$url='text.png';$x='text';break;
case 'html':$url='html.png';$x='text';break;
case 'mp4':$url='video.png';$x='video';break;
case 'ogg':$url='video.png';$x='video';break;
case 'zip':$url='zip.png';$x='zip';break;
case 'apk':$url='apk.png';$x='apk';break;
case 'wo':$url='wo.jpg';$x='wo';break;
case 'png':$url='phot.png';$x='image';break;
case 'jpg':$url='phot.png';$x='image';break;
case 'js':$url='text.png';$x='text';break;
case 'bak':$url='text.png';$x='text';break;
case 'txt':$url='text.png';$x='text';break;
case 'py':$url='text.png';$x='text';break;
case 'ini':$url='text.png';$x='text';break;
case 'css':$url='text.png';$x='text';break;
default:$url='unknown.png';$x='unknow';
}
if($url=='phot.png'){
$str_r=str_replace(getcwd(),'',$path);
$img='http://'.$_SERVER['HTTP_HOST'].'/'.$str_r.'/'.$file_type['basename'];
}else{
$img='http://'.$_SERVER['HTTP_HOST'].'/system/image/'.$url;
}
if($url==='zip.png'){
$zip='<div class="H-font-size-16 H-padding-horizontal-both-20 H-theme-background-color7 H-display-block H-theme-font-color-white white-space-nowrap" onclick="unzip(\''.$file_type['dirname'].'/'.$val.'\');">解压</div>';
}

$str.='<div class="H-qq-item H-vertical-middle H-overflow-hidden"><div class="H-flexbox-horizontal H-box-sizing-border-box H-theme-background-color-white H-border-vertical-bottom-after H-clear-both H-padding-horizontal-both-10 H-padding-vertical-both-8 H-touch-active" onclick="wo_url(\'?path='.$path.'/'.$val.'&type=file&x='.$x.'\')"><div style="width:50px;height:50px;"><img src="'.$img.'" class="H-width-100-percent H-height-100-percent H-display-block H-border-radius-square H-border-both" /></div><div class="H-flex-item H-padding-horizontal-both-10 H-vertical-middle H-overflow-hidden"><div class="H-width-100-percent"><strong class="H-font-weight-normal H-display-block H-font-weight-500 H-font-size-16 H-text-show-row-1">'.$val.'</strong><div class="H-theme-font-color-999 H-font-size-14 H-padding-vertical-top-3 H-text-show-row-1">'.date("Y-m-d H:i:s",$dft).'</div></span></div></div><div class="H-font-size-12 H-theme-font-color-999 white-space-nowrap H-text-align-right"><label class="H-display-block">'.$fs.'</label><span class="H-badge H-display-inline-block H-margin-vertical-top-8"></span></div></div><div class="H-qq-menu H-vertical-middle H-position-relative H-overflow-hidden">'.$zip.'<div class="H-font-size-16 H-padding-horizontal-both-20 H-theme-background-color1 H-display-block H-theme-font-color-white white-space-nowrap" onclick="rename(\''.$value.'\');">重命名</div><div class="H-font-size-16 H-padding-horizontal-both-20 H-theme-background-color-red H-display-block H-theme-font-color-white white-space-nowrap" onclick="rmdir(\''.$value.'\');">删除</div></div></div>';
}}
return $str;
}