<?php
session_start();
if(empty($_POST['name']) or empty($_POST['lastname']) or empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");

$dbhost='localhost';// хост базы
$dbuser='v903177m_edu';// пользователь базы
$dbpass='';//пароль входа в БД
$dbname='v903177m_edu';//имя БД
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$login=$_POST['login'];
$pass=$_POST['pass'];

$login=strtolower($login);
$name=htmlspecialchars($name);
$login=htmlspecialchars($login);
$lastname=htmlspecialchars($lastname);
$pass = password_hash($pass, PASSWORD_BCRYPT);

$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");
$result=mysqli_fetch_assoc($result);
if (!empty($result)) exit('0');//"Такой пользователь уже зарегистрирован");

$result= $mysqli-> query("INSERT INTO `users`(`login`, `pass`, `name`, `lastname`) VALUES ('$login','$pass','$name','$lastname')");
if ($result) exit('1'); //"Вы успешно зарегистрированы");
    else exit('2'); //"Произошла ошибка");
?>