<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/const.php");
$dbhost = DBHOST;
$dbuser = DBUSER;
$dbpass = DBPASS;
$dbname = DBNAME;

$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$text=$_POST['text'];
$field=$_POST['field'];
$id=$_SESSION['id'];

$query=$field=='0'?"UPDATE `users` SET `name`='$text' WHERE `id`='$id'":"UPDATE `users` SET `lastname`='$text' WHERE `id`='$id'";
$mysqli->query($query);
$field=='0'?$_SESSION['name']=$text:$_SESSION['lastname']=$text;
?>