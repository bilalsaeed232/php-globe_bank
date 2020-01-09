<?php 

// is_blank('abcd')
// * validate data presence
// * users trim() so empty spaces don't count
// * uses === to avoid false positives
// * better than empty() which considers "0" to be empty
function is_blank($value) {
    return !isset($value) || trim($value) === '';
}


// has_presence('abcd')
// * validate data presence
// * reverse of is_blank()
// * validation functions starting with 'has_' is prefereable
function has_presence($value) {
    return !is_blank($value);
}

// has_length_greater_than('abcd', 3)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
}


// has_length_less_than('abcd', 5)
// * validate string length
// * spaces count towards length
// * use trim() if spaces shouldn't count
function has_length_less_than($value, $max) {
    $length = strlen($max);
    return $length < $max;
}

// has_length_exactly('abcd', 4)
// * validate string length
// * spaces count towards length
// * use trim() if spaces shouldn't count
function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
}


// has_length('abcd', ['min' => 3, 'max' => 10])
// * validate string length
// * combines functions: has_length_greater_than, _less_than, _exactly
// * spaces count towards length
// * use trim if spaces shouldn't count
function has_length($value, $option) {
    if(isset($option['min']) && !has_length_greater_than($value, $option['min'] - 1)) {
        return false;
    } elseif(isset($option['max']) && !has_length_less_than($value, $option['max'] + 1)) {
        return false;
    } elseif(isset($option['exact']) && !has_length_exactly($value, $option['exact'])) {
        return false;
    } else {
        //if all the conditions above fails, means they are valid
        return true;
    }
}


// has_inclusion_of(5, [1,2,3,4,5])
// * validate inclusion of a value in a set
function has_inclusion_of($value, $set) {
    return in_array($value, $set);
}

// has_exclusion_of(10, [1,2,3,4,5,9])
// * validate exclusion of a value in a set, like above
function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
}


// has_string('somebody@gmail.com', 'gmail')
// * validate inclusion of characters in a string
// * strpos() returns matched string starting position or false
// * uses === to prevent position 0 from being considered false
// * strpos() is faster than preg_match()
function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
}


// has_valid_email_format('somebody@gmail.com')
// * validate corrent format of an email address
// * format: [chars]@[chars].[2+ letters]
// * preg_match is helpful, uses a regular expression
// returns 1 for a match, 0 for no match
function has_valid_email_format($email) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
}

function has_unique_page_menu_name($menu_name) {
    global $db;

    $sql = "SELECT menu_name FROM pages ";
    $sql .="WHERE menu_name = '" . $menu_name . "'";

    $result_set = mysqli_query($db, $sql);
    if(mysqli_num_rows($result_set)) {
        //menu name already exists
        return false;
    }else {
        //menu name doesn't exist
        return true;
    }
}




?>