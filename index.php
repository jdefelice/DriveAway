<?php

session_start();

define('ROOT', dirname(__FILE__));
define('CORE', ROOT.'/core/');
define('APP', ROOT.'/app/');
define('WEB_ROOT', dirname($_SERVER['SCRIPT_NAME']) . '/');
define('PUBLIC_DIR', WEB_ROOT.'app/public/');

require_once("config.php");
require_once(CORE."utils.php");



$uri = new URI();

$controller = $uri->segment(0).'_controller';

if(class_exists($controller)){
    $controller = new $controller();
    $controller->setURI($uri);
    $controller->setController();
    $controller->run($uri->segment(1));
}else{
    echo '404';
}
