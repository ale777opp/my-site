<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/db.ini");
require_once($_SERVER['DOCUMENT_ROOT']."/const.php");

if(empty($_POST['name']) or empty($_POST['lastname']) or empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$login=$_POST['login'];
$pass=$_POST['pass'];

$login=strtolower($login);
$name=htmlspecialchars($name);
$login=htmlspecialchars($login);
$lastname=htmlspecialchars($lastname);
$pass = password_hash($pass, PASSWORD_BCRYPT);
//var_dump($_POST);
$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASS;
$dbname = DB_NAME;
$comments = COMMENTS_DEFAULT;

$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($mysqli->connect_errno) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit('4');
}
$mysqli-> set_charset("utf8");
$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");
$result=mysqli_fetch_assoc($result);
if (!empty($result)) {exit('0');console.log("Такой пользователь уже зарегистрирован");}//"Такой пользователь уже зарегистрирован");
$result = $mysqli->query("INSERT INTO users(login, pass, name, lastname, comments) VALUES ('$login','$pass','$name','$lastname', '$comments')");
if ($result) exit('1'); //"Вы успешно зарегистрированы");
else exit('0'); //"Произошла ошибка");
?>