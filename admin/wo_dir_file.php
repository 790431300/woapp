<?php
require('../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');
require('system/wo_dir_file.php');
require('admin/decide.php');

//如果没登录后台
$logindecide==false ? exit(header('location:admin.php')):'';
//获取工作
$_GET['path']=='' ? $_GET['path']=getcwd():'';
//打开编辑器
$_GET['x']=='text' ? $w_text!='1' ? '' : header("location:wo_text.php?path={$_GET['path']}"):'';
//打开安装
$_GET['x']=='wo'?header('location:../zhuomian/woapp_az.php?path='.$_GET['path'].'&x=wo'):'';
//打开ZIP
$_GET['x']=='zip'?header('location:wo_zip.php?path='.$_GET['path'].'&x=wo'):'';



?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD文件管理-<?php echo $_GET['path']; ?></title>
<link href="../style/hui.css" rel="stylesheet" type="text/css" /><script src="../script/h.js" type="text/javascript"></script>
<script src="../script/dir_file.js" type="text/javascript"></script>
<style>.y{display:none;}
.x{display:auto;}</style>
</head><body id="body">
<header class="H-header H-theme-background-color1" id="header"><span onclick="aleft('1');" id="daleft" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-10 H-z-index-100" style="white-space: pre-wrap"><i class="H-iconfont H-icon-drop-sort H-font-size-22 H-vertical-middle"></i>  </span>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD文件管理</div><?php
if(is_file($_GET['path'])){
$_GET['x']==''?$_GET['x']='unknown':'';
$str_r = str_replace(getcwd(),'',$_GET['path']);
echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/'.$str_r.'"><span class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-right-5 H-z-index-100"><label class="H-display-block H-vertical-middle H-font-size-15">打开</label></span></a>';
}
?></header>
<div style="display:none">
<div id="ser">
<input id="ipt"/>
</div></div>

<div id='aleft' class="y H-flexbox-vertical" style="position:absolute;z-index:999999;width:66%;top:0;"><div class="H-theme-background-color4 H-height-50 H-padding-horizontal-both-12" style="padding-top:35px;"><div class="H-flexbox-horizontal H-theme-font-color-white"><div class="H-flex-item"><div class="H-display-inline-block H-vertical-align-middle"><img src="../system/WO_logo.jpg" class="H-border-radius-circle H-height-45" /></div><label class="H-font-size-14" style="white-space: pre-wrap">  QQ:790431300</label></div><div class="H-center-all" onclick="aleft('0');"><span class="H-padding-horizontal-right-5"><i class="H-iconfont H-icon-close H-vertical-middle H-theme-font-color-white H-font-size-11"></i></span><font class="H-font-size-11 H-vertical-middle"></font></div></div></div><div class="list"><div class="H-flexbox-horizontal list-item H-theme-background-color-f4f4f4 H-border-vertical-bottom-after H-padding-horizontal-both-12 H-padding-vertical-both-12" onclick="location.href='admin.php'"><div class="H-flex-item"><span><i class="H-iconfont H-icon-http H-font-size-14 H-theme-font-color4-active"></i></span><label class="H-font-size-14 H-theme-font-color4-active">后台首页</label></div><strong><i class="H-iconfont H-icon-arrow-right H-font-size-12 H-theme-font-color-999"></i></strong></div><div>

