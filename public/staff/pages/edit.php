<?php require_once('../../../private/initialize.php'); ?>

<?php 

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = h($_GET['id']);

if(is_post_request()) {
    //update page record in mysql
    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'];
    $page['menu_name'] = $_POST['menu_name'];
    $page['position'] = $_POST['position'];
    $page['visible'] = $_POST['visible'];
    $page['content'] = $_POST['content'];


    $result = update_page($page);

    if($result === true) {
        redirect_to(url_for('/staff/pages/show.php?id=' . $page['id']));
    } else {
        //validations failed
        $errors = $result;
    }

} else {
    $page = find_page_by_id($id);
}

$pages_result = find_all_pages();
$page_count = mysqli_num_rows($pages_result);
mysqli_free_result($pages_result);

//get all subjects as well
$subjects_set = find_all_subjects();

?>


<?php $page_title = "Edit Page"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>Edit Page</h1>
    <div class="page edit">
        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h($page['id']) ) ?>" method="post">
            <div>
                <label for="menu_name">Menu Name</label>
                <input type="text" name="menu_name" value="<?php echo $page['menu_name']; ?>">
            </div>
            <div><label for="subject">Subject</label>
                <select name="subject_id" id="subject">
                <?php while($subject = mysqli_fetch_assoc($subjects_set)): ?>
                    <option value="<?php echo $subject['id']; ?>"
                        <?php echo $page['subject_id'] == $subject['id'] ? "selected": ""; ?>
                    >
                        <?php echo $subject['menu_name']; ?>
                    </option>
                <?php endwhile; ?>
                </select>
                <?php mysqli_free_result($subjects_set); ?>
            </div>
            <div>
                <select name="position" id="position">
                <?php for($i=1; $i<=$page_count; $i++): ?>
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
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" id="visible" value="1" <?php echo $page['visible'] ? "checked" : ""; ?>>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" cols=35 rows=5><?php echo $page['content']; ?></textarea>
            </div>
            <div>
                <input type="submit" value="Edit Page">
            </div>
        </form>
    
    </div>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>">&laquo; Go Back</a>

</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>