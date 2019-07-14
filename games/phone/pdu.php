<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD-PDU编码/解码</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" /><script src="js/pdu.js" type="text/javascript"></script>
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<header class="H-header H-theme-background-color1" id="header"><a onclick="javascript :history.back(-1);"><span tapmode="" class="H-icon H-position-relative H-display-inline-block H-float-left H-vertical-middle H-theme-font-color-white H-padding-horizontal-left-5 H-z-index-100"><i class="H-iconfont H-icon-arrow-left H-font-size-18 H-vertical-middle"></i><label class="H-display-block H-vertical-middle H-font-size-15">返回</label></span></a>
<div class="H-header-title H-center-all H-font-size-18 H-text-show-row-1 H-theme-font-color-white H-position-absolute H-width-100-percent">沃RD-PDU编码/解码</div></header>
<p class="H-padding-horizontal-both-10 H-font-size-15" style="padding:8px">
使用GSM/GPRS AT指令发送中文短信，汉字时，需要先将短信内容编码成PDU格式，然后通过AT+CMGS AT+CMGW等指令发送。
<br/><b>注意：</b>需要先通过AT+CMGF=0指令将GSM/GPRS模块设置为PDU模式 </p>
<div align="center">

  <form name="pduToStringForm">
  <table border="0" cellpadding="0" cellspacing="16">
  <tbody>
  <tr>
    <td align="center">16进制PDU消息</td>
    <td align="center">7/8/16位PDU消息(已解码)</td>
  </tr>
  <tr>
    <td align="center" valign="top"><textarea name="smsText" rows="10" wrap="VIRTUAL"><?php echo$_GET['pdu']; ?></textarea>
    </td>
    <td valign="top"><textarea name="smsOut" rows="10" wrap="VIRTUAL"></textarea></td>
  </tr>
 
   <tr>
    <td align="center"><input onclick="smsOut.value=getPDUMetaInfo(document.pduToStringForm.smsText.value);" size="11" value="  转换  " name="checkButton" type="button"></td>
   </tr></tbody></table>
</form>
<hr />
<form name="stringToPduForm">
<table border="0" cellpadding="0" cellspacing="16">
  <tbody>

  <tr>
    <td align="center">短信息(未编码)</td>
    <td align="center">16进制PDU消息</td>
  </tr>

  <tr>
    <td align="center" valign="top">
	<table border="0" cellpadding="0" cellspacing="8">
	<tbody>
    <tr>
		<td>短信息中心号码</td>
		<td><input name="smscNumber" size="15" value="+8613800210500" type="text"></td>
	</tr>

	<tr>
		<td>接收方号码</td>
		<td><input name="phoneNumber" size="15" value="10086" type="text"></td>
	</tr>

	<tr>
	<td>字符位数</td><td>
	<input name="size" value="7" onclick="maxkeys = 140;" type="radio">7<input name="size" value="8" onclick="maxkeys = 140;" type="radio">8<input checked="checked" name="size" value="16" onclick="maxkeys = 70;" type="radio">16
	</td>

	</tr>

</tbody></table>
	<textarea name="smsText" rows="6" wrap="VIRTUAL" onchange="change(this)" onkeyup="change(this)">How are you?</textarea>
    </td>

    <td valign="top">
	<textarea name="pduOut" rows="10" wrap="VIRTUAL"></textarea>
    </td></tr>
  <tr>
    <td align="center"><input onclick="pduOut.value= stringToPDU(document.stringToPduForm.smsText.value.substring (0, maxkeys),document.stringToPduForm.phoneNumber.value,document.stringToPduForm.smscNumber.value,document.stringToPduForm.size);" size="11" value="  转换  " name="stringButton" type="button"></td>
 </tr></tbody>
</table> 
</form>
		
</div><center>
技术支持: QQ:790431300
</center><br/><br/>
</body>
</html>