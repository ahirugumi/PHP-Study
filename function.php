<?php
//関数
function hoge_function($arg){
  print "{$arg}でhoge_functionが呼び出されました。\n";
}

//関数の呼び出し
hoge_function('test');

//関数のデフォルト値
function hoge_function1($arg = 'default'){
  print "{$arg}でhoge_function1が呼び出されました。\n";
}
//引数なしで関数の呼び出し
hoge_function1();
//関数のデフォルト値を用意し、引数を複数、作成したい場合は、デフォルト値がある引数を後ろに記述する
function hoge_function2($arg1, $arg2='default'){
  print "{$arg1}と{$arg2}でhoge_function2が呼び出されました。\n";
}
//引数を１つ渡す場合と２つ渡す場合
hoge_function2('test1');
hoge_function2('test1', 'test2');

//引数の値渡し
function hoge_function3($arg){
  $arg++;
  print "args:{$arg}\n";
}
$piyo=1;
hoge_function3($piyo);
print "piyo:{$piyo}\n";

//引数の参照渡し
function hoge_function4(&$arg){
  $arg++;
  print "args:{$arg}\n";
}
$piyo=1;
hoge_function4($piyo);
print "piyo:{$piyo}\n";

//関数の戻り値
function hoge_function5(){
  $ret='moge';
  return $ret . "\n";
}
print hoge_function5();

//スコープ
//関数の中と外では、スコープが別
$val='ルミナス';
function hoge_function6(){
  $val='ブラック';
  print $val . "\n";
}
hoge_function6();
print $val . "\n";

//スーパーグローバル $GLOBALS
$val1='ドリーム';
function hoge_function7(){
  $val1='レモネード';
  print $val1 . "\n";
  print $GLOBALS['val1'] . "\n";
  $GLOBALS['val1'] = 'ハッピー';
}
print $val1 . "\n";
hoge_function7();
print $GLOBALS['val1'] . "\n";

//ローカルスコープの変数をグローバルスコープにする global
$val2='ピーチ';
function hoge_function8(){
  global $val2;
  print $val2 . "\n";
  $val2='イーグレット';
}
print $val2 . "\n";
hoge_function8();
print $val2 . "\n";

?>