<a onclick="location.href='wo_dir_file.php'">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">主目录</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>
<?php
if(is_dir($_GET['path'])){
echo '
<a onclick="aleft(\'0\');H.prompt(function (ret){if(ret.buttonIndex==1){mkdir(\'type=mkdir&path=\'+ret.text);}},\'创建文件夹\',\'请输入目录名称\',\''.$_GET['path'].'/\');">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">创建目录</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>

<a onclick="aleft(\'0\');H.prompt(function (ret){if(ret.buttonIndex==1){mkfile(\'type=mkfile&path=\'+ret.text);}},\'创建文件\',\'请输入文件名称\',\''.$_GET['path'].'/\');">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">创建文件</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>

<a onclick="aleft(\'0\');location.href=\'?path='.$_GET['path'].'&type=uploads\'">
<div class="H-text-list H-flexbox-horizontal H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">上传文件</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>
<a onclick="location.href=\'../zhuomian/woapp_sc.php?path='.$_GET['path'].'\'">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">生成应用</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>
';
}else{

if($_GET['x']=='text'){
echo '

<a onclick="location.href=\'wo_text.php?path='.$_GET['path'].'\'">
<div onclick="aleft(\'0\');" class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">编辑器2</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>

<a onclick="$(\'#y\').toggle(function () {$(this).attr(\'style\',\'display:none;\');},function () {aleft(\'0\');$(this).attr(\'style\',\'display:block;\');});">
<div class="H-text-list H-flexbox-horizontal H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">修改路径</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>';
} }
?>
<div class="H-flexbox-horizontal list-item H-theme-background-color-f4f4f4 H-border-vertical-bottom-after H-padding-horizontal-both-12 H-padding-vertical-both-12" id="onyygj" onclick="yygj('1')"><div class="H-flex-item"><span><i class="H-iconfont H-icon-edit H-font-size-14 H-theme-font-color4-active"></i></span><label class="H-font-size-14 H-theme-font-color4-active">应用工具</label></div><strong><i class="H-iconfont H-icon-arrow-down H-font-size-12 H-theme-font-color-999"></i></strong></div><div></div>
<div id="yygj" class="y">
<a onclick="location.href='file/ssh.php'">
<div class="H-text-list H-flexbox-horizontal H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">shell命令</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>

<a onclick="location.href='mysql'">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">MySQL管理</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>

<a onclick="location.href='file/search'">
<div class="H-text-list H-flexbox-horizontal H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">搜索文件</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>
<a onclick="location.href='file/index.php'">
<div class="H-text-list H-flexbox-horizontal H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-jiahao H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">更多工具</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>
</div>

<a onclick="location.href='../zhuomian'">
<div class="H-text-list H-flexbox-horizontal  H-theme-background-color-white H-border-vertical-bottom-margin-left-10-after H-vertical-middle H-touch-active"><span class="H-icon H-display-block H-margin-horizontal-left-10"><i class="H-iconfont H-icon-kefu5-fill H-font-size-22 H-vertical-middle H-theme-font-color6"></i></span><div class="H-flex-item H-padding-horizontal-both-10 H-font-size-16 H-padding-vertical-both-12">关闭退出</div><span class="H-icon H-padding-horizontal-right-5 H-display-block"><i class="H-iconfont H-icon-arrow-right H-theme-font-color-ccc H-font-size-14 H-vertical-middle"></i></span></div></a>

</div><div class="H-flexbox-horizontal list-item H-theme-background-color-f4f4f4 H-border-vertical-bottom-after H-padding-horizontal-both-12 H-padding-vertical-both-12" style="height:12px"></div></div></div></div>




<div class="H-theme-background-color-white"><div class="H-border-vertical-bottom-after H-flexbox-horizontal">
<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active">
<a href="?path=<?php echo pathinfo("{$_GET['path']}",PATHINFO_DIRNAME); ?>" >
<span class="H-font-size-14 H-theme-font-color-999 H-center-all"><span class='H-font-size-14 H-theme-font-color-999 H-center-all'>上一页</span></a>
</div>
<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active"><span class="H-font-size-14 H-theme-font-color-999 H-center-all"><?php echo $_GET['path']; ?></span></div>
</div></div>
<?php
$total=disk_total_space(getcwd());
$free=disk_free_space(getcwd());
//$xy=100-(($total-$free)/$total*100);
$xy=substr(($total-$free)/$total*100,0,5);
?><div class="H-progress H-theme-background-color-eee H-width-100-percent H-border-radius-0 H-line-height-0 H-overflow-hidden" style="height:5px;"><div class="H-height-100-percent H-theme-background-color4" style="width:<?php
echo $xy;
?>%"></div></div>
<?php
if($_GET['type']=='uploads'){
echo '<div style="text-align:center;padding:12px;"><form action="?type=uploads&path='.$_GET['path'].'" method="post" enctype="multipart/form-data"><input type="file" name="file" 
id="file" /><br/><input type="hidden" name="submit" value="Submit" />
<input name="path" type="hidden" value="'.$_GET['path'].'"><br/><br/>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3">确认上传</button>
<div class="H-padding-vertical-bottom-10"></div>
</form>';
echo '<div class="H-padding-vertical-bottom-20"></div>';

if($_POST['submit']=='Submit'){
$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$name=str_replace(' ','',$name);
$name=str_replace('(','',$name);
$name=str_replace(')','',$name);
if(move_uploaded_file($tmp,$_GET['path'].'/'.$name)){
echo 'OK';}else{echo 'error';}}
echo '</div>';
}

