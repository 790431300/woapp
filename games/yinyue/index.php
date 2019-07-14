<!DOCTYPE html><html><head>
  <meta charset="UTF-8">
  <meta name="applicable-device" content="mobile">
  <title>音乐，免费音乐，音乐下载</title>
  <meta name="description" content="搜索音乐，免费下载音乐，最全最好听的音乐，最新音乐免费下载">
  <meta name="keywords" content="html5">
  <meta name="author" content="langrensha.co"> 
  <meta name="Copyright" content="langrensha.co">
  <meta name="apple-touch-fullscreen" content="YES">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="style/frozen.css" media="screen" type="text/css">

</head>
<body>

        <style>
            .title { padding-left: 15px; line-height: 48px; font-size: 20px; color:
            #00A5E3; }
            .ui-list{margin-bottom: 20px;}
            body>a{display: none;}

/*搜索*/
form,input{margin:0;padding:0;}
form{background:#33eeff;height:38px;text-align:center;margin:0;padding:5px;box-shadow: 2px 2px 2px rgba(0,0,0,0.2);}
.input{height:100%;font-size:15px;border:none;box-sizing: border-box;-webkit-box-sizing: border-box;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);border-radius:1px;background:#fff;padding:5px;}
#text{width:70%;height:100%;vertical-align:middle;overflow:hidden;clip:rect(0px,0px,22px,0px);color:#454546;}
#sub{width:23%;height:100%;vertical-align:middle;overflow:hidden;clip:rect(0px,0px,22px,0px);background:#f4f4f4;color:#454546;}


        </style>
<form method="GET" action="" id="form">
<input type="text" name="text" placeholder="输入歌名" class="input" id="text" value="">
<input id="sub" value="搜索" type="submit" name="sub" onclick="tishi" class="input">
</form>


<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
if(!$_GET['text']){
echo "<p style='padding:12px'>输入你想听的歌名开始搜索吧！</p>";
}else{
?>

<ul class="ui-list ui-list-function ui-border-tb">
<?php

function audio($text){
$m=file_get_contents("http://mobilecdn.kugou.com/api/v3/search/song?format=jsonp&keyword={$text}&page=1&pagesize=10&showtype=1&callback=kgJSONP238513750");

$m=ltrim($m,"kgJSONP238513750(");
$m=rtrim($m,")");
$m=json_decode($m,true);
return $minfo=$m['data']['info'];
}

function audio_hash($hash){
$m=file_get_contents("http://m.kugou.com/app/i/getSongInfo.php?cmd=playInfo&hash={$hash}");
return $j=json_decode($m,true);
}

$audio=audio($_GET['text']);


if(!$audio){
echo '<div class="ui-center" style="height:100px;">';


exit("没有搜索到，试试-<a href='https://www.baidu.com/from=844b/s?ts=9566609&t_kt=0&ie=utf-8&fm_kl=021394be2f&rsv_iqid=4054288657&rsv_t=acd9%252B3bCoKN2DQj3GePt7J0eLcTfmDwKpSy86xQwRte4DT2D7l3GtZwF5g&sa=ib&ms=1&rsv_pq=4054288657&rsv_sug4=3135&ss=010&inputT=390&word={$_GET['text']}' class=''>百度一下</a></div>");
}

foreach($audio as $value){

/*
$hash=audio_hash($value['hash']);
$imgsrc=str_replace("{size}","80",$hash['imgUrl']);
*/

echo "<li><div class='ui-list-info ui-border-t' style='height:50px'><a><h4>{$value['filename']}</h4></a></div><a href='http://langrensha.co/games/yinyue/audio.php?hash={$value['hash']}' class='ui-btn'>播放</a></li>";
}

}
?>
</ul>

<div style="background:#eee;padding:8px;text-align:center;"><a href="../">返回游戏</a>---<a href="../../">返回首页</a></div>
</body></html>