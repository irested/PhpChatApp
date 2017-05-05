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

  if($_POST["lastname"]!="" && $_POST["firstname"]!="" && $_POST["username"]!=""){
    $verifusername=$_POST["username"];
    $verif2=$PDO->prepare("SELECT username FROM Users WHERE username=:username");
    $verif2->bindValue(":username", $_POST["username"]);
    $verif2->execute();
    $test=$verif2->fetch();
    if($test!=""){
      echo "Pseudo déja pris";
    }
    else{
      $req=$PDO->prepare("INSERT INTO Users (lastname, firstname, username) VALUES (:lastname, :firstname, :username)");
      $req->bindValue(":lastname", $_POST["lastname"]);
      $req->bindValue(":firstname", $_POST["firstname"]);
      $req->bindValue(":username", $_POST["username"]);
      if($req->execute()){
        echo "Inscrit";
      }
      else{
        echo "Erreur";
      }
    }
  }
  else{
    echo "Remplissez le formulaire d'inscription";
  }



?>
