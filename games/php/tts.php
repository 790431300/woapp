<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>WD-语音合成</title>
</head><body>
<form>
<input name="text" value="790431300">
<input type="submit">
</form>
<?php
//获取要转换的文字
$text=$_GET['text'];
$len=mb_strlen($text);
for($i;$i<=$len;$i++){
//获取单个文字对应音频
$url='tts/'.mb_substr($text,$i,1);
$str=file_get_contents($url);
//去除音频头部字节
//$content=mb_strcut($str,128);
$yinyue.=$str;
}
if($_GET['text']!=''){
//判断提交
//文字合成语音文件
$myfile = fopen("$text.mp3", "w");
fwrite($myfile,$yinyue);
fclose($myfile);
echo "语音合成成功<br/><a href='$text.mp3'>下载试听</a>";
}
?>
</body>
</html>