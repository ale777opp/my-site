<?php
session_start();
$comment=$_POST['comment'];
$id=$_SESSION['id'];

    $dbhost='localhost';// хост базы
    $dbuser='v903177m_edu';// пользователь базы
    $dbpass='';//пароль входа в БД
    $dbname='v903177m_edu';//имя БД
    $mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    $mysqli-> set_charset("utf8");
    
    $query="UPDATE `users` SET `comments`='$comment' WHERE `id`='$id'";
    $mysqli->query($query);
    $_SESSION['comment']=$comment; 
?>
