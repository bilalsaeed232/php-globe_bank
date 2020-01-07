<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];

$title = "";
$visible = "";
$content = "";

if(is_post_request()) {
    $title = $_POST['title'];
    $visible = $_POST['visible'];
    $content = $_POST['content'];
}

?>


<?php $page_title = "Edit Page"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>Edit Page</h1>
    <div class="page edit">
        <form action="" method="post">
            <div>
                <label for="title">title</label>
                <input type="text" name="title" value="<?php echo $title; ?>">
            </div>
            <div>
                <label for="visible">Visible</label>
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" id="visible" value="1" <?php echo $visible ? "checked" : ""; ?>>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" cols=35 rows=5><?php echo $content; ?></textarea>
            </div>
            <div>
                <input type="submit" value="Edit Page">
            </div>
        </form>
    
    </div>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>

</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>