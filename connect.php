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
  if($_POST["lastname"] == "" && $_POST["username"] == ""){
      echo 'Remplissez les champs';
  }

  if($_POST["lastname"]!="" && $_POST["username"]!=""){
      $verifuser=$PDO->prepare("SELECT * FROM Users WHERE username=:username");
      $verifuser->bindValue(":username", $_POST["username"]);
      $verifuser->execute();
      $testuser=$verifuser->fetch();

      if(isset($testuser->username) && $testuser->username == $_POST["username"] &&  $testuser->lastname == $_POST["lastname"]) {
         echo 'Connecté !';
         session_start();
         $_SESSION['id'] = $testuser->id;
         $_SESSION['username'] = $testuser->username;
      } else {
          echo 'Mauvais identifiant';
      }
  }
?>
