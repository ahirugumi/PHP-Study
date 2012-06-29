<?php
//変数
$hoge = "foo";

$piyo = <<< LENS
70mm-200mm F2.8
400mm F2.8
24mm F1.4
LENS;

//使えない変数名
//数字から始まっている
//-, !, +, @, .を含んでいる
//変数名は、大文字小文字を区別する

//インクリメント、デクリメント
$moge=2;
++$moge;
--$moge;
print $moge;
print "\n";

//組み合わせ演算子
$hoge .= $moge;
print $hoge;
print "\n";

//中括弧でかこって、わかりやすくする
$variable = 'vimvim';
print "{$variable}";

?>
