<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(is_post_request()) {
    $subject = [];

    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);

    if($result === true) {
        $insert_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/subjects/show.php?id=' . $insert_id));
    } else {
        //it return errors
        $errors = $result;
    }
}

$result_set = find_all_subjects();

//+1 because we are creating a brand new subject
$subject_count = mysqli_num_rows($result_set) + 1;
mysqli_free_result($result_set);

?>


<?php $page_title = "New Subject"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>New Subject</h1>
    <div class="subject new">
        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('staff/subjects/new.php'); ?>" method="post">
            <div>
                <label for="position">Position</label>
                <select name="position" id="position">
                    <?php for($i = 1; $i <= $subject_count; $i++): ?>
                        <option value="<?php echo $i; ?>"
                            <?php echo $i == $subject_count ? "selected": ""; ?>
                        >
                            <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <label for="visible">Visible</label>
                <!-- because checkbox entry is not passed at all when unchecked -->
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" id="visible" value="1">
            </div>
            <div>
                <label for="menu_name">Menu name</label>
                <input type="text" name="menu_name" >
            </div>
            <div>
                <input type="submit" value="Create Subject">
            </div>
        </form>
    
    </div>
    <a href="<?php echo url_for('staff/subjects/index.php'); ?>">&laquo; Go Back</a>
</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>