<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="applicable-device" content="mobile"/><title>沃WD音乐播放器</title><meta name="keywords" content=""/><meta name="description" content=""/><meta name="apple-touch-fullscreen" content="YES" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="style/css.css" media="screen" type="text/css" />
<script type="text/javascript">
var playlist=[];
var bglist=[
"style/WO_bg.jpg",
"style/WO_bg.jpg",
"style/WO_bg.jpg",
"style/WO_bg.jpg",
"style/WO_bg.jpg",
]
</script>
</head><body>
<div id="hash" style="display:none"><?php echo $_GET['hash']; ?></div>
<span class="tcbtn" style="top:5px;left:5px;" onclick="hfclick();">换肤</span>
<span class="tcbtn" style="right:5px;top:5px;" onclick="location.href='../../admin/file/index.php'">首页</span>
<div id="newlrcId" style="">
<div class="bg" id="bgid"></div>
<div class="filter"></div>
<div class="main">
<p class="song" id="songNameid">随便听听</p>
<div class="lrc" id="lrctextId">
<div id="llrcId" style="overflow: hidden;">
<div>随便听听</div></div></div>
<div class="newfoot">
<p class="time"><span id="currTimeId">00:00</span><span class="fr" id="totalTimeId">00:00</span></p> <div style="width:100%;padding:5px 0;" id="clickbarid">  <div class="line_bar">  <ul><li style="width:0px;"><em id="youwid" style="width:0px;"></em></li></ul><span class="play_icon" id="ydbtnid" style="left:0px;"></span>

 </div> </div>
 <div class="play_m"> <a href="javascript:;" id="newprevid"><img onclick="prevsong();" src="style/1.png" width="29"></a> <a href="javascript:;" id="ctrlBtnId3"><img id="playstopid" onclick="playstopop();" src="style/2.png" width="29"></a> <a href="javascript:;" id="newnextid"><img onclick="nextsong();" src="style/3.png" width="29"></a> </div></div></div></div>
<div id="playHTMLId" style="display: none;">
<audio id="mediaPlayId" onended="managerPlst('statDivId');" onloadstart="loadStatus('statDivId');" onplaying="playStatus('statDivId')" onpause="pauseStatus('statDivId')" onerror="loadError('statDivId')" ontimeupdate="updateMethod('statDivId')" mozaudiochannel="content" controls>
</audio></div>
<div style="position: absolute;display:none;z-index: 1000;top: 50px;left: 0px;" id="statDivId"></div>
<script src="style/js.js"></script>
</body></html>