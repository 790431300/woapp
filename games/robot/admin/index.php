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

<header class="H-header H-theme-background-color1" id="header"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100" onclick="window.history.back(-1);"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i>返回</span>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">
机器人大脑
</div></header>


<div class="H-theme-background-color-white" style="margin-top:2px"><div class="H-border-vertical-bottom-after H-flexbox-horizontal">
<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active"><a href="study.php"><span class="H-font-size-14 H-theme-font-color-999 H-center-all">知识管理</span></a></div>

<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active"><a href="del.php"><span class="H-font-size-14 H-theme-font-color-999 H-center-all">记忆管理</span></a></div>

<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active"><a href="../"><span class="H-font-size-14 H-theme-font-color-999 H-center-all">检查学习成果</span></a></div>
</div></div>


<div id="list" class="H-padding-8">
<?php


if(!$_GET['page']){
$_GET['page']=0;
}
$x=$_GET['page']*20;
$t=$my->t("select * from `robot`");

$y=$t/20;
echo '
<p style="margin:8px">大脑里记录了'.$t.'条消息</p>';


$re=mysqli_query($my->my_databaselink,"select * from `robot` order by id desc limit $x,20");

while($res=mysqli_fetch_assoc($re)){
echo '<div id="list1" class="H-border-radius3-px H-theme-background-color-white H-margin-vertical-bottom-5 H-border-vertical-both-after H-border-horizontal-both-after"><div class="H-padding-10 H-border-vertical-bottom-after H-flexbox-horizontal H-theme-font-color-999 H-font-size-14 H-flexbox-horizontal H-text-horizontal-left H-box-sizing-border-box"><span class="H-display-block H-flex-item H-text-align-left">'.date("Y-m-d H:i:s",$res['time']).'</span><a href="del.php?id='.$res['id'].'"><span class="H-float-right">删除</span></a></div>
<div class="H-font-size-14 H-padding-10 H-flexbox-vertical"><div class="H-theme-font-color-333"><span class="H-float-left">IP('.$res['ip'].')说:<a href="study.php?text='.$res['i'].'">'.$res['i'].'</a><br/><br/>机器人回复了：'.$res['robot'].'</span></div>
</div></div>';
}


if($_GET['page']<=-1){
echo "<p style='margin:8px'>上一页什么也没有</p>";
//$_GET['page']=0;
}elseif($y<$_GET['page']){
//$_GET['page']=intval($y);
echo "<br/><p style='margin:8px'>已经是最后一页了</p>";
}

?>
</div></div>

<div class="H-padding-vertical-bottom-10"></div>


<div class="H-theme-background-color-white "><div class="H-border-vertical-bottom-after H-flexbox-horizontal">

<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active"><a href="<?php 
echo "?id={$_GET['id']}&page=";
echo $_GET['page']-1;
?>"><span class="H-font-size-14 H-theme-font-color-999 H-center-all">上一页</span></a></div>

<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-border-horizontal-right-after H-touch-active"><span class="H-font-size-14 H-theme-font-color-999 H-center-all"><?php echo $_GET['page']+1; ?></span></div>

<div class="H-flex-item H-text-show-row-1 H-padding-vertical-both-10 H-box-sizing-border-box H-touch-active"><a href="<?php 
echo "?id={$_GET['id']}&page=";
echo $_GET['page']+1;
?>">
<span class="H-font-size-14 H-theme-font-color-999 H-center-all">下一页</span></a></div>

</div></div>
<div class="H-padding-vertical-bottom-10"><br/><br/></div>

</body>
</html>