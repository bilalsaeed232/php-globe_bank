<?php require_once('../../../private/initialize.php'); ?>

<?php
    $pages = find_all_pages();
?>

<?php $page_title = "Manage Pages" ?>
<?php include(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <div class="pages listings">
        <h1>Pages</h1>

        <div class="actions">
            <a href="<?php echo url_for('/staff/pages/new.php'); ?>" class="action">Create new page</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Subject ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Title</th>
                <th>Content</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php while($page = mysqli_fetch_assoc($pages)) { ?>
            <tr>
                <td><?php echo h($page['id']); ?></td>
                <td><?php echo h($page['subject_id']); ?></td>
                <td><?php echo h($page['position']); ?></td>
                <td><?php echo h($page['visible']); ?></td>
                <td><?php echo h($page['menu_name']); ?></td>
                <td><?php echo h($page['content']); ?></td>
                <td><a href="show.php?id=<?php echo h(u($page['id'])); ?>" class="action">View</a></td>
                <td><a href="edit.php?id=<?php echo h(u($page['id'])); ?>" class="action">Edit</a></td>
                <td><a href="" class="action">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <!-- done with the data, now time to release database result set from memory -->
        <?php 
            mysqli_free_result($pages);
        ?>
    </div>
</div>

<?php include(SHARED_PATH . 'staff_footer.php'); ?>