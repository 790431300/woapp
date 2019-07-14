host=window.location.host;

var str='<div class="leftd"><span class="leftimg"><img src="../../system/image/robot.jpg"></span><div class="speech left">我太傻了，主人，快教我说话吧！</div></div></div>';

function leftd(text){

text=$("#ltext").html();
var arr=text.split('#沃の#');

$("#msg").append("<div class='leftd'><span class='leftimg'><img src='../../system/image/robot.jpg'></span><div class='speech left'>"+arr['1']+"</div></div>");

var div=document.getElementById("bodycenter");div.scrollTop = div.scrollHeight;

}

function rightd(text){

var arr=text.split('#沃の#');

$("#msg").append("<div class='rightd'><span class='rightimg'><img src='../../system/image/WO_ssh.jpg'></span><div class='speech right'>"+arr['0']+"</div></div>");

var div=document.getElementById("bodycenter");div.scrollTop = div.scrollHeight;

}


function fx(){
var text=$("#content").val();
$("#sub").val("发送中...");

if(text != ''){
fxx(id,text);
}else{
$("#sub").val("发送");
$("#content").focus();
}}


function fxx(id,text){
$.get("api.php?text="+text+"&audioid="+$('#audioid').text(), function(data){
rightd(data);
$("#ltext").html(data);
window.setTimeout(leftd,500);
$("#content").val("");
$("#sub").val("发送");
});
}

function qk(){
$("#msg").html(str);
}


$(function(){
$("body").on("click","#audio1",function(data){
var murl=$("#m").attr("src");
var audiourl=$(this).attr("url");

if(murl != audiourl){
$("#m").attr("src",audiourl);
$(".audio").attr("src","image/2.png");
}else{
$(".audio").attr("src","image/2.png");
}

var au=document.getElementById("m");
if(au.paused){
au.play();
$(this).attr("src","image/4.png");
}else{
m.pause();
$(this).attr("src","image/2.png");
}
});
});

window.setInterval(function(){
var m=document.getElementById("m");
var am=m.ended;
if(am==true){
$(".audio").attr("src","image/2.png");
}
},1000);