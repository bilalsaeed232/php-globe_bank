<?php if(!isset($page_title)) { $page_title = 'Staff Menu'; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GBI: <?php echo $page_title; ?> </title>

    <link rel="stylesheet" href="<?php echo url_for("stylesheets/staff.css"); ?>" />
</head>
<body>
    <header>
        <h1>GBI Staff Area : <?php echo $page_title; ?></h1>
    </header>


    <navigation>
        <ul>
            <li><a href="<?php echo url_for("staff/index.php"); ?>">Menu</a></li>
            <li><a href="<?php echo url_for("/staff/pages/"); ?>">Pages</a></li>
            <li><a href="<?php echo url_for("/staff/subjects/"); ?>">Subjects</a></li>
        </ul>
    </navigation>
