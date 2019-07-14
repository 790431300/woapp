<?php
require('../../../global.php');
require('system/config.php');
require('system/my_connection.php');
require('system/my_operate.php');
require('system/wo_dir_file.php');
require('admin/decide.php');

//如果没登录后台
if($logindecide==false){
header('location:admin.php');
exit();
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD文件管理</title>
<link href="../../../style/hui.css" rel="stylesheet" type="text/css" /><script src="../../../script/h.js" type="text/javascript"></script>
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a href="JavaScript:history.back();"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">文件搜索</div></header>
<div style="margin:8px">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-level H-font-size-18 H-vertical-middle"></i></span>
<input type="text" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="搜索的路径" id="path" mame="path" value="<?php echo getcwd(); ?>"/></div>
<div class="H-flexbox-horizontal">
<span class="H-icon H-vertical-middle H-padding-horizontal-left-10 H-theme-background-color-white"><i class="H-iconfont H-icon-com H-font-size-18 H-vertical-middle"></i></span><input type="text" class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="目录/文件关键词" mame="dir_file" id="dir_file" />
</div>
<div class="H-padding-vertical-bottom-10"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" id="button" onclick="so_dir_file();">搜索</button></div>
</div><div class="H-padding-vertical-bottom-10" id="wo_text" style="padding:8px"></div>


<script>
function so_dir_file(){
so('api.php');
}
/*获取内容*/
function huoqu(id){return document.getElementById(id).innerHTML;}
/*修改内容*/
function xiugai(id,text){document.getElementById(id).innerHTML=text;}
/*获value*/
function $value(id){return document.getElementById(id).value;}
/*修value*/
function $xiuvalue(id,text){return document.getElementById(id).value=text;}
/*追加value*/
function $zhuivalue(id,text){return document.getElementById(id).value+=text;}
/*追加*/
function zhuijia(id,text){
document.getElementById(id).innerHTML+=text;}

function so(url){
H.toastLoading("搜索中");
wopost='path='+$value("path")+'&dir_file='+$value("dir_file");
xiugai('button','搜索中…');
var xhr = new XMLHttpRequest();
xhr.open("POST",url,true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send(wopost);
xhr.onreadystatechange = function(){
var XMLHttpReq = xhr;
if (XMLHttpReq.readyState == 4) {
if (XMLHttpReq.status == 200){
var wo_text = XMLHttpReq.responseText;
if(wo_text===''){
xiugai('button','搜索');
xiugai('wo_text',wo_text);
H.closeToast();
}else{
xiugai('button','搜索');
xiugai('wo_text',wo_text);
H.closeToast();
}

}}};}

</script>

</body></html>