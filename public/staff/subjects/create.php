<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(is_post_request()) {

    $subject = [];

    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $insert_id = insert_subject($subject);

    if($insert_id) {
        redirect_to(url_for('/staff/subjects/show.php?id=' . $insert_id));
    }
}






?>