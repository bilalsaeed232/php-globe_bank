<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));    
}

$id = h($_GET['id']);

$page = find_page_by_id($id);

?>

<?php $page_title = "Show Page"; ?>
<?php include_once(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">
    <h3>Page ID: <?php echo $page['id']; ?></h3>
    <h3>Menu Name: <?php echo $page['menu_name']; ?></h3>
    <h3>Position: <?php echo $page['position']; ?></h3>
    <h3>Visible: <?php echo $page['visible']; ?></h3>
    <h3>Content:</h3>
    <p><?php echo $page['content'] ?? "No Content!"; ?></p>
    <br>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>
</div>

<?php include_once(SHARED_PATH . "/staff_footer.php"); ?>