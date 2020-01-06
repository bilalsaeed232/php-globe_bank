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



?>