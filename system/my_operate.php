<?php
date_default_timezone_set('PRC');

/*
*沃微型拓展程序
*QQ:790431300
*/
class myoperate{
var $my_databaselink;//数据库连接

/*增加,表,字段,内容*/
function z($biao,$a,$b){
return mysqli_query($this->my_databaselink,"insert into {$biao} ({$a}) values ({$b})");
}

/*删除数据,变,查a=b*/
function s($biao,$a){
return mysqli_query($this->my_databaselink,"delete from `{$biao}` where {$a}");
}

/*改 表,内容*/
function g($biao,$a,$b){
return mysqli_query($this->my_databaselink,"update `{$biao}` set {$a} where {$b}");
}

/*查*/
function c($z,$biao,$a){
$resname=mysqli_query($this->my_databaselink,"select {$z} from {$biao} where {$a}");
return mysqli_fetch_assoc($resname);

}

/*统计*/
function t($sql){
$result=mysqli_query($this->my_databaselink,$sql);
return mysqli_num_rows($result);
}


/*万能多显*/
function wndx($sql,$text){
$res=mysqli_query($this->my_databaselink,$sql);
while($row=mysqli_fetch_assoc($res)){
echo vsprintf("$text",$row);
}
mysqli_free_result($res);
}

/*万查*/
function wc($sql){
$resname=mysqli_query($this->my_databaselink,$sql);
return mysqli_fetch_assoc($resname);
mysqli_free_result($resname);
}

//删除表
function sb($biao){
return mysqli_query($this->my_databaselink,"drop table if exists {$biao}");
}


/*查登录*/
function user_c($name,$pass){
$resname=mysqli_query($this->my_databaselink,"select * from user where name='$name' and pass='$pass'");
return mysqli_fetch_assoc($resname);
}

/*查资料*/
function user_name($phone){
$resname=mysqli_query($this->my_databaselink,"select * from user_name where phone='$phone'");
$text= mysqli_fetch_assoc($resname);
return $text;
}

//过滤

function guolu($str)
{
    if (empty($str)) return false;
    $str = htmlspecialchars($str);
    $str = str_replace( '/', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace( '(', "", $str);
    $str = str_replace( ')', "", $str);
    $str = str_replace( 'CR', "", $str);
    $str = str_replace( 'ASCII', "", $str);
    $str = str_replace( 'ASCII 0x0d', "", $str);
    $str = str_replace( 'LF', "", $str);
    $str = str_replace( 'ASCII 0x0a', "", $str);
    $str = str_replace( ',', "", $str);
    $str = str_replace( '%', "", $str);
    $str = str_replace( ';', "", $str);
    $str = str_replace( 'eval', "", $str);
    $str = str_replace( 'open', "", $str);
    $str = str_replace( 'sysopen', "", $str);
    $str = str_replace( 'system', "", $str);
    $str = str_replace( '$', "", $str);
    $str = str_replace( "'", "", $str);
    $str = str_replace( "'", "", $str);
    $str = str_replace( 'ASCII 0x08', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace("", "", $str);
    $str = str_replace("&gt", "", $str);
    $str = str_replace("&lt", "", $str);
    $str = str_replace("<SCRIPT>", "", $str);
    $str = str_replace("</SCRIPT>", "", $str);
    $str = str_replace("<script>", "", $str);
    $str = str_replace("</script>", "", $str);
    $str = str_replace("select","",$str);
    $str = str_replace("join","",$str);
    $str = str_replace("union","",$str);
    $str = str_replace("where","",$str);
    $str = str_replace("insert","",$str);
    $str = str_replace("delete","",$str);
    $str = str_replace("update","",$str);
    $str = str_replace("like","",$str);
    $str = str_replace("drop","",$str);
    $str = str_replace("DROP","",$str);
    $str = str_replace("create","",$str);
    $str = str_replace("modify","",$str);
    $str = str_replace("rename","",$str);
    $str = str_replace("alter","",$str);
    $str = str_replace("cas","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace(">","",$str);
    $str = str_replace("<","",$str);
    $str = str_replace(" ",chr(32),$str);
    $str = str_replace(" ",chr(9),$str);
    $str = str_replace("    ",chr(9),$str);
    $str = str_replace("&",chr(34),$str);
    $str = str_replace("'",chr(39),$str);
    $str = str_replace("<br />",chr(13),$str);
    $str = str_replace("''","'",$str);
    $str = str_replace("css","'",$str);
    $str = str_replace("CSS","'",$str);
    $str = str_replace("<!--","",$str);
    $str = str_replace("convert","",$str);
    $str = str_replace("md5","",$str);
    $str = str_replace("passwd","",$str);
    $str = str_replace("password","",$str);
    $str = str_replace("../","",$str);
    $str = str_replace("./","",$str);
    $str = str_replace("Array","",$str);
    $str = str_replace("or 1='1'","",$str);
    $str = str_replace(";set|set&set;","",$str);
    $str = str_replace("`set|set&set`","",$str);
    $str = str_replace("--","",$str);
    $str = str_replace("OR","",$str);
    $str = str_replace('"',"",$str);
    $str = str_replace("*","",$str);
    $str = str_replace("-","",$str);
    $str = str_replace("+","",$str);
    $str = str_replace("/","",$str);
    $str = str_replace("=","",$str);
    $str = str_replace("'/","",$str);
    $str = str_replace("-- ","",$str);
    $str = str_replace(" -- ","",$str);
    $str = str_replace(" --","",$str);
    $str = str_replace("(","",$str);
    $str = str_replace(")","",$str);
    $str = str_replace("{","",$str);
    $str = str_replace("}","",$str);
    $str = str_replace("-1","-1",$str);
    $str = str_replace("操","Cao",$str);
    $str = str_replace(".","",$str);
  $str=str_replace("response","",$str);
    $str =str_replace("write","",$str);
    $str = str_replace("|","",$str);
    $str = str_replace("`","",$str);
    $str = str_replace(";","",$str);
    $str = str_replace("etc","",$str);
    $str = str_replace("root","",$str);
    $str = str_replace("//","",$str);
    $str = str_replace("!=","",$str);
    $str = str_replace("$","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace("&&","",$str);
    $str = str_replace("==","",$str);
    $str = str_replace("#","",$str);
    $str = str_replace("@","",$str);
   $str=str_replace("mailto:","",$str);
    $str = str_replace("CHAR","",$str);
    $str = str_replace("char","",$str);
    return $str;
}

}


$my=new myoperate();
$my->my_databaselink=$my_databaselink;


$_COOKIE['user_name']=$my->guolu(
$_COOKIE['user_name']);
$_COOKIE['user_pass']=$my->guolu(
$_COOKIE['user_pass']);
$_GET['id']=$my->guolu(
$_GET['id']);