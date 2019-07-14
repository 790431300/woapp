write_sms<?php
//写入接收人
//写入短信内容
$myfile = fopen("python/write_sms.py", "w") or die("Unable to open file!");
$txt = 'import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("AT+CMGF=1\r");
port.write("AT+CMGS=\"'.$_GET['phone'].'\"\r\n");
port.write("'.$_GET['text'].'");
';
fwrite($myfile, $txt);
fclose($myfile);

echo exec("sudo python python/write_sms.py 2>error/write_sms_error.txt", $array, $ret);

?>