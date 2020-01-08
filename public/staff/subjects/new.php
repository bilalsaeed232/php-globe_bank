<?php require_once('../../../private/initialize.php'); ?>

<?php 
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
        <form action="<?php echo url_for('staff/subjects/create.php'); ?>" method="post">
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