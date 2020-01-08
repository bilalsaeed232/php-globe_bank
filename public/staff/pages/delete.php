<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to('/staff/pages/index.php');
}

$id = $_GET['id'];

if(is_post_request()) {
    //delete the page from mysql
    $result = delete_page($id);
    redirect_to(url_for('staff/pages/index.php'));
} else {
    $page = find_page_by_id($id);
}

?>

<?php $page_title = "Delete Page"; ?>
<?php include_once(SHARED_PATH . "staff_header.php"); ?>

<div id="content">
    <p>Are you sure you want to delete page: </p>
    <p><strong><?php echo $page['menu_name']; ?></strong></p>

    <form action="<?php echo url_for('staff/pages/delete.php?id=' . h($id)); ?>" method="post">
        <input type="submit" value="Delete">
    </form>

    <br>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>
</div>


<?php include_once(SHARED_PATH . "staff_footer.php"); ?>
