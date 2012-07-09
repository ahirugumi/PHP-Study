<?php
setcookie('hage', 'piyo', time()+60*60*24, '/~tomohiro/', 'localhost');
echo $_COOKIE['hage'];
?>

