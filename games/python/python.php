<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" /><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><title>沃RD-python编译结果</title>
<link href="../../style/hui.css" rel="stylesheet" type="text/css" />
<style>.y{display:none;}.x{display:auto;}</style>
</head><body>
<?php
$myfile = fopen("test.py", "w") or die("Unable to open file!");
fwrite($myfile,$_POST['python']);
fclose($myfile);

exec("sudo python test.py 2>error.txt",$arr);

foreach ($arr as $value){
echo $value;
}

echo file_get_contents('error.txt');