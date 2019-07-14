<?php
header("Content-type:text/html;charset=utf-8");

function baidu(){
$json_text=file_get_contents('https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=Z9NMwZVUbozAk9XrglT9pvBb&client_secret=a3a6532dcb25ee2e51ef36ec65c6350a');
$obj=json_decode($json_text);
$token=$obj->access_token;
file_put_contents('key.txt',$token);
return $token;
}
$token=file_get_contents('key.txt');
if($token==''){
$token=baidu($url);
echo 'ok';
}
$url="http://tsn.baidu.com/text2audio?tok={$token}&tex=love you&cuid=baidu_speech_demo&lan=zh&spd=3&per=2&vol=3&pit=2&ctp=1";

?>﻿<!DOCTYPE html><html lang="zh-cn"><head>
<title>在线文字转语音，语音合成</title>
<meta name="keywords" content="tts,文字转语音,文字朗读,语音合成">
<meta name="description" content="文字转语音网站，我们用心制作了简单、便捷、功能强大的免费工具">
<meta name="keywords" content="文字转语音,沃QQ790431300">
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-touch-fullscreen" content="yes"><meta name="format-detection" content="telephone=no"><meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="style.css?id=2" rel="stylesheet" type="text/css"/>
</head><body>
<header><a href="javascript:history.back(-1);"></a><h1>文字转语音播报</h1></header>

<audio id="m" src="http://tts.baidu.com/text2audio?idx=1&tex=QQ790431300&cuid=baidu_speech_demo&cod=2&lan=zh&ctp=1&pdt=1&spd=5&per=0&vol=5&pit=5"></audio>

<form style="margin:8px;background:#fff;text-align:center;">
<div class="description_title"><span></span></div>
<div id="n" style="border:1px solid #eee;">
<textarea name="content" cols="40" rows="5" id="content" style="border:0px solid #eee;
border-radius:3px;-moz-border-radius:3px;width:100%;padding:5px;line-height:23px;" placeholder="输入内容...">大家好</textarea>	
</div>

<br/>
<div id="n" style="border:1px solid #eee;">
<a style="border-right:1px solid #eee;background:#ff66BB;" onclick="sy('0')" id="sa">阿姨音</a>
<a style="border-right:1px solid #eee;" onclick="sy('4')" id="sb">萝莉音</a>
<a style="border-right:1px solid #eee;" onclick="sy('1')" id="sc">青年音</a>
<a style="border-right:1px solid #eee;" onclick="sy('3')" id="sd">大叔音</a>
<a style="display:none" id="per">0</a>
</div>

<br/>

<div style="border:1px solid #eee;padding-bottom:28px;">
音调
<input id="pit" type="range" min="1" max="9" value="2"><br/>
音量
<input id="vol" type="range" min="1" max="15" value="6">
<br/>
语速
<input id="spd" type="range" min="1" max="9" value="2">
</div>

<div id="dMessageError" class="waring"></div>
<br/><br/>


<div style="border:1px solid #eee;padding:9px;border-radius:8px;background:#56a845;color:#fff;margin:9px;" onclick="xx()">播放试听</div>
</div><br/>

<div style="border:1px solid #eee;padding:9px;border-radius:8px;background:#56a845;color:#fff;margin:9px;" onclick="xx('1')">下载语音</div>
</div><br/>


</form>

<script language="javascript">

function sy(id){
if(id==0){
document.getElementById("sa").style.backgroundColor="#ff66BB";
document.getElementById("sb").style.backgroundColor="#fff";
document.getElementById("sc").style.backgroundColor="#fff";
document.getElementById("sd").style.backgroundColor="#fff";
}else if(id==4){
document.getElementById("sa").style.backgroundColor="#fff";
document.getElementById("sb").style.backgroundColor="#ff66BB";
document.getElementById("sc").style.backgroundColor="#fff";
document.getElementById("sd").style.backgroundColor="#fff";
}else if(id==1){
document.getElementById("sa").style.backgroundColor="#fff";
document.getElementById("sb").style.backgroundColor="#fff";
document.getElementById("sc").style.backgroundColor="#ff66BB";
document.getElementById("sd").style.backgroundColor="#fff";
}else if(id==3){
document.getElementById("sa").style.backgroundColor="#fff";
document.getElementById("sb").style.backgroundColor="#fff";
document.getElementById("sc").style.backgroundColor="#fff";
document.getElementById("sd").style.backgroundColor="#ff66BB";
}
document.getElementById("per").innerHTML=id;
}



function xx(idid){
//音调
var pit=document.getElementById("pit").value;
//alert(pit);

//语速
var spd=document.getElementById("spd").value;
//alert(spd);

//音量
var vol=document.getElementById("vol").value;
//alert(vol);

//发音人
var per=document.getElementById("per").innerText;
//alert(per);

//内容
var text=document.getElementById("content").value;

var texts=Math.ceil(text.length/200);

var textarr=new Array();

//百度朗读接口
function audiosrc(pit,spd,vol,per,text){
return "http://tsn.baidu.com/text2audio?tok=<?php echo $token; ?>&tex="+text+"&cuid=baidu_speech_demo&lan=zh&spd="+spd+"&per="+per+"&vol="+vol+"&pit="+pit+"&ctp=1";
}


//暂停或播放
function p(id){
var au=document.getElementById("m");
if(id==1){
au.src=audiosrc(pit,spd,vol,per,text);
au.play();
}else{
au.pause();
}
}

if(idid==1){
location.href=audiosrc(pit,spd,vol,per,text);
}else{
p("1");

}



}
</script>
</div></div>
<p style="background:#eee;padding:12px;text-align:center;"><a href="../">返回游戏</a>---<a href="../../">返回首页</a></p><br/><br/>
<br/><br/>
</body>
</html>