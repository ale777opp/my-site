<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/const.php");
$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASS;
$dbname = DB_NAME;

$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$text=$_POST['text'];
$field=$_POST['field'];
$id=$_SESSION['id'];

$query=$field=='0'?"UPDATE `users` SET `name`='$text' WHERE `id`='$id'":"UPDATE `users` SET `lastname`='$text' WHERE `id`='$id'";
$mysqli->query($query);
$field=='0'?$_SESSION['name']=$text:$_SESSION['lastname']=$text;
?>