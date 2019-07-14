<?php
header("Content-type: text/html; charset=utf-8");
/*** 
* @Method Ucs2Code UCS2编码 
* @Param $str 输入字符串 
* @Param $encod 输入字符串编码类型(UTF-8,GB2312,GBK) 
* @Return 返回编码后的字符串 
*/ 
function Ucs2Code($str,$encode="UTF-8"){ 
$jumpbit=strtoupper($encode)=='GB2312'?2:3;//跳转位数 
$strlen=strlen($str);//字符串长度 
$pos=0;//位置 
$buffer=array(); 
for($pos=0;$pos<$strlen;){ 
if(ord(substr($str,$pos,1))>=0xa1){//0xa1（161）汉字编码开始 
$tmpChar=substr($str,$pos,$jumpbit); 
$pos+=$jumpbit; 
}else{ 
$tmpChar=substr($str,$pos,1); 
++$pos; 
} 
$buffer[]=bin2hex(iconv("UTF-8","UCS-2",$tmpChar)); 
} 
return strtoupper(join("",$buffer)); 
} 
/*** 
* @Method unUcs2Code UCS2解码 
* @Param $str 输入字符串 
* @Param $encod 输入字符串编码类型(UTF-8,GB2312,GBK) 
* @Return 返回解码后的字符串 
*/ 
function unUcs2Code($str,$encode="UTF-8"){   
$strlen=strlen($str); 
$step=4; 
$buffer=array(); 
for($i=0;$i<$strlen;$i+=$step){ 
$buffer[]=iconv("UCS-2",$encode,pack("H4",substr($str,$i,$step)));   
} 
return   join("",$buffer);   
}
echo $x=file_get_contents("http://www.multisilicon.com/blog/a22201774~/pdu.htm");
file_put_contents("pdu.php",$x);
?>