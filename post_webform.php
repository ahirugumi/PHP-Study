<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<form method="post" action="post_webform.php">
<!-- inputをポストする -->
strip_tags:<input type="text" name="tags"><br>
htmlentities:<input type="text" name="entitie">
<br>
<!-- selectをポストする -->
<select name="futariha">
<option value="black">ブラック</option>
<option value="white">ホワイト</option>
<option value="luminous">ルミナス</option>
</select>
<br>
<!-- selectの複数データをポストする -->
<select name="smile[]" multiple>
<option value="happy">ハッピー</option>
<option value="sunny">サニー</option>
<option value="piece">ピース</option>
<option value="march">マーチ</option>
<option value="beauty">ビューティ</option>
</select>
<br>
<input type="submit" name="submit">
<br>
==============================================<br>
POSTされた値<br>
<!-- タグを取り除く -->
　strip_tags:<?php print strip_tags($_POST['tags']); ?><br>
<!-- タグをエスケープして表示する -->
　htmlentities:<?php print htmlentities($_POST['entitie']); ?><br>
　ふたりはプリキュア:<?php print $_POST['futariha']; ?><br>
　スマイルプリキュア:<br>
<?php 
// is_arayでないと警告が発生する。
// foreachの引数は、必ず配列でないといけない
if (is_array($_POST['simle'])){
    foreach ($_POST['smile'] as $smile){
      print "　　$smile<br>";
    }
}
?>
