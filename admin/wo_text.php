<?php
require('../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');
require('system/wo_dir_file.php');
require('admin/decide.php');

//如果没登录后台
if($logindecide==false){
header('location:admin.php');
exit();
}
if($_GET['path']==""){
$_GET['path']=getcwd();
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD编辑器-<?php
$filemame=end(explode('/',$_GET['path']));
echo $filemame;
?></title>
<link href="../style/hui.css" rel="stylesheet" type="text/css" />
<script src="../script/dir_file.js" type="text/javascript"></script>
</head><body style="background:#f4f4f4;">
<header class="H-header H-theme-background-color1" id="header"><span id="drop-menu" class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-10 H-z-index-100" style="white-space: pre-wrap"><i class="H-iconfont H-icon-dot-more H-font-size-22 H-vertical-middle"></i>  </span><div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent"><?php echo $filemame; ?></div>
<a onclick="javascript:history.go(-1)" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-10 H-z-index-100" style="white-space: pre-wrap"><i class="H-iconfont H-icon-target-back H-font-size-22 H-vertical-middle"></i>  </span></a></header>

<div class="show-menu H-display-none-important H-position-absolute H-width-100-percent H-z-index-1000000 H-horizontal-left-0 H-vertical-bottom-0 H-horizontal-right-0 " style="top:35px;">
<div class="more-info-menu H-width-150 H-vertical-top-10  H-position-absolute H-theme-background-color-white H-padding-vertical-both-5 H-border-radius-3 H-z-index-10" style="right: 4px; -webkit-transform-origin: 150px 0;">
<div class="H-bugle-top H-theme-border-color-white H-position-absolute H-z-index-100" style="border-width: 10px; top: -18px; right:9px;"></div>
<div onclick="location.href='<?php
$str_r = str_replace(getcwd(),'',$_GET['path']);
echo 'http://'.$_SERVER['HTTP_HOST'].$str_r;
?>'" class="H-text-list H-flexbox-horizontal  H-theme-background-color-white  H-vertical-middle H-touch-active">
<span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-zuji H-font-size-20 H-vertical-middle H-theme-font-color1"></i></span>
<div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-8 H-theme-font-color-444">打开文件</div>
</div>
<div onclick="bc()" class="H-text-list H-flexbox-horizontal  H-theme-background-color-white  H-vertical-middle H-touch-active">
<span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-log H-font-size-20 H-vertical-middle H-theme-font-color1"></i></span>
<div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-8 H-theme-font-color-444">保存文件</div>
</div>
<div onclick="copy('<?php echo $_GET['path']; ?>');" class="H-text-list H-flexbox-horizontal H-theme-background-color-white  H-vertical-middle H-touch-active">
<span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-share-to H-font-size-20 H-vertical-middle H-theme-font-color7"></i></span>
<div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-8 H-theme-font-color-444">复制文件</div></div>
<div onclick="location.href='../games/download/?path=<?php
echo $_GET['path'];
?>'" class="H-text-list H-flexbox-horizontal  H-theme-background-color-white  H-vertical-middle H-touch-active">
<span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-download H-font-size-20 H-vertical-middle H-theme-font-color1"></i></span>
<div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-8 H-theme-font-color-444">下载文件</div>
</div>

</div></div>

<form action="pi.php" method="post" id="formx">
<div class="H-flexbox-horizontal H-margin-vertical-bottom-10 H-border-vertical-both-after"><textarea class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="文件内容" name="str" id="text" style="background:#f4f4f4;height:480px;color:#333;"><?php
$textarea=file_get_contents($_GET['path']);
echo htmlspecialchars($textarea);
?></textarea></div>
<input type="hidden" value="<?php echo $_GET['path']; ?>" name="path">
<input type="hidden" value="mkfile" name="type">
</div></from>

<script src="../script/h.js" type="text/javascript"></script>
<script type="text/javascript">
var h = document.documentElement.offsetHeight || document.body.offsetHeight;
h=h-55;
document.getElementById("text").style.height=h+"px";

H.D("#drop-menu").addEventListener("touchstart",function (e) {
if (H.isAPICloud()) {
showDropMenu();
}else{
H.swiperShare(".show-menu", ".more-info-menu", "show-menu");
}
});
function bc(){
//H.toast('正在保存...');
document.getElementById("formx").submit();
}
</script>

</body>
</html>