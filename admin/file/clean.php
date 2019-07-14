<?php
exec("sudo apt-get autoclean");
exec("sudo apt-get clean");
exec("sudo apt-get autoremove");
sleep(5);
header("location:index.php");