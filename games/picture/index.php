<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD-拍照</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" />
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a onclick="javascript :history.back(-1);"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD-拍照</div><a href="../../admin/file/index.php"><span class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-right-5 H-z-index-100"><label class="H-display-block H-vertical-middle H-font-size-15">后台</label></span></a></header>
<?php
$dir=scandir("image/.");
$path=getcwd();
rsort($dir);
//print_r($dir);
?><img id="img" src="image/<?php echo $dir['0']; ?>" width="100%">
<div class="H-padding-vertical-bottom-10" style="margin:8px">
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color1 H-theme-font-color-white H-theme-border-color1 H-theme-border-color1-click H-theme-background-color1-click H-theme-font-color1-click H-border-radius-3" id="button" onclick="pi();">拍摄</button></div>
</div>
<script>
function pi(){
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
xiugai('button','拍摄中…');
var xhr = new XMLHttpRequest();
xhr.open("POST",url,true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send("wo=yes");
xhr.onreadystatechange = function(){
var XMLHttpReq = xhr;
if (XMLHttpReq.readyState == 4) {
if (XMLHttpReq.status == 200){
var wo_text = XMLHttpReq.responseText;
if(wo_text===''){
xiugai('button','拍摄');
document.getElementById("img").src=wo_text;
}else{
xiugai('button','拍摄');
document.getElementById("img").src=wo_text;
}
}}};}
</script>

<div class="H-clear-both H-width-100-percent H-display-table H-box-sizing-border-box H-padding-horizontal-left-5" style="background:#fff;" Id="wo_text">
<div class="H-padding-vertical-bottom-10"></div>
<?php
$s=count($dir);
if($s>20){
$s=20;
}
for($i=0;$i<$s;$i++){
if($dir[$i]=='.' or $dir[$i]=='..'){
}else{
echo '<div class="H-display-table-cell H-float-left  H-box-sizing-border-box H-width-avg-5 H-padding-horizontal-right-5 H-margin-vertical-bottom-5"><img src="image/'.$dir[$i].'" class="H-width-100-percent H-display-block" onclick="location.href=\'../../admin/wo_dir_file.php?path='.$path.'/image/'.$dir[$i].'&x=image\'"/>
<div class="H-text-align-center H-font-size-10 H-padding-vertical-top-5">'.$dir[$i].'</div></div>';
}}

?>
</body></html>