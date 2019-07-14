<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD-C语言编译器</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" />
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a onclick="javascript :history.back(-1);"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD-C语言编译器</div><a href="../../admin/file/index.php"><span class="H-icon H-position-relative H-display-inline-block H-float-right H-vertical-middle H-theme-font-color-white H-padding-horizontal-right-5 H-z-index-100"><label class="H-display-block H-vertical-middle H-font-size-15">后台</label></span></a></header>
<p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px">输入C代码，点击确认运行即可，<a href="od.php">查看编译结果<a></p>
<form action="c.php" method="post" style="margin:0 8px">
<div class="H-padding-vertical-bottom-10"></div>
<div class="H-flexbox-horizontal H-border-vertical-bottom-margin-left-10-after">
</div>
<div class="H-flexbox-horizontal H-margin-vertical-bottom-10 H-border-vertical-both-after"><textarea class="H-textbox H-vertical-align-middle H-vertical-middle H-font-size-16 H-flex-item H-box-sizing-border-box H-border-none H-outline-none H-padding-12" placeholder="C语言内容" name="c" id="text" style="height:300px"><?php echo file_get_contents("test.c"); ?></textarea></div>
<div class="H-padding-vertical-bottom-10"></div>
<button class="H-button H-width-100-percent  H-font-size-15 H-outline-none H-padding-vertical-both-12 H-padding-horizontal-both-20 H-theme-background-color9 H-theme-font-color-white H-theme-border-color9 H-theme-border-color9-click H-theme-background-color9-click H-theme-font-color9-click H-border-radius-3" onclick="fsm();" id="bu">确认运行</button><div class="H-padding-vertical-bottom-10"></div></form>

</body></html>