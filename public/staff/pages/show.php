<?php require_once('../../../private/initialize.php'); ?>

<?php $id = h($_GET['id']); ?>

<?php $page_title = "Show Page"; ?>
<?php include_once(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">
    <h3>Page ID: <?php echo $id; ?></h3>
    <br>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>
</div>

<?php include_once(SHARED_PATH . "/staff_footer.php"); ?>