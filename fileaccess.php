<?php
require 'DB.php';

//インクルードパスからファイルを探して読み込む
print file_get_contents('datetime.php', true);

//URLからファイルを読み込む
print file_get_contents('http://ahirugumi.net');

//ファイルを出力する
file_put_contents('/Users/tomohiro/gitrepo/study/PHP-Study/test.txt', "hoge\nmoge\npiyo");

//ファイルを一行ずつ読み込む
$file=fopen('/Users/tomohiro/gitrepo/study/PHP-Study/test.txt', 'rb');
while (!feof($file)) {
  $str = fgets($file);
  print "-$str";
}
fclose($file);

//ファイルを1行ずつ出力する
$file_w=fopen('/Users/tomohiro/gitrepo/study/PHP-Study/test_w.txt', 'wb');
for ($i=0;$i<10;$i++){
  fwrite($file_w, $i . "\n");
}
fclose($file_w);

//データベースの接続
$db=DB::connect('mysql://root:@localhost/kinmokusei');
if (DB::isError($db)){
  die("データベースの接続が失敗しました。" . $db->getMessage());
}
//CSVファイルを出力する
$file_5=fopen('/Users/tomohiro/gitrepo/study/PHP-Study/five.txt', 'wb');
$query = $db->query('select id, lens_name, spec from lens order by id');
while ($row=$query->fetchRow()){
  $line=make_csv_line($row);
  fwrite($file_5, $line);
}
fclose($file_5);

print "\n";

//CSVファイルを読み込む
$file_5=fopen('/Users/tomohiro/gitrepo/study/PHP-Study/five.txt', 'rb');
while( $ret_csv = fgetcsv($file_5, 256 ) ) {
    print $ret_csv[0] . ", " .$ret_csv[1] . ", " . $ret_csv[2] . ", " . "\n";
}

function make_csv_line($values) {
    foreach($values as $i =>$value) {
        if ((strpos($value, ',')  !== false) ||
            (strpos($value, '"')  !== false) ||
            (strpos($value, ' ')  !== false) ||
            (strpos($value, "\t") !== false) ||
            (strpos($value, "\n") !== false) ||
            (strpos($value, "\r") !== false)) {
            $values[$i] = '"' . str_replace('"', '""', $value) . '"';
        }
    }
    return implode(',', $values) . "\n";
}
?>
