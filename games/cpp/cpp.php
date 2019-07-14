<?php
$myfile = fopen("test.cpp", "w") or die("Unable to open file!");
fwrite($myfile,$_POST['cpp']);
fclose($myfile);

exec("sudo g++ test.cpp -o test 2>error.txt");
exec("./test",$arr);

foreach ($arr as $value){
echo $value;
}

echo file_get_contents('error.txt');