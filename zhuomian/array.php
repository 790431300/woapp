<?php
/*
*沃RD桌面图标设置
*icon:图标/title:标题
*url:应用地址
*/

$woapp=parse_ini_file('woapp.ini',TRUE);

//背景图片
$img=rand(2,12);
$wo_body_background_img='../picture/bg'.$img.'.jpg';

/*
$app=array(
1=>array(
1=>array('icon'=>'system/image/wo_file.jpg','title'=>'文件管理','url'=>'admin/wo_dir_file.php'),
2=>array('icon'=>'system/image/WO_so.jpg','title'=>'搜索','url'=>'admin/file/search'),
3=>array('icon'=>'system/image/WO_phone.jpg','title'=>'电话','url'=>'games/phone'),
4=>array('icon'=>'system/image/sms.jpg','title'=>'短信','url'=>'games/phone/sms.php'),
5=>array('icon'=>'system/image/cpp.jpg','title'=>'C++','url'=>'games/cpp'),
6=>array('icon'=>'system/image/WO_ssh.jpg','title'=>'终端管理','url'=>'games/ssh'),
7=>array('icon'=>'system/image/WO_c.jpg','title'=>'C语言','url'=>'games/c'),
8=>array('icon'=>'system/image/WO_python.jpg','title'=>'Python','url'=>'games/python'),
9=>array('icon'=>'system/image/php.jpg','title'=>'PHP','url'=>'admin/wo_dir_file.php?path=games/php'),
10=>array('icon'=>'system/image/WO_perl.png','title'=>'Perl','url'=>'games/perl'),
12=>array('icon'=>'system/image/WO_mysql.jpg','title'=>'MySQL','url'=>'admin/mysql'),
16=>array('icon'=>'system/image/shezhi.jpg','title'=>'设置','url'=>'games/wo/'),
13=>array('icon'=>'system/image/WO_pz.jpg','title'=>'相机','url'=>'games/image'),
14=>array('icon'=>'system/image/app.jpg','title'=>'应用商店','url'=>'games/wo_app'),
15=>array('icon'=>'picture/http.jpg','title'=>'网站管理','url'=>'games/wo_http'),
11=>array('icon'=>'system/image/java.jpg','title'=>'JAVA','url'=>'games/java'),
),

2=>array(
1=>array('icon'=>'system/image/WO_wzq.jpg','title'=>'五子棋','url'=>'games/wzq/index.htm'),
2=>array('icon'=>'picture/baidu.jpg','title'=>'百度搜索','url'=>'url.php?url=http://baidu.com')
)
);



*/