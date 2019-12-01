<?php 
$dbhost='localhost';// хост базы
$dbuser='v903177m_edu';// пользователь базы
$dbpass='H&g%6OeF';//пароль входа в БД
$dbname='v903177m_edu';//имя БД
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$color=$_POST['color'];
$x_coord = rand(100,1000);
$y_coord = rand(100,300);
$text_note='Введите текст';

$query="INSERT INTO `text_note` (`id`, `color`, `x_coord`, `y_coord`, `text_note`) VALUES (NULL, '$color', '$x_coord', '$x_coord','$text_note')";
$mysqli->query($query);

?>