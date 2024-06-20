<?php

define("PROJECT_ROOT_PATH", __DIR__ );

require_once PROJECT_ROOT_PATH . "/controllers/BaseController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ((isset($uri[3]) && $uri[3] != 'product') || !isset($uri[3])) {
    //print_r($uri);
    header("HTTP/1.1 404 Not Found");
    exit();
}
require PROJECT_ROOT_PATH . "/controllers/ProductController.php";
$objFeedController = new ProductController();
$strMethodName = $uri[4] . 'Action';
$objFeedController->{$strMethodName}();
?>