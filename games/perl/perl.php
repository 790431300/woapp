<?php
$myfile = fopen("test.pl", "w") or die("Unable to open file!");
fwrite($myfile,$_POST['perl']);
fclose($myfile);

exec("sudo perl test.pl 2>error.txt",$arr);

foreach ($arr as $value){
echo $value;
}

echo file_get_contents('error.txt');