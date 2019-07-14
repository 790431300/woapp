<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD-汇编</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" />
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a onclick="javascript :history.back(-1);"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD-汇编</div><a href="../../admin/file/index.php"><span class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-right-5 H-z-index-100"><label class="H-display-block H-vertical-middle H-font-size-15">后台</label></span></a></header>
<p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px">下面是可执行文件内容<br/><link href="../../admin/file/css.css" rel="stylesheet" type="text/css" /><div id="textarea"><?php

exec("od -t x1 test",$array);
echo '一共有'.count($array).'行<br/>';
foreach ($array as $value){
echo $value.'<br/>';
}
?></div>
</body></html>