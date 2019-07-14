<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>生成应用</title>
<link href="../style/hui.css" rel="stylesheet" type="text/css" />
</head>
<body>

<header class="H-header H-theme-background-color1" id="header"><a onclick="javascript :history.back(-1);"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">应用生成结果</div></header>
<?php
//生成应用

$path=$_GET['path'];

require('../global.php');
$p=getcwd().'/';

$path=str_replace($p,'',$path);
//exit();


function addFileToZip($path,$zip){
$handler=opendir($path);

while(($filename=readdir($handler))!==false){
if($filename != "." && $filename != ".."){            if(is_dir($path."/".$filename)){
addFileToZip($path."/".$filename, $zip);
}else{
$path."/".$filename;
$zip->addFile($path."/".$filename);
}}}
@closedir($path);
}

function woapp($path,$wo='.wo'){
$woapp=pathinfo($path);
$time=time();

$zipurl=$path.'/woapp_'.$time.$wo;
file_put_contents($zipurl,'woapp');

$zip=new ZipArchive();
if($zip->open($zipurl,
ZipArchive::OVERWRITE)=== TRUE){
addFileToZip($path, $zip);
$zip->close();
return $zipurl;
}
}

$url=woapp($path,'.wo');


echo '<div style="margin:8px"><center>已生成应用</center><br/>
<div class="H-padding-vertical-bottom-5"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'woapp_az.php?path='.$url.'\'">安装应用</button>
<div class="H-padding-vertical-bottom-10"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'../'.$url.'\'">下载应用</button>
<div class="H-padding-vertical-bottom-5"></div></div>
';
?></body></html>