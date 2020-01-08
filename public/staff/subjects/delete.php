<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
    $result = delete_subject($id);
    redirect_to(url_for('staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}

?>

<?php $page_title = "Delete Subject"; ?>
<?php include_once(SHARED_PATH . "staff_header.php"); ?>

<div id="content">
    <p>Are you sure you want to delete subject: </p>
    <p><strong><?php echo $subject['menu_name']; ?></strong>?</p>

    <form action="<?php echo url_for('staff/subjects/delete.php?id='. h(u($id))); ?>" method="post">
        <input type="submit" value="Delete">
    </form>
    <br>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>

</div>


<?php include_once(SHARED_PATH . "staff_footer.php"); ?>