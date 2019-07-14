<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD-短信管理</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" /><script src="js/pdu.js" type="text/javascript"></script>
<script src="../../script/jquery-1.12.0.min.js" type="text/javascript"></script>
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a onclick="javascript :history.back(-1);"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD-短信管理</div><a href="?t=ok"><span class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-right-5 H-z-index-100"><label class="H-display-block H-vertical-middle H-font-size-15">发短信</label></span></a></header>
<?php
$fs=<<<fs_sms
<p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px">只能发送英文和数字，不支持中文，不懂英语可使用百度翻译→fanyi.Baidu.com</p>
<div style="margin:8px">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
<div class="H-flexbox-horizontal">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-phone H-font-size-18 H-vertical-middle"></i></span><input type="text" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="接收短信的号码" name="phone" value="" id="phone"/></div>
</div><div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-margin-vertical-bottom-10 H-border-vertical-both-after"><textarea class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="短信详细内容，最发送多70个字符..." name="text" id="text">
</textarea></div>
<div class="H-padding-vertical-bottom-10"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color9 H-theme-font-color-white H-theme-border-color9 H-theme-border-color9-click H-theme-background-color9-click H-theme-font-color9-click H-border-radius-3" onclick="fsm();" id="bu">确认发送</button><div class="H-padding-vertical-bottom-10"></div>
<script>

function sms_fs(text){
$.get("write_sms_b.php?text="+text);
alert("已发送");
$("#bu").text("确认发送");
document.getElementById("bu").setAttribute("onclick","fsm();");
}
function fsm(){
phone=$("#phone").val();
if(phone==''){
alert("号码不能为空");
return 0;
}
text=$("#text").val();
$.get("write_sms.php?phone="+phone+"&text="+text,function(data){
setTimeout("sms_fs("+text+")",3000);
document.getElementById("bu").setAttribute("onclick","sms_fs('');");
$("#bu").text("短信发送中,无响应点击这里…");
});
}
</script>

fs_sms;
if($_GET['t']=='ok'){
echo $fs;
exit;
}else{
exec("sudo python set_sms.py");
}
?><p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px;" id="sms_tx"><?php
if($_GET['id']==''){
echo '短信正在加载中，请稍候…<br/>如果失败，你可以-<a href="">重新加载</a></p>';
}else{
echo '稍等，正在加载中……</p><script>
url="'.$_GET['url'].'";
if(url!="ok"){
location.href="?id='.$_GET['id'].'&url=ok";
}
</script>';
}
?>
<div class="H-qq-list" id="sms">
</div>

<script>
function sms_msg(phone,text,id){
str='<div class="H-qq-item H-vertical-middle H-overflow-hidden"><div class="H-flexbox-horizontal H-box-sizing-border-box H-theme-background-color-white H-border-vertical-bottom-after H-clear-both H-padding-horizontal-both-10 H-padding-vertical-both-8 H-touch-active" onclick="location.href=\'sms.php?id='+id+'\'"><div style="width:50px;height:50px;"><img src="../../system/image/WO_sms.jpg" class="H-width-100-percent H-height-100-percent H-display-block H-border-radius-square H-border-both" /></div><div class="H-flex-item H-padding-horizontal-both-10 H-vertical-middle H-overflow-hidden"><div class="H-width-100-percent"><strong class="H-font-weight-normal H-display-block H-font-weight-500 H-font-size-16 H-text-show-row-1">'+phone+'</strong><div class="H-theme-font-color-999 H-font-size-14 H-padding-vertical-top-3 H-text-show-row-1">'+text+'</div></div></div><div class="H-font-size-12 H-theme-font-color-999 white-space-nowrap H-text-align-right"><label class="H-display-block">.</label></div></div></div>';
$("#sms").append(str);
}

$.post("read_sim_sms_all.txt",function(data){
var data_arr=data.split(',');
for(var i=0;i<data_arr.length;i++){
str=getPDUMetaInfo(data_arr[i]);
var arr=str.split("\n");
if(data_arr[i]!=""){
sms_msg(arr[1],arr[9],i);
}}
});


$.get("read_sim_sms_all.php",function(data){
});
</script>
</div>

</body></html>