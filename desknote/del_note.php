<?php 
$dbhost='localhost';// хост базы
$dbuser='v903177m_edu';// пользователь базы
$dbpass='QqQ6n&1h';//пароль входа в БД
$dbname='v903177m_edu';//имя БД
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$id=$_POST['id'];
$query="DELETE FROM `text_note` WHERE `text_note`.`id`='$id'";
$mysqli->query($query);
?>