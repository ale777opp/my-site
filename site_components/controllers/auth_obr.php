<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/db.ini");
if (empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");

$login=$_POST['login'];
$pass=$_POST['pass'];

$login=strtolower($login);
$login=htmlspecialchars($login);

$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASS;
$dbname = DB_NAME;

$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($mysqli->connect_errno) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}

$mysqli-> set_charset("utf8");

$result=$mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");// AND `pass`='$pass'");
$result=mysqli_fetch_assoc($result);

$_SESSION['pass']= $result['pass'];
$_SESSION['login']= $result['login'];
$_SESSION['id']= $result['id'];
$_SESSION['name']= $result['name'];
$_SESSION['lastname']= $result['lastname'];
$_SESSION['comment']= $result['comments'];

if(password_verify($pass,$result['pass'])) exit('1'); //"Вы успешно авторизованы"
else exit('0'); //"Неверный логин или пароль"
?>