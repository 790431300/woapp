<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<link href="../../../style/hui.css" rel="stylesheet" type="text/css" />
<title>WD-音频合成</title>
</head><body>
<script>
function music_wav(ms,ta){
var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
var oscillator = audioCtx.createOscillator();
// 创建音量控制对象  
var gainNode = audioCtx.createGain();
// 音调音量关联  
oscillator.connect(gainNode);
// 音量和设备关联  
gainNode.connect(audioCtx.destination);

oscillator.type = ms;
arr=ta.split(",");
for(i=0;i<=arr.length-1;i++){
arrt=arr[i].split(":");
oscillator.frequency.setValueAtTime(arr[i],i);
}
gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
gainNode.gain.linearRampToValueAtTime(1, audioCtx.currentTime + 0.01);
oscillator.start();
setTimeout(exit_wav(),audioCtx.currentTime*1000);
}
function exit_wav(){
gainNode.gain.exponentialRampToValueAtTime(0.001,audioCtx.currentTime+2);
oscillator.stop(audioCtx.currentTime+2);
}
</script>

<p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px">PHP声音频率转声音，学编程吗？
<br/><br/>来这儿→http://biniwan.com</p>
<div style="margin:8px">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
<div class="H-flexbox-horizontal">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-music H-font-size-18 H-vertical-middle"></i></span><input type="text" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="选填:sine，square，triangle，sawtooth" name="music" value="" id="music"/></div>
</div><div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-margin-vertical-bottom-10 H-border-vertical-both-after"><textarea class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="格式，频率:开始时间，多个用,分开，切换频率直到下一个频率出现。" name="text" id="textarea"></textarea></div>
<div class="H-padding-vertical-bottom-10"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color9 H-theme-font-color-white H-theme-border-color9 H-theme-border-color9-click H-theme-background-color9-click H-theme-font-color9-click H-border-radius-3" onclick="hc();" id="bu">确认合成</button><div class="H-padding-vertical-bottom-10"></div>

<script>
function hc(){
document.getElementById("bu").innerHTML="合成中……";
var ta=document.getElementById("textarea").value;
music_wav(document.getElementById("music").value,ta);
}
</script>

</body></html>