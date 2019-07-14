<?php
require('../system/config.php');
require('decide.php');

//echo '<xmp>';
//print_r(get_defined_vars());
//echo '</xmp>';

?><!DOCTYPE html>
<html><head><meta charset="utf-8">
<title>登录到后台</title>
<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"><meta name="format-detection" content="telephone=no">
<meta name="description" content="QQ" />
<meta name="keywords" content="790431300" />
</head><body>

<?php
if($_POST['admin']==$w_admin and $_POST['pass']==$w_pass){

echo '登录成功<script>location.href="admin.php";</script>﻿';

setcookie('w_admin',"{$_POST['admin']}",time()+60*60*24*30,'/');

setcookie('w_pass',"{$_POST['pass']}",time()+60*60*24*30,'/');

}else{
echo '登录不成功';
}
?>

</body></html>