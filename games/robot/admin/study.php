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
<body>

<header class="H-header H-theme-background-color1" id="header"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100" onclick="window.history.back(-1);"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i>返回</span>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">
添加知识
</div></header>


<div id="formDiv">
<form id="dForm" action="studying.php" method="post">

<div class="description_main" style="padding:12px">

<div class="description_title"><span>*</span>接收到的消息:</div>
<textarea class="description_text" name="i" cols="40" rows="4"><?php echo $_GET['text']; ?></textarea>
<div class="description_title"><span>*</span>回复什么？:</div>
<textarea class="description_text" name="robot" cols="40" rows="4"></textarea>	

</div>
<div style="padding:12px">
<br/>
<div id="dMessageError" class="waring"></div>

<div class="btnpar"><input type="submit" id="submit_btn" class="btn" value="确定添加"></div>

</form>
</div>

<p class="msg" style="padding:12px"><br/>人工智障接收到消息以后，不知道回复什么内容，所以需要添加回复的信息，别人对你说“你好”，这时你应该回复他什么信息呢？
<br/><br/>.
</p>

</head><body>