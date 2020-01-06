<?php require_once('../../../private/initialize.php'); ?>

<?php
// no need to urldecode as php automatically do it in super global variables
$id = h($_GET['id']); 
?>

<?php $page_title = "Show Subject"; ?>
<?php include_once(SHARED_PATH . "staff_header.php"); ?>

<div id="content">
    <h4>Subject ID: <?php echo $id; ?></h4>
    <br>
    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Go Back</a>
</div>


<?php include_once(SHARED_PATH . "staff_footer.php"); ?>