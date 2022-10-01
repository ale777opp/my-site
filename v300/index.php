<?php

session_start();

include("config.php");

spl_autoload_register(function($class){
    require_once 'classes/' . $class . '.php';
});

$app = new App();
$app->run();


echo "<pre>";echo "app->httpUrl = ";print_r($app->httpUrl);echo "</pre>";
echo "<pre>";echo "app->uriParams = ";print_r($app->uriParams);echo "</pre>";


?>
