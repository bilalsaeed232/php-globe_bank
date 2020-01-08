<?php 
// all initialization required by our application


//define global path constants
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('SHARED_PATH', PRIVATE_PATH . '/shared/');
define('PUBLIC_PATH', PROJECT_PATH . '/public/');


//find the public root folder path dynamically
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define('WWW_ROOT', $doc_root);


require_once('functions.php');
require_once('database.php');

//based on your requirement, putting it here means every page will have db connection

$db = db_connect();


?>