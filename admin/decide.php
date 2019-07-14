<?php
//登录判断
function logindecide($w_admin,$w_pass){
if($_COOKIE['w_admin'] != $w_admin and $_COOKIE['w_pass'] != $w_pass){
return false;
}else{
return true;
}}

//登录判断结果
$logindecide=logindecide($w_admin,$w_pass);