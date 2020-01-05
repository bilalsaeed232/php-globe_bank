<?php 
// all initialization required by our application

require_once('functions.php');

//define global path constants
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('SHARED_PATH', PRIVATE_PATH . '/shared/');
define('PUBLIC_PATH', PROJECT_PATH . '/public/');



?>