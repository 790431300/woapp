<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<link href="../../../style/hui.css" rel="stylesheet" type="text/css" />
<title>WD-音频合成</title>
</head><body>
<?php
define('M_SAMPLEFREQ', 44100);
define('M_CHANNELS', 1);
define('M_CHANNELBITS', 16);
define('WAVE_HEAD_LENGTH', 44);
define('PI', 3.1415926535);
 
/**
 * @param int $freq 频率
 * @param int $volume   音量
 * @param int $durations   时间/毫秒
 * @return mixed
 */
function makeWav($freq,$volume,$durations,$text)
{

$totalLen = M_SAMPLEFREQ * M_CHANNELS * M_CHANNELBITS / 8 * $durations / 1000 + WAVE_HEAD_LENGTH;
/*
for ($i = 0; $i <= $totalLen; $i++) {
$wav[$i] = 0;
}
*/
$wav[0] = 82;
$wav[1] = 73;
$wav[2] = 70;
$wav[3] = 70;
$headerLen = $totalLen - 8;

$wav[7] = $headerLen -->> 24 & 255;
$wav[6] = $headerLen >> 16 & 255;
$wav[5] = $headerLen >> 8 & 255;
$wav[4] = ord(chr($headerLen));

$wav[8] = 87;
$wav[9] = 65;
$wav[10] = 86;
$wav[11] = 69;

$wav[12] = 102;
$wav[13] = 109;
$wav[14] = 116;
$wav[15] = 32;

$wav[16] = 16;
$wav[17] = 0;
$wav[18] = 0;
$wav[19] = 0;

$wav[20] = 1;
$wav[21] = 0;
$wav[22] = M_CHANNELS;
$wav[23] = 0;
$wav[24] = ord(chr(M_SAMPLEFREQ));

$wav[25] = M_SAMPLEFREQ >> 8 & 255;
$wav[26] = M_SAMPLEFREQ >> 16 & 255;
$wav[27] = M_SAMPLEFREQ >> 24 & 255;

$nAvgBytesPerSec = M_SAMPLEFREQ * M_CHANNELS * M_CHANNELBITS / 8;

$wav[28] = ord(chr($nAvgBytesPerSec));
$wav[29] = $nAvgBytesPerSec >> 8 & 255;
$wav[30] = $nAvgBytesPerSec >> 16 & 255;
$wav[31] = $nAvgBytesPerSec >> 24 & 255;
$wav[32] = 2;
$wav[33] = 0;

$wav[34] = M_CHANNELBITS;
$wav[35] = 0;

$wav[36] = 100;
$wav[37] = 97;
$wav[38] = 116;
$wav[39] = 97;

$dataLen = $totalLen - WAVE_HEAD_LENGTH;

$wav[43] = $dataLen >> 24 & 255;
$wav[42] = $dataLen >> 16 & 255;
$wav[41] = $dataLen >> 8 & 255;
$wav[40] = ord(chr($dataLen));

$len = $totalLen - WAVE_HEAD_LENGTH;
$dLen = intval($len / 10);


$num=explode(',',$text);

for($i=0;$i<=count($num);$i++){
wavData(M_SAMPLEFREQ,$num[$i]+300,$volume,$wav,WAVE_HEAD_LENGTH+$dLen*($i),$dLen);
}

return $wav;
}

function wavData($rate,$freq,$amp,&$p,$pp,$len){
for($i=0;$i<=$len-1;$i+=2){
$v=cos(($len-$i)*PI/$rate*$freq)/180*($amp*32768+32768);
$p[$pp + $i] = $v & 255;
$p[$pp + $i + 1] = $v >> 8 & 255;
}
}

if($_POST['text']){
$data = makeWav(400,100,$_POST['time'],$_POST['text']);
function wav($data){
$res = fopen('test.wav','w');
$bin = pack("c*",...$data);
fwrite($res, $bin, strlen($bin));
fclose($res);
}
wav($data);
echo '<p style="padding:12px;"><audio src="test.wav" controls></audio><br/>好了，点击试听吧</p>';
exit();
}

?>

<form action="?id=ok" method="post" style="margin:0 8px">
<p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px">PHP声音频率转声音，学编程吗？<br/><br/>来这儿→http://biniwan.com</p>
<div style="margin:8px">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
<div class="H-flexbox-horizontal">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-time H-font-size-18 H-vertical-middle"></i></span><input type="text" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="音频总时间/毫秒(1000毫秒=1秒)" name="time" value="1800" id="time"/></div>
</div><div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-margin-vertical-bottom-10 H-border-vertical-both-after"><textarea class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="请输入频率，多个用,分开，谨慎操作，声音频率对人类的影响非同小可，轻则受伤，重则死亡，当然也有反面，让人最舒服的频率是440到640" name="text" id="text">600,500,500,300,300,200,200,0,300,300,200,200,100,100,700,700,0,100,100,700,600,500,600,200,300,500,0,600,600,600,600,300,300,100,200,200,300,300,400,400,500,500,500,500,0,600,600,600,300,300,0,200,200,300,300,400,400,0,100,100,100,100,100,-100,600,600,600,300,300,0,200,200,300,300,400,400,0,500,500,500
</textarea></div>
<div class="H-padding-vertical-bottom-10"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color9 H-theme-font-color-white H-theme-border-color9 H-theme-border-color9-click H-theme-background-color9-click H-theme-font-color9-click H-border-radius-3" onclick="hc();" id="bu">确认合成</button><div class="H-padding-vertical-bottom-10"></div>
</form>
<script>
function hc(){
document.getElementById("bu").innerHTML="稍等一下~正在合成……";
}
</script>

</body></html>