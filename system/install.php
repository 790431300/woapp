<?php
require('config.php');
require('../admin/decide.php');
require('my_connection.php');
require('my_operate.php');
if($logindecide==false){
header('location:../admin/admin.php');
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>管理中心</title>
<meta name="description" content="沃微型拓展开发" />
<meta name="keywords" content="QQ:790431300" />
<link href="../style/hui.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="H-header H-theme-background-color1" id="header"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100" onclick="window.history.go(-1);"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i>返回</span>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">
安装数据库
</div></header>
<br/><br/><center>
<form action="installgo.php" method="post">
<table>
<tr><td>主机地址：</td>

<td><input type="text" name="host" value="localhost"/></td></tr>
<tr><td>数据库账号：</td>

<td><input type="text" name="username"/></td>
</tr><tr>
<td>数据库密码：</td>

<td><input type="password" name="password"/></td>
</tr><td>数据库名：</td>
<td><input type="text" name="dbname"/></td>
</tr>
<br/><br/>
<td colspan="2" style="text-align:center;"><br/><br/>
<input type="submit" value="安装"/>
<input type="reset" value="重置"/>
</td>
</tr></table>
        </form>
    </center>
</body>
</html>