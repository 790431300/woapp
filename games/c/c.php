<?php
$myfile = fopen("test.c", "w") or die("Unable to open file!");
fwrite($myfile,$_POST['c']);
fclose($myfile);


//*C需要转汇编
//exec("sudo gcc -S -o test.asm test.c");

exec("sudo gcc -o test test.c 2>error.txt");
exec("./test",$arr);

foreach ($arr as $value){
echo $value;
}

echo file_get_contents('error.txt');