if(!is_file($_GET['path'])){
if(count(scandir($_GET['path']))-2<=0){
echo '
<div class="H-padding-vertical-bottom-20"><div class="H-padding-vertical-bottom-20"></div><div class="H-padding-vertical-bottom-10"></div></div><div class="H-center-all H-text-align-center H-height-200-percent"><br><br/><br/><br/><div><span class="H-icon"><i class="H-iconfont H-icon-wow H-theme-font-color9" style="font-size: 10rem;"></i></span><div class="H-font-size-28 H-theme-font-color1">文件夹为空</div></div></div>';
}}else{

if($_GET['x']=='audio'){
echo '<div style="margin:12px"><button onclick="H.alert(function(){wo_post(\'pi.php?path='.$_GET['path'].'&s=o&type=audio\',\'\',\'播放失败\');location.href=\'\'},\'播放指令已发送\');" class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3">树莓派播放</button>
<div class="H-padding-vertical-bottom-10"></div><button onclick="location.href=\'../../games/yinyue/audio.php?hash='.$str_r.'&s=o&type=audio\'" class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color9 H-theme-font-color-white H-theme-border-color9 H-theme-border-color9-click H-theme-background-color9-click H-theme-font-color9-click H-border-radius-3">本机播放</button>
<div class="H-padding-vertical-bottom-10"></div></div>';
}elseif($_GET['x']=='image'){
echo '<img src="'.$str_r.'" style="width:100%">';
}elseif($_GET['x']=='text'){
$textarea=file_get_contents($_GET['path']);
echo '<style>textarea { width:100%; background-color:#eee;height:320px; padding-top: 10px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px; overflow:auto; color:green;font-size: 16px;border:0;}
#y{display:none}
</style>
<form action="pi.php" method="post" id="formbc" style="overflow:hidden;">
<textarea type="text" id="text" name="str" class="text">'.htmlspecialchars($textarea).'</textarea><input name="type" value="mkfile" type="hidden"/><input name="path" id="path" value="'.$_GET['path'].'" type="hidden"/>
<script src="../script/jquery-1.12.0.min.js"></script><script src="../script/auto-line-number.js"></script>
<script>$("#text").setTextareaCount({width: "30px",bgColor: "#f8f8f8",color: "red",display: "inline-block"});
function bc(){
$("#path").val($("#url").val());
$("#formbc").submit();
}
</script>
</form>
<div style="margin:12px">
<div id="y">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-earth H-font-size-18 H-vertical-middle"></i></span>
<input type="text" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="保存路径" id="url" name="path" value="'.$_GET['path'].'"/></div><br/></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="bc();">保存文件</button></div>
<div class="H-padding-vertical-bottom-10"></div></form>';

}elseif($_GET['x']=='video'){
echo '<video src="'.$str_r.'" controls="controls" style="width:100%;height:200px;" poster="../system/image/WO_video_bg.jpg">your browser does not support the video tag
</video>';

}else{
echo '<div style="margin:12px"><button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'../games/download/?path='.$_GET['path'].'\'">下载文件</button>
<div class="H-padding-vertical-bottom-5"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'?path='.$_GET['path'].'&x=text\'">文件编辑器打开</button>
<div class="H-padding-vertical-bottom-5"></div>

<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'?path='.$_GET['path'].'&x=audio\'">音乐播放器打开</button>
<div class="H-padding-vertical-bottom-5"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'?path='.$_GET['path'].'&x=video\'">视频播放器打开</button>
<div class="H-padding-vertical-bottom-5"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" onclick="location.href=\'?path='.$_GET['path'].'&x=image\'">图片浏览器打开</button></div>';

}}
?>
<div class="H-qq-list">
<?php
echo wo_dir($_GET['path']);
echo wo_file($_GET['path']);
?>
</div>
<script src="../script/wo_dir_file.js" type="text/javascript"></script>
</body>
</html>