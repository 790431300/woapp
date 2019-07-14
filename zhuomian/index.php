<?php
require('array.php');
$host='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"];
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<title>沃RD-桌面应用</title>
<link href="../style/hui.css" rel="stylesheet" type="text/css" />
<link href="../style/swiper.min.css?id=1" rel="stylesheet" type="text/css" />
<style>
body{
background: url(<?php echo $wo_body_background_img; ?>);
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size:100%;
}
.H-icon,img{height:50px;width:50px;border-radius:12px;}
</style>
<script src="../script/swiper.min.js"></script>
</head>
<body class="H-height-100-percent">

<div class="H-swiper H-position-relative H-width-100-percent H-box-sizing-border-box H-overflow-scrolling" style="height:100%;">
<div class="swiper-container swiper-3d H-position-absolute H-width-100-percent H-height-100-percent">
<div class="H-padding-vertical-bottom-10"></div>
<div class="swiper-wrapper">


<?php

$value=array_values($woapp);
$app=array_chunk($value,20,true);

foreach($app as $key=>$value){

echo '<div class="swiper-slide">
<div class="H-n-grid H-clear-both">
<div class="H-clear-both">';

foreach($app[$key] as $value){
echo '<div class="H-display-table-cell H-float-left H-box-sizing-border-box H-width-avg-4 H-center-all H-padding-vertical-both-10"><div>
<span class="H-icon H-display-block H-horizontal-center H-border-radius-12" onclick="location.href=\''.$host.'/'.$value['url'].'\'"><img src="'.$host.'/'.$value['icon'].'"></span><label class="H-display-block H-font-size-12 H-theme-font-color3 H-margin-vertical-top-3 H-text-align-center">'.$value['title'].'</label></div></div>';
}
echo '</div></div></div>';
}

?>


</div>
<div class="swiper-pagination">
</div></div></div>

<script type="text/javascript">

var swiper = new Swiper('.swiper-3d', {
pagination: '.swiper-pagination',loop:false,
effect: 'coverflow',grabCursor:false,
coverflow: {
shadow:false,
slideShadows: false,
shadowOffset: 0,
shadowScale: 0
}});

</script>

</body></html>