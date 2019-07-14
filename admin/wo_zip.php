<?php
require('../global.php');
//获取文件大小
function fs($size){
$mod=1024;
$units=explode(' ','B KB MB GB TB PB');
for($i=0;$size>$mod;$i++) {
$size /= $mod;
}
return round($size,2).''.$units[$i];
}

function zipimg($str){
return '<img src="data:image/jpg/png/gif;base64,' .chunk_split(base64_encode($str)).'" style="max-width:100%;"/>';
}

?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃ZIP阅读器-<?php
$filename=end(explode('/',$_GET['path']));
echo $filename;
?></title>
<link href="../style/hui.css" rel="stylesheet" type="text/css" />
<link href="file/css.css" rel="stylesheet" type="text/css" />
</head><body style="background:#f4f4f4;">
<header class="H-header H-theme-background-color1" id="header"><span id="drop-menu" class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-10 H-z-index-100" style="white-space: pre-wrap" onclick="location.href='<?php
echo str_replace(getcwd(),'',$_GET['path']);
?>'">下载ZIP  </span><div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent"><?php echo $filename; ?></div>
<a onclick="javascript:history.go(-1)" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-10 H-z-index-100" style="white-space: pre-wrap"><i class="H-iconfont H-icon-target-back H-font-size-22 H-vertical-middle"></i>  </span></a></header>

<?php
$zip = zip_open($_GET['path']);

if ($zip){
while ($zip_entry = zip_read($zip)){
$name=zip_entry_name($zip_entry);
$size=zip_entry_filesize($zip_entry);
$type=pathinfo($name,PATHINFO_EXTENSION);

if($name===$_GET['name']){
if(zip_entry_open($zip, $zip_entry)){
$text=zip_entry_read($zip_entry,zip_entry_filesize($zip_entry));
zip_entry_close($zip_entry);
}}
if($size>0){
switch ($type){
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

$url_text.='<div class="H-qq-item H-vertical-middle H-overflow-hidden"><div class="H-flexbox-horizontal H-box-sizing-border-box H-theme-background-color-white H-border-vertical-bottom-after H-clear-both H-padding-horizontal-both-10 H-padding-vertical-both-8 H-touch-active" onclick="location.href=\'?path='.$_GET['path'].'&name='.$name.'\'"><div style="width:50px;height:50px;"><img src="../system/image/'.$url.'" class="H-width-100-percent H-height-100-percent H-display-block H-border-radius-square H-border-both" /></div><div class="H-flex-item H-padding-horizontal-both-10 H-vertical-middle H-overflow-hidden"><div class="H-width-100-percent"><strong class="H-font-weight-normal H-display-block H-font-weight-500 H-font-size-16 H-text-show-row-1">'.$name.'</strong>
<div class="H-theme-font-color-999 H-font-size-14 H-padding-vertical-top-3 H-text-show-row-1">'.fs($size).'</div>
</span></div></div><div class="H-font-size-12 H-theme-font-color-999 white-space-nowrap H-text-align-right"><label class="H-display-block">  </label><span class="H-badge H-display-inline-block H-margin-vertical-top-8"></span></div></div></div>';
}
}
zip_close($zip);
}

$type=pathinfo($_GET['name'],PATHINFO_EXTENSION);
if($text){
if($type=='php' or $type=='py' or $type=='js' or $type=='html' or $type=='css' or $type=='txt' or $type=='ini' or $type=='bak'){
echo "<xmp Id='textarea'>{$text}'</xmp>";
}elseif($type=='jpg' or $type=='png' or $type=='gif'){
echo zipimg($text);
}else{
echo "<p style='padding:12px;'>不支持阅读此类型的文件。</p>";
}

}else{
echo $url_text;
}

?>


</body></html>