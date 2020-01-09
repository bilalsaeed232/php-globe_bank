<?php 

function find_all_subjects() {
    global $db;
    
    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
        return $errors;
    }


    $sql = "INSERT INTO subjects (menu_name, visible, position) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "', ";
    $sql .= "'" . $subject['visible'] . "', ";
    $sql .= "'" . $subject['position'] . "' ";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        //INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function update_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name = '". $subject['menu_name'] . "', ";
    $sql .= "position = '". $subject['position'] . "', ";
    $sql .= "visible = '". $subject['visible'] . "' ";
    $sql .= "WHERE id = '" . $subject['id'] . "' ";
    $sql .= "LIMIT 1 ";


    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        //UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id = '" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_subject($subject) {
    $errors = [];

    //menu_name
    if(is_blank($subject['menu_name'])) {
        $errors[] = 'Menu name cannot be blank.';
    }
    if(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = 'Menu name should be between 2 to 255 characters';
    }


    //position
    $position = (int) $subject['position'];
    if($position <= 0) {
        $errors[] = "Position must be greater than zero";
    }
    if($position >= 999) {
        $errors[] = "Position must be less than 999";
    }


    //visible
    $visible = (string) $subject['visible'];
    if(!has_inclusion_of($visible, ["0", "1"])) {
        $errors[] = "Visible must be true or false";
    }

     return $errors;
}




function find_all_pages() {
    global $db;

    $sql = "SELECT pages.*, subjects.menu_name AS subject_name FROM pages ";
    $sql .= "JOIN subjects ";
    $sql .= "ON subjects.id = pages.subject_id ";
    $sql .= "ORDER BY pages.subject_id, pages.position ASC ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    return $result;
}

function find_page_by_id($id){
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . $id . "' ";

    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);

    $page = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
    return $page;
}

function insert_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO pages (subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . $page['subject_id'] . "', ";
    $sql .= "'" . $page['menu_name'] . "', ";
    $sql .= "'" . $page['position'] . "', ";
    $sql .= "'" . $page['visible'] . "', ";
    $sql .= "'" . $page['content'] . "' ";
    $sql .= ") ";

    $result_set = mysqli_query($db, $sql);
    
    if($result_set) {
        return true;
    } else {
        echo mysqli_error();
        db_disconnect($db);
        exit;       
    }
 }


function update_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE pages SET ";
    $sql .="subject_id = '". $page['subject_id'] ."', ";
    $sql .="menu_name = '". $page['menu_name'] ."', ";
    $sql .="position = '". $page['position'] ."', ";
    $sql .="visible = '". $page['visible'] ."', ";
    $sql .="content = '". $page['content'] ."' ";
    $sql .="WHERE id= '". $page['id'] ."' ";
    $sql .="LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        //UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        //DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_page($page) {
    $errors = [];

    //menu_name
    if(is_blank($page['menu_name'])) {
        $errors[] = "Menu name cannot be empty"; 
    }
    if(!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Menu name should be between 2 to 255 characters";
    }

    //visible
    $visible = (string) $page['visible'];
    if(!has_inclusion_of($visible, ['0','1'])) {
        $errors[] = "Visible should be either true or false";
    }

    //position
    $position = (int) $page['position'];
    if($position <= 0) {
        $errors[] = "Position should be greater than 0";
    } else if($position >= 999) {
        $errors[] = "Position should be less than 999";
    }

    //has unique page menu name
    if(!has_unique_page_menu_name($page['menu_name'])) {
        $errors[] = "Menu name already exists";
    }

    return $errors;
}




function confirm_result_set($result_set) {
     if(!$result_set) {
         exit("Error executing query!");
     }
 }
?>