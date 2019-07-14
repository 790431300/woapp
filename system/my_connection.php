<?php 

$my_database=array("host"=>"localhost","user"=>"root","pass"=>"790431300","name"=>"wo");

$my_databaselink=mysqli_connect($my_database['host'],$my_database['user'],$my_database['pass']);
mysqli_select_db($my_databaselink,$my_database['name']);
mysqli_query($my_databaselink,'set names utf8;');

if(!$my_databaselink){
echo("<a href=http://{$_SERVER[HTTP_HOST]}/system/install.php>数据库错误，点击安装程序</a>");
}

 ?>