<?php
require('../../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');
?>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>人工智障</title>
<link href="css/robot.css?v=3" rel="stylesheet" type="text/css"/><script src="js/jq.min.js?v=0" type="text/JavaScript"></script><script src="js/hd.js?v=1" type="text/JavaScript"></script>
<script src="js/robot.js?v=1" type="text/JavaScript"></script>
</head>

<body id="body">
<div style="display:none">
<audio id="m" src=""></audio>
<div id="audioid">1</div>
<div id="ltext"></div>
</div>

<div id="header">
<div id="hd" class="bd">
<ul>
<li id="nav">
<a href="admin">教导培训</a>
<a onclick="qk()">清空消息</a></li>
</ul><ul>
<li id="nav">
<a href="../../">返回首页</a>
<a href="../../admin/wo_dir_file.php?path=/var/www/html/games/robot">整体改造</a>
</li>
<ul>
</div></div>


<div id="bodycenter">
<div id="msg">

<div class="leftd"><span class="leftimg">
<img src="../../system/image/robot.jpg"></span>
<div class="speech left">你好，我的主人，现在的我处于智障阶段，如果你想要我更加智能，点击教导培训，给我添加知识吧！</div></div>

<div class="leftd"><span class="leftimg">
<img src="../../system/image/robot.jpg"></span>
<div class="speech left"><img id="audio1" class="audio" url="mp3/2.mp3" src="image/2.png" height="35px" width="35px"></div></div>

</div></div>

<div id="dFoot">
<form method="get" action="" id="form">
<input type="hidden" value="" id="id"/>
<textarea class="input" id="content" cols="10" rows="1" placeholder="你想对我说什么？" maxlength="500" ></textarea><input id="sub" value="发送" type="button" class="input" onclick="fx()"></form>
</div>

<script type="text/javascript">
TouchSlide({slideCell:"#header"});
</script>

</body>
</html>