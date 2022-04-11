<?php
require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
//var_dump($uri);

if ((isset($uri[3]) && $uri[3] != 'user') || !isset($uri[4])) {
    //var_dump($uri[3],$uri[4],((isset($uri[3]) && $uri[4] != 'user') || !isset($uri[4])));
	header("HTTP/1.1 404 Not Found");
    exit();
}

require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";

$objFeedController = new UserController();
$strMethodName = $uri[4] . 'Action';
$objFeedController->{$strMethodName}();
?>