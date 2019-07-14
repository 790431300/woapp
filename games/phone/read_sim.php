<?php
$myfile = fopen("python/read_sim.py", "w") or die("Unable to open file!");
//读取SIM数据
$_GET['at']==''?'':$py='port.write("'.$_GET['at'].'\r\n")';

$txt = '
import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
'.$py.'
port.timeout=3;
print(port.readlines());
';

fwrite($myfile, $txt);
fclose($myfile);

exec("sudo python python/read_sim.py 2>error/write_sim_error.txt", $array, $ret);
/*
if($array['0']!="[]"){
//读取到的内容写入保存
file_put_contents('read_sim.txt',$array['0']."\n",FILE_APPEND);
}
*/
echo $array[0];
?>