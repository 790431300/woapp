<?php
$ssh=exec($_GET['text']);

echo "<div class='rightd'><span class='rightimg'><img src='../../system/WO_logo.jpg'></span><div class='speech right'>{$_GET['text']}</div></div>";
if($ssh==''){
echo "<div class='leftd'><span class='leftimg'><img src='../../system/image/WO_ssh.jpg'></span><div class='speech left'>指令 {$_GET['text']} 输出空白</div></div>";
}else{
echo "<div class='leftd'><span class='leftimg'><img src='../../system/image/WO_ssh.jpg'></span><div class='speech left'>{$ssh}</div></div>";
}