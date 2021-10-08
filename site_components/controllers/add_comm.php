<?php
session_start();
equire_once($_SERVER['DOCUMENT_ROOT']."/const.php");
$comment=$_POST['comment'];
$id=$_SESSION['id'];

$dbhost = DBHOST;
$dbuser = DBUSER;
$dbpass = DBPASS;
$dbname = DBNAME;

$result = $mysqli->query("UPDATE `users` SET `comments`='$comment' WHERE `id`='$id'");
if ($result) {$_SESSION['comment']=$comment;exit('1');} else exit('0'); //анализ выполнения запроса на добавление комментария
?>
