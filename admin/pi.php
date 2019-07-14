<?php
/*
*沃PHP微型拓展程序
*QQ:790431300
*/
//引用判断
require('../system/config.php');
require('decide.php');
require('../system/my_connection.php');
require('../system/my_operate.php');
if($logindecide==false){
header('location:index.php');
exit();
}

//print_r($_POST);
//创建文件夹
if($_GET['type']=='mkdir'){
switch ($_POST['path']){
case '':echo 'error0';break;
default:
if(is_dir($_POST['path'])){
echo '文件夹已存在，不需要再次创建';
}else{
mkdir($_POST['path']);
echo 'ok';
}}
exit();
}

//创建文件
if($_POST['type']=='mkfile'){
if(is_file($_POST['path']) and $_POST['str']==''){
echo '文件已存在';
}else{
if($_POST['str']){
$myfile=fopen($_POST['path'],'w');
fwrite($myfile,$_POST['str']);
fclose($myfile);

//sleep(1);
$_POST['path']=pathinfo($_POST['path']);
header("location:wo_dir_file.php?path=".urlencode($_POST['path']['dirname']));

}else{
$myfile=fopen($_POST['path'],'w');
fwrite($myfile,'沃WD');
fclose($myfile);
echo 'ok';
}}
exit();
}

//重命名
if($_POST['type']=="rename"){
if(is_dir($_POST['path']) or is_file($_POST['path'])){
echo '名字已存在';
}else{
if(rename($_POST['a'],$_POST['path'])){
echo 'ok';
}else{
echo '重命名失败';
}}
exit();
}

if($_GET['type']=='copy'){
if(copy($_POST['path'],$_POST['a'])){
echo "复制成功";
}else{
echo "复制失败";
}
}

//删除目录和文件
if($_POST['type']=='rmdir'){
if(is_file($_POST['path'])){
$rm=unlink($_POST['path']);
}else{
//心惊肉跳
$rm=array_map('unlink', glob($_POST['path'].'/*/*/*/*'));
$rm=array_map('rmdir', glob($_POST['path'].'/*/*/*/*'));
$rm=array_map('unlink', glob($_POST['path'].'/*/*/*'));
$rm=array_map('rmdir', glob($_POST['path'].'/*/*/*'));
$rm=array_map('unlink', glob($_POST['path'].'/*/*'));
$rm=array_map('rmdir', glob($_POST['path'].'/*/*'));
$rm=array_map('unlink', glob($_POST['path'].'/*'));
$rm=array_map('rmdir', glob($_POST['path'].'/*'));
$rm=array_map('rmdir', glob($_POST['path']));

}
if($rm['0']=="1"){
echo 'ok';
}else{
echo 'ok';
}
exit();
}

if($_GET['type']=='audio'){
$ssh='sudo omxplayer '.$_GET['path'];

//播放音乐
echo $ssh;
echo exec($ssh);
exit();
}

if($_GET['type']=='raspistill'){
//拍照
exec('sudo raspistill -o '.$_POST['path']);
exit();
}

if($_POST['type']=='shell'){
//shell
echo system($_POST['shell']);
exit();
}