<?php
$time='/image/'.time().'.png';
$file=getcwd().$time;
exec('sudo raspistill -t 1 -o '.$file.' -q 5');
echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/games/picture'.$time;
?>