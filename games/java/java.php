<?php
$myfile = fopen("test.java", "w") or die("Unable to open file!");
fwrite($myfile,$_POST['java']);
fclose($myfile);

exec("javac test.java 2>error.txt");
exec("java test",$arr);

foreach ($arr as $value){
echo $value;
}

echo file_get_contents('error.txt');