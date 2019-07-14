<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>系统设置</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
require('../../global.php');
$path=getcwd();
?>
<header class="H-header H-theme-background-color1" id="header"><a href="JavaScript:history.back();"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15"></label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">系统设置</div></header>

<div class="H-margin-vertical-top-10 H-theme-background-color-white H-border-vertical-both-after">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active" onclick="location.href='../../admin/wo_text.php?path=<?php echo $path; ?>/zhuomian/woapp.ini'">
<div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">桌面应用</div>
<span class="H-icon H-padding-horizontal-right-10 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-999 H-font-size-14 H-vertical-middle"></i></span></div>

<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active" onclick="location.href='../../admin/wo_text.php?path=<?php echo $path; ?>/system/config.php'"><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">账户密码</div><span class="H-icon H-padding-horizontal-right-10 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-999 H-font-size-14 H-vertical-middle"></i></span></div>

<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-vertical-middle H-touch-active" onclick="location.href='about.php'"><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">关于沃RD</div><span class="H-icon H-padding-horizontal-right-10 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-999 H-font-size-14 H-vertical-middle"></i></span></div></div>

</div>


</body>
</html>