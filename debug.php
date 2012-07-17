<?php
require 'DB.php';

$lens=array("200mm F2.8", "24mm F1.4", "50mm F1.4");
//ダンプする
var_dump($lens);
//エラーメッセージをWeb サーバーのエラーログあるいはファイルに出力する
error_log(print_r($lens));

//データベースの接続
$db=DB::connect('mysql://root:@localhost/kinmokusei');
if (DB::isError($db)){
  die("データベースの接続が失敗しました。" . $db->getMessage());
}
$db->setErrorHandling(PEAR_ERROR_CALLBACK, 'db_error');
$query = $db->query('select id, lens_name, spec,  from lens order by id');

function db_error($error){
  error_log($error->getDebugInfo());
}

?>
