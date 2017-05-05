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

if(isset($_POST['submit']) && isset($_SESSION['id']) && isset($_SESSION['username'])){
    if($_POST['message'] != ""){
        $msg=$PDO->prepare("INSERT INTO messages (user_id, message) VALUES (:id, :message)");
        $msg->bindValue(":id", $_SESSION['id']);
        $msg->bindValue(":message", htmlentities($_POST['message']));
        
        if($msg->execute()){
            echo "Message sent";
        } else {
            echo "Message not sent";
        }
    }
}

?>