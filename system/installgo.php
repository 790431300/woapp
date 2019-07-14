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
数据库安装结果
</div></header>
<?php
$filename="my_connection.php";

//配置文件内容
$config=<<<wosql

\$my_database=array("host"=>"{$_POST['host']}","user"=>"{$_POST['username']}","pass"=>"{$_POST['password']}","name"=>"{$_POST['dbname']}");

\$my_databaselink=mysqli_connect(\$my_database['host'],\$my_database['user'],\$my_database['pass']);
mysqli_select_db(\$my_databaselink,\$my_database['name']);
mysqli_query(\$my_databaselink,'set names utf8;');

if(!\$my_databaselink){
echo("<a href=http://{\$_SERVER[HTTP_HOST]}/system/install.php>数据库错误，点击安装程序</a>");
}

wosql;
echo '<h2>^_^ 欢迎使用！<a href="../">首页</a><br/></h2><center>';
$handle=fopen($filename, "w+");
fwrite($handle,"<?php \n".$config."\n ?>");
fclose($handle);
require("sql.php");

?>
</center>
</body>
</html>