<?php require_once('../../../private/initialize.php'); ?>

<?php

if(is_post_request()) {
    $page = [];
    $page['subject_id'] = $_POST['subject_id'];
    $page['menu_name'] = $_POST['menu_name'];
    $page['position'] = $_POST['position'];
    $page['visible'] = $_POST['visible'];
    $page['content'] = $_POST['content'];

    $result_set = insert_page($page);

    redirect_to(url_for('/staff/pages/index.php'));
}



?>
