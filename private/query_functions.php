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
    
    $sql = "INSERT INTO subjects (menu_name, visible, position) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "', ";
    $sql .= "'" . $subject['visible'] . "', ";
    $sql .= "'" . $subject['position'] . "' ";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
        $insert_id = mysqli_insert_id($db);
        return $insert_id;
    } else {
        //INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function update_subject($subject) {
    global $db;

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
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
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


function confirm_result_set($result_set) {
    if(!$result_set) {
        exit("Error executing query!");
    }
}

?>