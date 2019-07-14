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
知识添加结果
</div></header>

<center style="margin-top:28px;font-size:18;">
<p class="msg" style="font-size:18px;">

<?php
//print_r($_POST);

if($_POST['i']=="" or $_POST['robot']==""){
exit("接收和回复不能为空白");
}
$mydo=$my->z("robotmsg","i,robot,class","'{$_POST['i']}','{$_POST['robot']}','text'");

//echo '<xmp>';
//print_r(get_defined_vars());
//echo '</xmp>';



if($mydo==1){
echo '添加成功';
}else{
echo '添加失败';
}
?>
</p>

</head><body>