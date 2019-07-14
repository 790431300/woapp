<?php
require('../../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');

$i="";//我
$robot="";//机器人

//我的ID
$_GET['id']=intval($_GET['id']);
//获取我发送过来的消息
$_GET['text']=mysqli_real_escape_string($my_databaselink,htmlspecialchars($_GET['text']));
//获取时间
$time=time();


//从机器人大脑里寻找知识
$robot=$my->c("*","robotmsg","i='{$_GET['text']}' order by rand() limit 0,1");


//添加记忆，记录聊天内容
$记忆=$my->z("robot",'i,time,ip,robot',"'{$_GET['text']}','{$time}','{$_SERVER['REMOTE_ADDR']}','{$robot['robot']}'");

//判断是否愿意通话聊天
if($记忆){
$i="{$_GET['text']}";
}else{
$i="对方没有接收到消息！";
}
if($robot['robot']==""){
$robot['robot']='我的大脑一片空白，不知道“'.$i.'”是什么意思，教教我可以吗？';
}

echo $i.'#沃の#'.$robot['robot'];