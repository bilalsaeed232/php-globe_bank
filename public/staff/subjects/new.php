<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = "New Subject"; ?>
<?php include_once(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <h1>New Subject</h1>
    <div class="subject new">
        <form action="" method="post">
            <div>
                <label for="position">Position</label>
                <select name="position" id="position">
                    <option value="1">1</option>
                </select>
            </div>
            <div>
                <label for="visible">Visible</label>
                <input type="checkbox" name="visible" id="visible">
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
</div>


<?php include_once(SHARED_PATH . 'staff_footer.php'); ?>