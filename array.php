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

print "===\n";
//あるキーを持つ要素が存在するかどうかチェックする
if (array_key_exists('sannippa', $lens)){
  print "さんにっぱは存在します。\n";
}
if (array_key_exists('nini', $lens)==false){
  print "にーにーは存在しません。\n";
}
//ある値を持つ要素が存在するかどうかチェックする
if (in_array('さんにっぱ', $lens)){
  print "さんにっぱは存在します。\n";
}
if (in_array('にーにー', $lens)==false){
  print "にーにーは存在しません。\n";
}
//ある値を持つ要素のキーを取得する
print array_search('さんにっぱ', $lens);

print "\n===\n";
//配列の修正
$wide_lens[0]='24mm F1.4';
$wide_lens[1]='14mm-24mm F2.8';
print "$wide_lens[1]\n";
$wide_lens[1]='35mm F1.4';
print "$wide_lens[1]\n";

print "===\n";
//配列から要素を取り除く
unset($wide_lens[1]);
print_r($wide_lens);
print "===\n";

//配列から文字列を作成する
print implode(', ', $smile) . "\n";
//文字列から配列を作成する
$futariha=explode(',', 'ホワイト,ブラック');
print_r($futariha);
print "===\n";

//配列の並び替え
//要素の値で並び替え
$five55=array('dream', 'rouge', 'lemonade', 'mint', 'aqua');
//昇順
print "sort:昇順\n";
sort($five55);
print_r($five55);
//降順
print "rsort:降順\n";
rsort($five55);
print_r($five55);
//連想配列でも要素の値で並び替え
$five55_1=array('dream'=>'ドリーム', 'rouge'=>'ルージュ', 'lemonade'=>'レモネード', 'mint'=>'ミント', 'aqua'=>'アクア');
//昇順
print "asort:昇順\n";
asort($five55_1);
print_r($five55_1);
//降順
print "arsort:降順\n";
arsort($five55_1);
print_r($five55_1);
//要素のキーで並び替え
//昇順
print "ksort:昇順\n";
ksort($five55_1);
print_r($five55_1);
//降順
print "krsort:降順\n";
krsort($five55_1);
print_r($five55_1);
//連想配列だとキーが数値に変換されてしまう
print "sort:連想配列\n";
sort($five55_1);
print_r($five55_1);
print "===\n";

//多次元配列
$futariha_precure=array('ふたりはプリキュアSplash_Star'=> array('bloom'=>'ブルーム', 'eaglet'=>'イーグレット'), 
                'ふたりはプリキュア'=> array('black'=>'ブラック', 'white'=>'ホワイト'));
//通常の配列を同じ
print $futariha_precure['ふたりはプリキュア']['white'] . "\n";
foreach ($futariha_precure as $pre_buf => $pre_array){
  foreach ($pre_array as $pre_array_buf => $cure){
    print "$pre_buf: $pre_array_buf - $cure\n";
  }
}
?>
