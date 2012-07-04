<?php
if (array_key_exists('id', $_POST)){
  print "ID:" . $_POST['id'];
}else{
  print <<< _FORM
<?xml version="1.0" encoding="UTF-8"?>
<form method="post" action"$_SERVER[PHP_SELF]">
  ID: <input type="text" name="id">
<br/>
<input type="submit" value="実行">
</form>
_FORM;
}
?>
