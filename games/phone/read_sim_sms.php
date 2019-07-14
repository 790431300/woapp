<?php
$myfile = fopen("python/read_sim_sms.py", "w") or die("Unable to open file!");

$txt = '
import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("AT+CMGR='.$_GET['id'].'\r");
port.timeout=3;
text=port.readlines();
print(text[2]);
';

fwrite($myfile, $txt);
fclose($myfile);

exec("sudo python python/read_sim_sms.py 2>error/read_sim_sms_error.txt", $array, $ret);
/*
if($array[0]!=''){
file_put_contents('sms_text.txt',$array['0']."\n",FILE_APPEND);
}
*/

echo $array[0];

?>