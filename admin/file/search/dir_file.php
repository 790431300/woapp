<?php
//chdir('/var/www/html');
//QQ:790431300
$path=$_GET['path'];




function wo_arr($path){
$handler=opendir($path);
while(($filename=readdir($handler))!==false){
if($filename != "." && $filename != ".."){            if(is_dir($path."/".$filename)){
echo $path."/".$filename.'#WO#';
wo_arr($path."/".$filename);
}else{
echo $path."/".$filename.'#WO#';
}}}
closedir($path);
}
wo_arr($path);
exit();

//阴
function yin_dir_file($path,$id){
$dirs=scandir($path);
foreach($dirs as $v){
if($v=='.' or $v=='..'){
}else{
if(is_dir($path.'/'.$v)){
echo $path.'/'.$v.'#WO#';
yang_dir_file($path.'/'.$v,'a');
}else{
echo $path.'/'.$v.'#WO#';
}}
}}

//阳
function yang_dir_file($path,$id){
$dir=scandir($path);
foreach($dir as $value){
if($value=='.' or $value=='..'){
}else{
if(is_dir($path.'/'.$value)){
echo $path.'/'.$value.'#WO#';
yin_dir_file($path.'/'.$value,'b');
}
if(is_file($path.'/'.$value)){
echo $path.'/'.$value.'#WO#';
}}}}

//阴阳结合
yin_dir_file($path);