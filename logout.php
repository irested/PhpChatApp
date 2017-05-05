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
session_start();
$_SESSION = array();
session_destroy();

if(isset($_SESSION['id']) == ""){
    header('Location: inscription.php');
} else {
    echo 'Erreur';
}

?>