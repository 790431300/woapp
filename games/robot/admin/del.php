<?php
require('../../../global.php');
require('system/config.php');
require('admin/decide.php');
require('system/my_connection.php');
require('system/my_operate.php');
if($logindecide==false){
header('location:../../../admin/index.php');
}

?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>管理机器人</title>
<link href="../../../style/hui.css" rel="stylesheet" type="text/css" />
</head>
<body class="H-theme-background-color-eee H-height-100-percent">

<header class="H-header H-theme-background-color1" id="header"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100" onclick="window.history.go(-1);"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i>返回</span>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">
清理机器人记忆
</div></header>

<center style="padding:12px">
<?php
if($_GET['id']){
$a=$my->wc("delete from robot where id={$_GET['id']}");
echo $a!=''?'删除成功':"删除成功";
exit();
}
?>
<p class="msg">只清理收到的消息，不清理学会的知识，确定要清理吗？是删除全部收到的消息记忆喔！</p>


<?php

if($_GET['i']=='ok'){


$a=$my->wc("delete from robot");

if($a){
echo '<h1>清理记忆成功</h1>';
}else{
echo '<h1>清理记忆完成</h1>';
}

}
?>



<?php
if($_GET['i']!='o'){
?>

<div id="formDiv">
<form id="dForm" action="del.php?i=o" method="post">
<div id="dMessageError" class="waring"></div>
<div class="btnpar"><input type="submit" id="submit_btn" class="btn" value="确定清理"></div>

</form>
</div>


<?php
}else{
?>

<div id="formDiv">
<form id="dForm" action="del.php?i=ok" method="post">
<div id="dMessageError" class="waring"></div>
<div class="btnpar"><input type="submit" id="submit_btn" class="btn" value="真的清理记忆吗？确定"></div>

</form>
</div>


<?php } ?>

</head><body>