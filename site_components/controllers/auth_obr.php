<?php
session_start();
require_once($_SESSION['PATH_MAIN']."\const.php");
echo "<pre>POST => ";print_r($_POST);echo "</pre><br>";
if (empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");
//echo "<pre>POST => ";print_r($_POST);echo "</pre><br>";
$dbhost = DBHOST;
$dbuser = DBUSER;
$dbpass = DBPASS;
$dbname = DBNAME;

$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");
//echo "<pre>POST => ";print_r($mysqli);echo "</pre><br>";
$login=$_POST['login'];
$pass=$_POST['pass'];

$login=strtolower($login);
$login=htmlspecialchars($login);
//$pass = password_hash($pass, PASSWORD_BCRYPT);

$result=$mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");// AND `pass`='$pass'");
$result=mysqli_fetch_assoc($result);

$_SESSION['pass']= $result['pass'];
$_SESSION['login']= $result['login'];
$_SESSION['id']= $result['id'];
$_SESSION['name']= $result['name'];
$_SESSION['lastname']= $result['lastname'];
$_SESSION['comment']= $result['comments'];

//echo "<pre>Pass => ";print_r($pass);echo "</pre><br>";
//echo "<pre>POST => ";print_r($_SESSION);echo "</pre><br>";
if(password_verify($pass,$result['pass'])) exit('1'); //"Вы успешно авторизованы"
else exit('0'); //"Неверный логин или пароль"
?>