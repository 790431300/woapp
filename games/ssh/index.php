<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>沃RD-SSH控制器</title>
<link href="css/robot.css" rel="stylesheet" type="text/css"/><script src="../../script/jquery-1.12.0.min.js" type="text/JavaScript"></script>
<script>
function qk(){
$("#msg").html("");
}
function fx(){
var text=$("#content").val();
$("#sub").val("发送中...");
if(text != ''){
fxx(text);
}else{
$("#sub").val("发送");
$("#content").focus();
}}


function fxx(text){
$.get("ssh.php?text="+text,function(data){
if(data != ""){
$("#msg").append(data);
}
$("#content").val("");
$("#sub").val("发送");
document.getElementById("bodycenter").scrollTop = div.scrollHeight;
});
}

</script>
</head>
<body id="body">
<div style="display:none">
<audio id="m" src=""></audio>
<div id="audioid">1</div>
<div id="page">2</div>
<div id="qq">790431300</div>
<div id="nicheng">沃</div>
</div>

<div id="header">
<div id="hd" class="bd">
<ul>
<li id="nav"><a href="JavaScript:window.history.back();">返回</a><a href="../../admin/file/ssh.php">常用SSH</a><a onclick="qk()">清屏</a></li>
</ul>
</div></div>

<div id="bodycenter">
<div id="msg">
<div class="leftd"><span class="leftimg">
<img src="../../system/image/WO_ssh.jpg"></span>
<div class="speech left" style="color:red">沃WD-SSH管理器-对话模式
常用命令
ls filename 获取当前目录和文件
nano filename 编辑文件
find / -name filename 搜索文件
chmod -R 777 filename 修改文件权限
</div></div>


</div></div>

<div id="dFoot">
<form method="get" action="" id="form">
<input type="hidden" value="" id="id"/>
<textarea class="input" id="content" cols="10" rows="1" placeholder="请输入指令..." maxlength="500" ></textarea><input id="sub" value="发送" type="button" class="input" onclick="fx()"></form>
</div>

</body>
</html>