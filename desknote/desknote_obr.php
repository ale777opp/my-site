<?php
session_start();
$id=$_POST['id'];
$text=$_POST['text'];
$x_coord=$_POST['x_coord'];
$y_coord=$_POST['y_coord'];

    $dbhost='localhost';// хост базы
    $dbuser='v903177m_edu';// пользователь базы
    $dbpass='QqQ6n&1h';//пароль входа в БД
    $dbname='v903177m_edu';//имя БД
    $mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    $mysqli-> set_charset("utf8");
    
    $query="UPDATE `text_note` SET `text_note`='$text',`x_coord`='$x_coord',`y_coord`='$y_coord' WHERE `id`='$id'";
    $mysqli->query($query);
    
    $_SESSION['x_coord']=$x_coord; 
    $_SESSION['y_coord']=$y_coord; 
   // $_SESSION['text_note']=$text; 
?>