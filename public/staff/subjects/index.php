<?php require_once('../../../private/initialize.php'); ?>

<?php
    $subjects = [
        ['ID' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
        ['ID' => '2', 'position' => '2', 'visible' => '2', 'menu_name' => 'Consumer'],
        ['ID' => '3', 'position' => '3', 'visible' => '3', 'menu_name' => 'Small Business'],
        ['ID' => '4', 'position' => '4', 'visible' => '4', 'menu_name' => 'Commercial']
    ];
?>

<?php $page_title = "Manage Subjects"; ?>
<?php include(SHARED_PATH . 'staff_header.php'); ?>

<div id="content">
    <div class="subjects listings">
        <h1>Subjects</h1>

        <div class="actions">
            <a href="" class="action">Create New Subject</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach($subjects as $subject) { ?>
                <tr>
                    <td><?php echo h($subject['ID']); ?></td>
                    <td><?php echo h($subject['position']); ?></td>
                    <td><?php echo $subject['visible'] ? 'Yes': 'No'; //as we are not outputing it directly no need for escaping ?></td>
                    <td><?php echo h($subject['menu_name']); ?></td>
                    <td class="action"><a href="show.php?id=<?php echo h(u($subject['ID'])); ?>">View</a></td>
                    <td class="action"><a href="">Edit</a></td>
                    <td class="action"><a href="">Delete</a></td>      
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include(SHARED_PATH . 'staff_footer.php'); ?>