<?php
/**
 *
 */
class Controller
{
	public $name;
	public $lastname;
	public $login;
	public $pass;
	private $dbhost;// хост базы
	private $dbuser;// пользователь базы
	private $dbpass;//пароль входа в БД
	private $dbname;//имя БД

	function __construct() //$file = 'const.php'
	{
		$dbhost = DBHOST;
		$dbuser = DBUSER;
		$dbpass = DBPASS;
		$dbname = DBNAME;

		echo "Вызов конструктора <br>";
		try {
            $this->pdo = new PDO("mysql:dbname={$dbname};host={$dbhost};charset=utf8", $dbuser, $dbpass);
        } catch ( PDOException $Exception ) {
            echo $Exception->getMessage();
        }
    }

	public function authtorization(){
		echo "<pre>POST => ";print_r($_POST);echo "</pre><br>";
		if (empty($_POST['login']) or empty($_POST['pass'])) exit("Не все поля заполнены");
		$sql = $this->pdo->prepare("SELECT * FROM users WHERE login = :login");
        $sql->bindParam(':login', $login, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch();

        $_SESSION['pass']= $result['pass'];
		$_SESSION['login']= $result['login'];
		$_SESSION['id']= $result['id'];
		$_SESSION['name']= $result['name'];
		$_SESSION['lastname']= $result['lastname'];
		$_SESSION['comment']= $result['comments'];
		if(password_verify($pass,$result['pass'])) exit('1'); //"Вы успешно авторизованы"
		else exit('0'); //"Неверный логин или пароль"


        //return $sql->fetch();
	/*
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
	*/
	}

	public function registration(){
	$comments = COMMENTS_DEFAULT;

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

	$result = $mysqli->query("INSERT INTO `users`(`login`, `pass`, `name`, `lastname`,`comments`) VALUES ('$login','$pass','$name','$lastname','$comments')");
	if ($result) exit('1'); //"Вы успешно зарегистрированы");
	else exit('0'); //"Произошла ошибка");
	}

	public function addComment(){
	session_start();
	require_once($_SESSION['PATH_MAIN']."\const.php");
	$comment=$_POST['comment'];
	$id=$_SESSION['id'];

	$dbhost = DBHOST;
	$dbuser = DBUSER;
	$dbpass = DBPASS;
	$dbname = DBNAME;

	$result = $mysqli->query("UPDATE `users` SET `comments`='$comment' WHERE `id`='$id'");
	if ($result) {$_SESSION['comment']=$comment;exit('1');} else exit('0'); //анализ выполнения запроса на добавление комментария
}

} //end class
?>