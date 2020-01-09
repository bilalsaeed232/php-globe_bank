<?php require_once('../../../private/initialize.php'); ?>

<?php 
//if id is not provided or it's not numeric
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
$id = h($_GET['id']);


if(is_post_request()) {
    $subject = [];
    $subject['id'] = $id;
    $subject['position'] = $_POST['position'];
    $subject['visible'] = $_POST['visible'];
    $subject['menu_name'] = $_POST['menu_name'];

    $result = update_subject($subject);
    if($result === true) {
        redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
    } else {
        $errors = $result;
    }
} else {
    $subject = find_subject_by_id($id);
}

$result_set = find_all_subjects();
$subject_count = mysqli_num_rows($result_set);
mysqli_free_result($result_set);

?>


<?php $page_title = "Edit Subject"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>Edit Subject</h1>
    <div class="subject edit">
        <?php echo display_errors($errors); ?>
        <form action="" method="post">
            <div>
                <label for="position">Position</label>
                <select name="position" id="position">
                <?php for ($i=1; $i <= $subject_count ; $i++): ?>
                    <option value="<?php echo $i; ?>" 
                        <?php 
                            echo $i == $subject['position'] ? "selected": ""; 
                        ?> >
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
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