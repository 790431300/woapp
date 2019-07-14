write_sms_b<?php
//发送短信
$myfile = fopen("python/write_sms_b.py", "w") or die("Unable to open file!");
$txt = 'import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("\x1A");';
fwrite($myfile, $txt);
fclose($myfile);

echo exec("sudo python python/write_sms_b.py 2>error/write_sms_b_error.txt", $array, $ret);

?>