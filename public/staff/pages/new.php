<?php require_once('../../../private/initialize.php'); ?>

<?php


if(is_post_request()) {
    $page = [];
    $page['subject_id'] = $_POST['subject_id'];
    $page['menu_name'] = $_POST['menu_name'];
    $page['position'] = $_POST['position'];
    $page['visible'] = $_POST['visible'];
    $page['content'] = $_POST['content'];

    $result = insert_page($page);
    if($result === true) {
        //success
        redirect_to(url_for('/staff/pages/index.php'));
    } else {
        // validation failed
        $errors = $result;
    }

}

$subjects_set = find_all_subjects();


$result_set = find_all_pages();
//+1 because we are creating a new page
$page_count = mysqli_num_rows($result_set) + 1;
mysqli_free_result($result_set);
?>



<?php $page_title = "New Page"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>New Page</h1>
    <div class="page new">
        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
            <div>
                <label for="menu_name">Menu Name</label>
                <input type="text" name="menu_name" />
            </div>
            <div>
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject">
                    <?php while($subject = mysqli_fetch_assoc($subjects_set)): ?>
                        <option value="<?php echo $subject['id']; ?>">
                            <?php echo $subject['menu_name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <?php mysqli_free_result($subjects_set); ?>
            </div>
            <div>
                <label for="position">Position</label>
                <select name="position" id="position">
                    <?php for($i = 1; $i <= $page_count; $i++): ?>
                        <option value="<?php echo $i; ?>"
                            <?php echo $i == $page_count ? "selected" : ""; ?>
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