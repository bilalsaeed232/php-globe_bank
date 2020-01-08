<?php require_once('../../../private/initialize.php'); ?>

<?php
// no need to urldecode as php automatically do it in super global variables
$id = h($_GET['id']) ?? ''; 

if(is_get_request()) {
    $subject = find_subject_by_id($id);    
}else {
    exit("No need to post here...");
}


?>

<?php $page_title = "Show Subject"; ?>
<?php include_once(SHARED_PATH . "staff_header.php"); ?>

<div id="content">
    <h4>Subject ID: <?php echo $subject['id']; ?></h4>
    <h4>Menu Name: <?php echo $subject['menu_name']; ?></h4>
    <h4>Position: <?php echo $subject['position']; ?></h4>
    <h4>Visible: <?php echo $subject['visible']; ?></h4>
    <br>
    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Go Back</a>
</div>


<?php include_once(SHARED_PATH . "staff_footer.php"); ?>