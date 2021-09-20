<?php
/**
 *
 */
class Controller
{
public $name = $_POST['name'];
public $lastname =$_POST['lastname'];
public $login = $_POST['login'];
public $pass = $_POST['pass'];
public $dbhost=DBHOST;// хост базы
public $dbuser=DBUSER;// пользователь базы
public $dbpass=DBPASS;//пароль входа в БД
public $dbname=DBNAME;//имя БД
	function __construct(argument)
	{
		# code...
	}


//session_start();

$dbhost=DBHOST;
$dbuser=DBUSER;
$dbpass=DBPASS;
$dbname=DBNAME;
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");


public function auth{
if (empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");

$login=$_POST['login'];
$pass=$_POST['pass'];

$login=strtolower($login);
$login=htmlspecialchars($login);
$pass = password_hash($pass, PASSWORD_BCRYPT);

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
}

public function registration {
//session_start();
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

$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");
$result=mysqli_fetch_assoc($result);
if (!empty($result)) exit('0');//"Такой пользователь уже зарегистрирован");

$result= $mysqli-> query("INSERT INTO `users`(`login`, `pass`, `name`, `lastname`) VALUES ('$login','$pass','$name','$lastname')");
if ($result) exit('1'); //"Вы успешно зарегистрированы");
    else exit('2'); //"Произошла ошибка");
}

public function privatCabinet{
//session_start();

$text=$_POST['text'];
$field=$_POST['field'];
$id=$_SESSION['id'];

$query=$field=='0'?"UPDATE `users` SET `name`='$text' WHERE `id`='$id'":"UPDATE `users` SET `lastname`='$text' WHERE `id`='$id'";
$mysqli->query($query);
$field=='0'?$_SESSION['name']=$text:$_SESSION['lastname']=$text;
}

public function addComment{

$comment=$_POST['comment'];
$id=$_SESSION['id'];

$query="UPDATE `users` SET `comments`='$comment' WHERE `id`='$id'";
$mysqli->query($query);
$_SESSION['comment']=$comment;

}
} //end class
?>