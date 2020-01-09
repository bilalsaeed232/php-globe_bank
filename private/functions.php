<?php 

//all utility functions used by our application
function url_for($script_path) {
    if($script_path[0] !== '/') {
        $script_path = "/" . $script_path;
    }

    return WWW_ROOT . $script_path;
}

//short form for urlencode
function u($string="") {
    return urlencode($string);
}


//short form for htmlspecialchars
function h($string="") {
    return htmlspecialchars($string);
}


function error_404() {
    header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
    exit;
}

function error_500() {
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit;
}

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function display_errors($errors = []) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class='errors'>";
        $output .= "<p>Please fix the following errors:</p>";
        $output .= "<ul>";
        foreach($errors as $error) {
            //as errors might contain data from user, so use h()
            $output .= "<li>". h($error) ."</li>";
        }
        $output .= "</div>";
    }

    return $output;
}


?>