<?php
require('../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');

//获取应用信息
$path=$_GET['path'];
$p=getcwd().'/';
$path=str_replace($p,'',$path);
$woini='zhuomian/woapp.ini';
//获取已安装数据
$wo_app_str_arr=parse_ini_file('zhuomian/woapp.ini',TRUE);

//读取应用包配置信息
$zip = zip_open($path);
if ($zip){
while ($zip_entry = zip_read($zip)){
$name=zip_entry_name($zip_entry);

if(strpos($name,'wo.sql')){
if(zip_entry_open($zip, $zip_entry)){
$sql=zip_entry_read($zip_entry,zip_entry_filesize($zip_entry));
zip_entry_close($zip_entry);
}}

if(strpos($name,'wo.ini')){
if(zip_entry_open($zip, $zip_entry)){
$c=zip_entry_read($zip_entry,zip_entry_filesize($zip_entry));
zip_entry_close($zip_entry);
}}
}
zip_close($zip);
}
//获取应用包信息
$file_array=parse_ini_string($c,TRUE);
$woapp=array_keys($file_array);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>安装应用</title>
<link href="../style/hui.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="H-header H-theme-background-color1" id="header"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100" onclick="window.history.go(-1);"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i>返回</span>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">
安装应用
</div></header>

<?php
echo '<p style="padding:8px">';



if($_POST){
//导入数据
if($sql!=''){
$a=explode(";",$sql);
foreach($a as $b){
$c=$b.";";
$d=mysqli_query($my_databaselink,$c);
if($d){
//echo "sql导入成功<br/>";
}else{
//echo "sql导入失败<br/>";
}}}



//查询是否存在该应用
if(array_key_exists($_POST['woapp'],$wo_app_str_arr)){

//存在就删除
//print_r($_POST);

unset($wo_app_str_arr[$woapp['0']]);
print_r($wo_app_str_arr[$woapp['0']]);

$w=array_keys($wo_app_str_arr);

for($i=0;$i<=count($w)-1;$i++){
$wi=$w[$i];

$wText.="\n\n\n[".$wi."]\n title=\"".$wo_app_str_arr[$wi]['title']."\"\n url=\"".$wo_app_str_arr[$wi]['url']."\"\n icon=\"".$wo_app_str_arr[$wi]['icon']."\"\n version=\"".$wo_app_str_arr[$wi]['version']."\"\n key=\"".$wo_app_str_arr[$wi]['key']."\"";
}

//更新数据
file_put_contents($woini,$wText);
echo '<center>删除旧应用…</center><br/>';
}

$zip=new ZipArchive;
if($zip->open($_GET['path'])===TRUE){
$zip->extractTo('games');
$zip->close();
echo '<center>解压应用中…</center><br/>';
} 



echo '<center>正在安装……<br/>';
$wo_str="\n\n\n[".$_POST['woapp'].']'."\n title=\"".$file_array[$woapp['0']]['title']."\"\n url=\"".$file_array[$woapp['0']]['url']."\"\n icon=\"".$file_array[$woapp['0']]['icon']."\"\n version=\"".$file_array[$woapp['0']]['version']."\"\n key=\"".$file_array[$woapp['0']]['key']."\"";

file_put_contents($woini,$wo_str,FILE_APPEND);

echo '<br/>安装完成！，<a href="index.php">查看</a></center>';
exit();
}




if(!count($file_array[$woapp['0']])){
exit("应用解析错误");
}

echo $file_array[$woapp['0']]['title']===''?'exit("应用没有名称");':'';


//判断应用是否存在
if(array_key_exists($woapp['0'],$wo_app_str_arr)){
echo '应用已存在,继续安装将会覆盖';
}

echo '</p>';

$woapp=<<<woapp
<p style="padding:8px">
名称：{$file_array[$woapp['0']]['title']}<br>
版本：{$file_array[$woapp['0']]['version']}<br>
</p>
<div class="page">
<div class="main">
<form id="frm_login" method="post" action="" style="margin:8px">
<div class="item item-username">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-game H-font-size-18 H-vertical-middle"></i></span>
<input type="text" name="url" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="打开路径" value="{$file_array[$woapp['0']]['url']}" /></div>
<div class="item item-username">
<div class="H-padding-vertical-bottom-10"></div>
<div style="display:none">
<input name="woapp" value="{$woapp['0']}">
<input name="icon" value="{$file_array[$woapp['0']]['icon']}">
<input name="title" value="{$file_array[$woapp['0']]['title']}">
<input name="key" value="{$file_array[$woapp['0']]['key']}">
<input name="version" value="{$file_array[$woapp['0']]['version']}">
</div>


<div class="H-padding-vertical-bottom-20"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color9-click H-border-radius-3">确认安装</button>
</div>
</form>
woapp;

echo $woapp;

//创建桌面应用


exit();