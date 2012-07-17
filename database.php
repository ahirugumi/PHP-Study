<?php
require 'DB.php';

//データベースの接続
$db=DB::connect('mysql://root:@localhost/kinmokusei');
if (DB::isError($db)){
  die("データベースの接続が失敗しました。" . $db->getMessage());
}

//データの取得
print "\nデータを取得する\n";
$query = $db->query('select id, lens_name, spec from lens order by id');
while ($row=$query->fetchRow()){
  print "$row[0], $row[1], $row[2]\n";
}

//データの件数
print "\n件数を取得する\n";
print "件数：" . $query->numrows();

//全て取得する
print "\n一気に取得する\n";
$rows = $db->getAll('select id, lens_name, spec from lens order by id');
foreach ($rows as $row){
  print "$row[0], $row[1], $row[2]\n";
}

//1行だけ取得する
print "\n1行のみ取得する\n";
$row = $db->getRow('select id, lens_name, spec from lens order by id');
print "$row[0], $row[1], $row[2]\n";

//1行1カラムだけ取得する
print "1行1カラムだけ取得する\n";
$row = $db->getOne('select lens_name, spec from lens order by id');
print "$row\n";

//取得したデータをインデックスではなく、名前でアクセスする
print "\n取得したデータに名前でアクセスする\n";
$db->setFetchMode(DB_FETCHMODE_ASSOC);
$query = $db->query('select id, lens_name, spec from lens order by id');
while ($row=$query->fetchRow()){
  print "$row[id], $row[lens_name], $row[spec]\n";
}

print "\n取得したデータにオブジェクトでアクセスする\n";
$db->setFetchMode(DB_FETCHMODE_OBJECT);
$rows = $db->getAll('select id, lens_name, spec from lens order by id');
foreach ($rows as $row){
  print "$row->id, $row->lens_name, $row->spec\n";
}

//プレースホルダを利用する
print "\nプレースホルダを指定して、SQLインジェクションを防ぐ\n";
$rows = $db->getAll('select id, lens_name, spec from lens where spec = ? order by id', array('F2.8'));
foreach ($rows as $row){
  print "$row->id, $row->lens_name, $row->spec\n";
}

//リテラルをエスケープする
print "\nリテラルをエスケープする\n";
//リテラルを使わない場合は、quoteSmartでエスケープしてくれるので、SQLインジェクションを防げる
print $db->quoteSmart("'F2.8'");

print "\n";
//これ以降のデータベースエラーは、自動的にメッセージを出力する
$db->setErrorHandling(PEAR_ERROR_DIE);

//insert
$query = $db->query("insert into lens (id, lens_name, spec) values ('100', '300mm', 'F2.8')");
//update
$query = $db->query("update lens set spec = 'F2.0' where id='100'");
//delete
$query = $db->query("delete from lens where id='100'");

//プレースホルダを利用する
//insert
$query = $db->query("insert into lens (id, lens_name, spec) values (?, ?, ?)", array('100', '300mm', 'F2.8'));
//update
$query = $db->query("update lens set spec = ? where id=?", array('F2.0', '100'));
//delete
$query = $db->query("delete from lens where id=?", array('100'));

//データベースを切断する
$db->disconnect();
?>
