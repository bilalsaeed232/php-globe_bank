<?php require_once('../../../private/initialize.php'); ?>

<?php
// no need to urldecode as php automatically do it in super global variables
echo "Subject ID: " . h($_GET['id']);
?>
<br>
<a href="index.php">&laquo; Go Back</a>