<?php require_once('../../../private/initialize.php'); ?>

<?php


if(is_post_request()) {
    $title = $_POST['title'];
    $visible = $_POST['visible'];
    $content = $_POST['content'];

    echo "Title: " . $title . "<br/>";
    echo "Visible: " . $visible . "<br/>";
    echo "Content: ". $content . "<br/>";
}
 

?>



<?php $page_title = "New Page"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>New Page</h1>
    <div class="page new">
        <form action="" method="post">
            <div>
                <label for="title">title</label>
                <input type="text" name="title" >
            </div>
            <div>
                <label for="visible">Visible</label>
                <!-- because checkbox entry is not passed at all when unchecked -->
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" id="visible" value="1">
            </div>
            <div>
                <label for="content">Content</label>
                <textarea  name="content" cols=35 rows=5 ></textarea>
            </div>
            <div>
                <input type="submit" value="Create Page">
            </div>
        </form>
    
    </div>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>
</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>