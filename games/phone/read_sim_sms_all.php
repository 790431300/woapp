<?php
$myfile = fopen("python/read_sim_sms_all.py", "w") or die("Unable to open file!");

$txt = '
import serial
port = serial.Serial("/dev/ttyUSB0",baudrate=115200, timeout=3.0);
port.write("AT+CMGL=1\r");
port.timeout=0.1;
text=port.readlines();
x=2;
for i in range(0,200):
 y=x+3;
 x=y;
 print(str(text[x])+",");
';

fwrite($myfile, $txt);
fclose($myfile);

exec("sudo python python/read_sim_sms_all.py 2>error/read_sms_all_error.txt", $arr);

foreach ($arr as $value){
$value=str_replace('\r\n',"",$value);
$str.=$value;
}
if($str!=''){
file_put_contents('read_sim_sms_all.txt',rtrim($str,','));
//echo file_get_contents('read_sim_sms_all.txt');
}
?>