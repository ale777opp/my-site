<?php
session_start();
 $text=$_POST['text'];
 $field=$_POST['field'];
 $id=$_SESSION['id'];

    $dbhost='localhost';// хост базы
    $dbuser='v903177m_edu';// пользователь базы
    $dbpass='H&g%6OeF';//пароль входа в БД
    $dbname='v903177m_edu';//имя БД
    $mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    $mysqli-> set_charset("utf8");
    
    $query=$field=='0'?"UPDATE `users` SET `name`='$text' WHERE `id`='$id'":"UPDATE `users` SET `lastname`='$text' WHERE `id`='$id'";
    $mysqli->query($query);
    $field=='0'?$_SESSION['name']=$text:$_SESSION['lastname']=$text; 
?>