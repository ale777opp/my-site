<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/db.ini");
$comment=$_POST['comment'];
$id=$_SESSION['id'];

$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASS;
$dbname = DB_NAME;

$result = $mysqli->query("UPDATE `users` SET `comments`='$comment' WHERE `id`='$id'");
if ($result) {$_SESSION['comment']=$comment;exit('1');} else exit('0'); //анализ выполнения запроса на добавление комментария
?>
