<?php
require('../system/config.php');
require('decide.php');

if($logindecide==false){
header('location:index.php');
}else{
header("location:file/index.php");
}