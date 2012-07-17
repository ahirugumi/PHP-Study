<?php
require 'DB.php';

//パースする
$xml=<<<_XML_
<?xml version="1.0" encoding="utf-8"?>
<camera>
<lens>
  <n328mm vr="true">さんにっぱ</n328mm>
  <n428mm vr="true">よんにっぱ</n428mm>
  <n856mm vr="true">はちごろー</n856mm>
  <zoom>
    <n70_200mm vr="true">ななじゅーにひゃく</n70_200mm>
    <n24_70mm vr="true">にじゅうよんななじゅう</n24_70mm>
  </zoom>
</lens>
<bodys>
  <body>
    <name>D4</name>
    <price>600000</price>
  </body>
  <body>
    <name>D3s</name>
    <price>400000</price>
  </body>
  <body>
    <name>D800</name>
    <price>300000</price>
  </body>
</bodys>
</camera>
_XML_;

$camera=simplexml_load_string($xml);
//要素にアクセスする
print "328: {$camera->lens->n328mm}\n";
//子要素にアクセスする
print "70-200: {$camera->lens->zoom->n70_200mm}\n";
//属性にアクセスする
print "428: {$camera->lens->n428mm} vr: {$camera->lens->n428mm['vr']}\n";
//インデックスで同じ名前にアクセスする
print "bodys: {$camera->bodys->body[0]->name}\n";
print "bodys: {$camera->bodys->body[1]->name}\n";
print "bodys: {$camera->bodys->body[2]->name}\n";
print "\n";
//ループして要素にアクセスする
foreach ($camera->bodys->body as $body){
  print "body: {$body->name}\n";
}
print "\n";
//ループして子要素にアクセスする
foreach ($camera->bodys->body[0] as $body=>$name){
  print "ele: {$name}\n";
}
print "\n";
//要素と属性を変更する
$camera->lens->n328mm="サンニッパ";
$camera->lens->n428mm['vr']="false";
print $camera->asXML();
//xmlファイル出力する
$camera->asXML('/Users/tomohiro/gitrepo/study/PHP-Study/camera.xml');
print "\n";
//xmlファイル読み込む
$camera_file=simplexml_load_file('/Users/tomohiro/gitrepo/study/PHP-Study/camera.xml');
print "read file of camera.xml: \n" . $camera_file->asXML();

print "\n";
//データベースのデータをxmlに出力する
$db=DB::connect('mysql://root:@localhost/kinmokusei');
if (DB::isError($db)){
  die("データベースの接続が失敗しました。" . $db->getMessage());
}

print "<lens>\n";
$query = $db->query('select id, lens_name, spec from lens order by id');
while ($row=$query->fetchRow()){
  print '  <lens id="' . htmlentities($row[0]) . ">\n";
  print '  <lens_name>' . htmlentities($row[1]) . "</lens_name>\n";
  print '  <spec>' . htmlentities($row[2]) . "</spec>\n";
}
print "</lens>\n";

$db->disconnect();
?>
