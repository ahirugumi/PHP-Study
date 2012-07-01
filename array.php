<?php
//配列
//文字のインデックスを持つ
$lens["snnippa"]='さんにっぱ';
$lens["yonnippa"]='よんにっぱ';
$lens["rokuyon"]='ろくよん';
print_r($lens);
//上記と同じ配列
$lens = array('sannippa'=>'さんにっぱ', 'yonnippa'=>'よんにっぱ', 'rokuyon'=>'ろくよん');
print_r($lens);

//数値のインデックスを持つ
$camera[0]='D4';
$camera[1]='D3s';
$camera[2]='D800';
print_r($camera);
//上記と同じ配列
$camera = array(0=>'D4', 1=>'D3s', 2=>'D800');

//数値の配列を持つ
$smile=array('ハッピー', 'サニー', 'ピース', 'マーチ', 'ビューティ');
print_r($smile);

//配列のサイズ
print count($smile);
print "\n===\n";

//文字列配列のループ
foreach ($lens as $key => $value){
  print "キー：$key 値：$value\n";
}
print "===\n";
//数値配列のループ
foreach ($smile as $value){
  print "プリキュア$value\n";
}
print "===\n";
//forでループする
for ($i=0; $i<count($smile); $i++){
  print "スマイルプリキュア：" . $smile[$i] . "\n";
}
print "===\n";
//ループの中で配列を修正
foreach ($smile as $key => $value){
  $value="プリキュア$value";
  print "キー：$key 値：$value\n";
}
print "===\n";

//配列要素の順序
$num[0]=1;
$num[2]=3;
$num[1]=2;
//配列に追加した順に出力される
foreach ($num as $value){
  print "$value\n";
}
print "===\n";
//インデックスの順にまわしたい時は、インデックスを指定しながらループさせる
for ($i=0;$i<count($num);$i++){
  print $num[$i] . "\n";
}
?>
