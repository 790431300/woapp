<?php
$myfile = fopen("test.s", "w") or die("Unable to open file!");
fwrite($myfile,$_POST['asm']);
fclose($myfile);

exec("gcc test.s -o test 2>error.txt");
exec("./test",$arr);

foreach ($arr as $value){
echo $value;
}

echo file_get_contents('error.txt');