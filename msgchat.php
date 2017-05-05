<?php

define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWD", "");
define("MYSQL_DB", "tchatdb");

try {
    $PDO = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB,MYSQL_USER,MYSQL_PASSWD);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
} catch (PDOException $e) {
    $e->getMessage();
}

$chat=$PDO->prepare("SELECT * FROM messages INNER JOIN Users ON messages.user_id=Users.id");
$chat->execute();
$display=$chat->fetchAll();
foreach($display as $value){
  echo "<div class='msgchat'><p>" . $value->username . " : " . $value->message . "</p></div>";
}
?>
