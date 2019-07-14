<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="applicable-device" content="mobile"/><title>沃WD-shell控制台</title><meta name="keywords" content=""/><meta name="description" content=""/><meta name="apple-touch-fullscreen" content="YES" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="format-detection" content="telephone=no" /><link rel="stylesheet" href="../file/css.css" media="screen" type="text/css" />
<script src="../../script/jquery-1.12.0.min.js"></script>
</head>
<body><html>
<style>
/*滚*/
#bodycenter{position:absolute;top:0px;z-index:5;bottom:10px;overflow:scroll;overflow-x:hidden;width:100%;height:40%;}
#bodycenter::-webkit-scrollbar{width:3px;}#bodycenter::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);-webkit-border-radius: 10px;border-radius: 10px;}#bodycenter::-webkit-scrollbar-thumb{-webkit-border-radius: 10px;/*guigs.cn*/border-radius: 10px;background: rgba(255,0,0,0.8);-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);}#bodycenter::-webkit-scrollbar-thumb:window-inactive{background: rgba(255,0,0,0.4);}
</style>
<div id="bodycenter">
<xmp id="textarea" contenteditable="true">欢迎使用沃WD-shell控制器
输入:清屏，你懂的
输入:文件管理，可跳转管理
输入:返回，可跳转到来源页面
<?php echo exec('hostname'); ?>:~#</xmp></div>

<script type="text/javascript">
function $(id){
return document.getElementById(id);
}
function wo_post(id,url,msg,ssh,b){
if(ssh=='清屏'){
$(id).innerHTML=' ';
return false;
}else if(ssh=='文件管理'){
location.href="../wo_dir_file.php";
return false;
}else if(ssh=='返回'){
window.history.back();
return false;
}else if(ssh==''){
return false;
}
var xhr = new XMLHttpRequest();
xhr.open("POST",url,true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send(msg);
xhr.onreadystatechange = function(){
var XMLHttpReq = xhr;
if (XMLHttpReq.readyState == 4) {
if (XMLHttpReq.status == 200){
var htext = XMLHttpReq.responseText;
if(htext=='error0'){
alert('出错了');
}else{
htext==''?htext='指令 '+ssh+' 输出空白':'';
$(id).innerText+=htext+b;

$("bodycenter").scrollTop = $(id).scrollHeight;
}

}}};}


function ssh(id,ssh){

str=$(id).innerText;
var strup=str.lastIndexOf(ssh);
str=str .substring(strup,str .length);
strend=str.charAt(str.length - 1);
if(strend=='\n'){
var str = str.replace("\n",'');
var str = str.replace("\n",'');
var ssh = ssh.replace("\n",'');
var str = str.replace(ssh,'');
//alert(str);
wo_post(id,"../pi.php?type=ssh","type=shell&shell="+str,str,"\n"+ssh);
}

}
ssh('textarea','<?php echo exec('hostname'); ?>:~#');

window.setInterval("ssh('textarea','<?php echo exec('hostname'); ?>:~#');",1000);

</script>

</body></html>