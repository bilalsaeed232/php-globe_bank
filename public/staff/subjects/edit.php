<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];

$position = "";
$visible = "";
$menu_name = "";

if(is_post_request()) {
    $position = $_POST['position'];
    $visible = $_POST['visible'];
    $menu_name = $_POST['menu_name'];
}

?>


<?php $page_title = "Edit Subject"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>Edit Subject</h1>
    <div class="subject edit">
        <form action="" method="post">
            <div>
                <label for="position">Position</label>
                <select name="position" id="position">
                    <option value="1">1</option>
                </select>
            </div>
            <div>
                <label for="visible">Visible</label>
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" id="visible" value="1" <?php echo $visible ? "checked" : ""; ?>>
            </div>
            <div>
                <label for="menu_name">Menu name</label>
                <input type="text" name="menu_name" value="<?php echo $menu_name; ?>" >
            </div>
            <div>
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    
    </div>
    <a href="<?php echo url_for('staff/subjects/index.php'); ?>">&laquo; Go Back</a>

</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>