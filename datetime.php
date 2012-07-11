<?php
print "strftime()：" . strftime('%c') . "\n";
print "date()：" . date('r') . "\n";

//よくある日本でのフォーマット
print "strftime() YYYY/MM/DD HH:MI:SS：" . strftime('%Y/%m/%d %H:%M:%S') . "\n";
print "date() YYYY/MM/DD HH:MI:SS：" . date('Y/m/d H:i:s') . "\n";

//タイムスタンプ
$timestamp=mktime(14, 12, 13, 05, 20, 1992);
print $timestamp . "\n";
print strftime('%Y/%m/%d %H:%M:%S', $timestamp) . "\n";

//文字列をタイムスタンプに変換する
$timestamp = strtotime("tomorrow");
print strftime('%Y/%m/%d %H:%M:%S', $timestamp) . "\n";
?>
