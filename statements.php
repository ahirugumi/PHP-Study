<?php
//if
$hoge = true;
if ($hoge) {
  print "ture\n";
}

//else
$hoge = false;
if ($hoge) {
  print "ture\n";
} else {
  print "false\n";
}

//elseif
$piyo = true;
$moge = false;
if ($piyo){
  print "true\n";
}elseif ($moge){
  print "false\n";
}else{
  print "else\n";
}

//文字列、数値の判定
//==かわりに=を利用して代入されてしまう回避策として、変数とリテラルを逆にするという回避策もある
$moji='ルミナス';
if ('ルミナス'==$moji){
  print "シャイニールミナス\n";
}
$suchi=14;
if (14==$suchi){
  print "14\n";
}
//等しくない
if ('イーグレット'!=$moji){
  print "イーグレットではない\n";
}
//strcasecmpは、1番目の文字列が、2番目の文字列より大きい場合は、正数を返し、小さい場合は、負数を返し、同じ場合は、0(false)を返す
//大文字小文字を無視する
if (!strcasecmp('ルミナス', $moji)){
  print "ルミナスです\n";
}
//大きい、小さい
if (11<$suchi){
  print "11より大きい\n";
}
//文字だと数値に自動変換される為、アルファベット順を使って確実に比較する場合は、strcmpを利用する
//1番目の文字列が、2番目の文字列より大きい場合は、正数を返し、小さい場合は、負数を返し、同じ場合は、0(false)を返す
//大文字小文字を無視しない
$moji1='happy';
if (strcmp($moji1, 'march')<0){
  print "marchのほうが大きい\n";
}
//and or
if ($suchi>10 && $suchi<15){
  print "10より大きくて、15より小さい\n";
}
if ('イーグレット'==$moji || 'ルミナス'==$moji){
  print "イーグレットかルミナス\n";
}

?>
