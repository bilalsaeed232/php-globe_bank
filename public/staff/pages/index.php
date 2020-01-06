<?php require_once('../../../private/initialize.php'); ?>

<?php
    $pages = [
        ['ID' => '1', 'visible' => '1', 'title' => 'Home', 'content' => 'this is home page' ],
        ['ID' => '2', 'visible' => '1', 'title' => 'About', 'content' => 'this is about page' ],
        ['ID' => '3', 'visible' => '1', 'title' => 'Contact Us', 'content' => 'this is contact page' ],
        ['ID' => '4', 'visible' => '1', 'title' => 'Products', 'content' => 'this is products page' ],
        ['ID' => '5', 'visible' => '1', 'title' => 'FAQs', 'content' => 'this is faqs page' ]
    ];
?>

<?php $page_title = "Manage Pages" ?>
<?php include(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <div class="pages listings">
        <h1>Pages</h1>

        <div class="actions">
            <a href="" class="action">Create new page</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Visible</th>
                <th>Title</th>
                <th>Content</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($pages as $page) { ?>
            <tr>
                <td><?php echo $page['ID']; ?></td>
                <td><?php echo $page['visible']; ?></td>
                <td><?php echo $page['title']; ?></td>
                <td><?php echo $page['content']; ?></td>
                <td><a href="show.php?id=<?php echo u($page['ID']); ?>" class="action">View</a></td>
                <td><a href="" class="action">Edit</a></td>
                <td><a href="" class="action">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include(SHARED_PATH . 'staff_footer.php'); ?>