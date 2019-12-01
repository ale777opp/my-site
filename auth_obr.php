<?php session_start();
if (empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");

$dbhost='localhost';// хост базы
$dbuser='v903177m_edu';// пользователь базы
$dbpass='H&g%6OeF';//пароль входа в БД
$dbname='v903177m_edu';//имя БД
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$login=$_POST['login'];
$pass=$_POST['pass'];

$result=$mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");// AND `pass`='$pass'");
$result=mysqli_fetch_assoc($result);

$_SESSION['pass']= $result['pass'];
$_SESSION['login']= $result['login'];
$_SESSION['id']= $result['id'];
$_SESSION['name']= $result['name'];
$_SESSION['lastname']= $result['lastname'];
$_SESSION['comment']= $result['comments'];

if ($result['pass']!=$pass) exit('0'); //"Неверный логин или пароль"
 else exit('1'); //"Вы успешно авторизованы"
?>