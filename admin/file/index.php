<?php
require('../../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');
require('system/wo_dir_file.php');
require('admin/decide.php');

//如果没登录后台
if($logindecide==false){
header('location:../index.php');
exit();
}
if($_GET['path']==""){
$_GET['path']=getcwd();
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD文件管理</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" /><script src="../../script/h.js" type="text/javascript"></script>
<script src="../../script/dir_file.js" type="text/javascript"></script>
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a href="JavaScript:history.back();"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD文件管理</div></header>
<?php
$total=disk_total_space(getcwd());
$free=disk_free_space(getcwd());
//$xy=100-(($total-$free)/$total*100);
$xy=substr(($total-$free)/$total*100,0,5);
echo '<div style="padding:8px;background:#fff;"><div class="H-theme-background-color-white"><div class=" H-flexbox-horizontal H-box-sizing-border-box H-padding-horizontal-both-0 H-touch-active"><div class="H-font-size-15 H-font-weight-600 H-padding-vertical-both-8 H-flex-item H-text-show-row-0">'.fs($total).'/'.fs($free).'</div><span class="H-theme-font-color-999 H-font-size-15  H-vertical-middle"><a href="clean.php"><label class="H-iconfont H-icon-qingchu H-font-size-14"></label><label class="H-display-bloc">已用:'.$xy.'%</label></a></span></div>';
?><div class="H-progress H-theme-background-color-eee H-width-100-percent H-border-radius-5 H-line-height-0 H-overflow-hidden" style="height:9px;"><div class="H-height-100-percent H-theme-background-color4" style="width:<?php
echo $xy;
?>%"></div></div><div class="H-padding-vertical-bottom-12"></div>
</div></div><div class="H-border-vertical-both-after">
<a href="../wo_dir_file.php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/wo_file.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">文件管理</label></div></a>
<a href="search/index.php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_so.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">全盘搜索</label></div></a>


<a href="../../games/picture" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_pz.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">摄像机</label></div></a>

<a href="../../games/phone" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_phone.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">电话</label></div></a>


<a href="../../games/phone/sms.php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/sms.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">短信</label></div></a>
<a href="../../games/cpp" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/cpp.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">C++</label></div></a>
<a href="../../games/ssh/" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_ssh.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">shell命令</label></div></a>

<a href="../../games/c/index.php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_c.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">C语言</label></div></a>

<a href="../../games/python/index.php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_python.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">Python</label></div></a>

<a href="../../admin/wo_dir_file.php?path=/var/www/html/games/php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/php.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">PHP</label></div></a>
<a href="../../games/perl/index.php" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_perl.png" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">Perl</label></div></a>

<a href="../mysql" class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-theme-background-color-white H-border-horizontal-right-after H-border-vertical-bottom-after H-padding-vertical-both-10  H-touch-active H-position-relative" style="min-height: 80px;"><div class="H-text-align-center"><span class="H-icon H-center-all H-theme-background-color H-margin-horizontal-auto H-font-size-26 H-font-weight-600 H-border-radius-12 H-theme-font-color-white"><img src="../../system/image/WO_mysql.jpg" class="H-display-block" style="height:42px;width:42px;line-height:42px;"></span><label class="H-display-block H-font-size-11 H-margin-vertical-top-5 H-theme-font-color-666">MySQL管理</label></div></a>
</div>
<div style="line-height:20px;">&#8195;</div>
<div style="margin-left:8px">
<?php
echo exec("cat /proc/uptime| awk -F. '{run_days=$1 / 86400;run_hour=($1 % 86400)/3600;run_minute=($1 % 3600)/60;run_second=$1 % 60;printf(\"系统已开机运行：%d天%d时%d分%d秒\",run_days,run_hour,run_minute,run_second)}'");
?></div>
</body></html>