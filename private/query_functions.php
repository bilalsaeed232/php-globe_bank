<?php 

function find_all_subjects() {
    global $db;
    
    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
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