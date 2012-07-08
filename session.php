<?php
session_start();
$_SESSION['count']=$_SESSION['count']+1;
echo $_SESSION['count'];
?>

