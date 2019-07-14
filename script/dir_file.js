function wo_post(url,msg,text){
//url='http://'+window.location.host+'/admin/'+url;
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
H.alert(text);
}else{
if(htext=='ok'){
location.href="";
}else{
if(htext.length>250){
alert(htext);
}else{
H.alert(htext);
}
}
}}}};}
function $WO(id){
return document.getElementById(id);
}

function aleft(id){
if(id==1){
$WO('aleft').setAttribute("class","H-flexbox-vertical animated bounceInLeft x");
}else{
$WO('aleft').setAttribute("class","H-flexbox-vertical animated slideOutLeft");
}}
function mkdir(path){
if(path.indexOf("*") != -1){
H.alert("创建失败，文件名不准带*号，否则你会后悔");
}else{
wo_post("pi.php?type=mkdir",path,"创建失败");
}
}
function mkfile(path){
if(path.indexOf("*") != -1){
H.alert("创建失败，文件名不准带*号，否则你会后悔");
}else{
wo_post("pi.php?type=mkfile",path,"创建失败");
}
}

function rename(path){
if(path.indexOf("*") != -1){
H.alert("重命名失败，文件名不准带*号，否则你会后悔");
}else{
H.prompt(function (ret){if(ret.buttonIndex==1){
wo_post("pi.php?type=rename","type=rename&a="+path+"&path="+ret.text,"重命名失败");
}
}, '重命名','请输入新名字',path);
}}


function rmdir(path){
H.confirm(function (ret) {
if(ret.buttonIndex==1){
wo_post("pi.php?type=rmdir","type=rmdir&path="+path,"删除失败");
}else{
//取消删除
}
}, '删除:'+path,'数据珍贵，为保安全限制只删除5层目录，确认删除吗？');
}


function unzip(path){
H.prompt(function (ret){if(ret.buttonIndex==1){
wo_post("pi.php?type=unzip","type=shell&shell=unzip -o "+path+" -d "+ret.text,"解压失败");
}
}, '解压文件','解压到什么路径？',path);
}


function copy(path){
H.prompt(function (ret){if(ret.buttonIndex==1){
wo_post("pi.php?type=copy","type=copy&path="+path+"&a="+ret.text,"复制失败");
}
}, '复制文件','复制到什么位置？',path);
}