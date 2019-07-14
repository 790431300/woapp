<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<link href="../../../style/hui.css" rel="stylesheet" type="text/css" />
<title>WD-音频合成</title>
</head><body>
<button id="button" onclick="xxx();">
经过我</button>
<br/>
<button id="button" onclick="xx();">
停止</button>
<script>
// 创建音频上下文  
var audioCtx = new AudioContext();
// 创建音调控制对象  
var oscillator = audioCtx.createOscillator();
// 创建音量控制对象  
var gainNode = audioCtx.createGain();
// 音调音量关联  
oscillator.connect(gainNode);
// 音量和设备关联  
gainNode.connect(audioCtx.destination);
// 音调类型指定为正弦波  
oscillator.type = 'sine';
// 设置音调频率  
oscillator.frequency.value = 440;
// 先把当前音量设为0  
gainNode.gain.setValueAtTime(440, 0);
gainNode.gain.setValueAtTime(480, 1);
gainNode.gain.setValueAtTime(540, 2);
gainNode.gain.setValueAtTime(440,3 );
gainNode.gain.setValueAtTime(540, 4);
gainNode.gain.setValueAtTime(480,5 );
gainNode.gain.setValueAtTime(440, 6);
gainNode.gain.setValueAtTime(540, 7);
// 0.01秒时间内音量从刚刚的0变成1，线性变化 
gainNode.gain.linearRampToValueAtTime(1, 1);
// 声音走起 
function xxx(){
alert(audioCtx.currentTime);
oscillator.start(0);
// 1秒时间内音量从刚刚的1变成0.001，指数变化 
gainNode.gain.exponentialRampToValueAtTime(1,12);
// 1秒后停止声音 
oscillator.stop(audioCtx.currentTime + 5);
}





</script>