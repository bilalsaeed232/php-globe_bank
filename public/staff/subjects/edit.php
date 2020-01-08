<?php require_once('../../../private/initialize.php'); ?>

<?php 


//if id is not provided or it's not numeric
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];



if(is_post_request()) {
    $subject = [];
    $subject['id'] = $id;
    $subject['position'] = $_POST['position'];
    $subject['visible'] = $_POST['visible'];
    $subject['menu_name'] = $_POST['menu_name'];

    $result = update_subject($subject);
    redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
} else {
    $subject = find_subject_by_id($id);
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
                <input type="checkbox" name="visible" id="visible" value="1" <?php echo $subject['visible'] ? "checked" : ""; ?>>
            </div>
            <div>
                <label for="menu_name">Menu name</label>
                <input type="text" name="menu_name" value="<?php echo $subject['menu_name']; ?>" >
            </div>
            <div>
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    
    </div>
    <a href="<?php echo url_for('staff/subjects/index.php'); ?>">&laquo; Go Back</a>

</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>