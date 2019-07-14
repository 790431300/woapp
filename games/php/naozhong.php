<?php
//PHP闹钟实例
exit();
$铃声='/var/www/html/audio/a五环之歌-MCHotdog.mp3';
$闹钟时间=strtotime('2019-6-26 18:40:00');
$现在时间=time();
$str=file("time.txt");

if($str['0']=="暂停"){
exit("闹钟响过了！");
}

if($闹钟时间<$现在时间){
//时间到了
file_put_contents('time.txt','暂停');
system("sudo omxplayer -o local {$铃声}");
exit();
}

//每隔10秒检查一次时间
sleep(10);

if($str['0']=="暂停"){
exit("闹钟响过了！");
}

file_put_contents('time.txt','值岗打卡:'.date("Y-m-d H:i:s"));
file_get_contents('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/games/php/yy.php');