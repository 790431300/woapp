<?php
if($_GET['phone']==''){
exit('呼叫失败/号码不能为空');
}
//拨打电话
$myfile = fopen("python/phone_at.py", "w") or die("Unable to open file!");
$txt = '
import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("ATD'.$_GET['phone'].';\r\n");
';

fwrite($myfile, $txt);
fclose($myfile);

echo exec("sudo python python/phone_at.py 2>error/phone_error.txt", $array, $ret);
echo '已发送呼叫'.$_GET['phone'].'的命令';
?>