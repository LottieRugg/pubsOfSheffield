<?php
require 'functions.php';
$db = connectToDatabase();
$itemsList = getAllItems($db);
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="pubs_stylesheet.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,400&display=swap"
          rel="stylesheet">
</head>
<body>

<h1>Pubs of Sheffield</h1>
<h3> The definitive guide to the pubs of Sheffield </h3>

<div class="collection_set">
    <?php
    echo selectItem($itemsList);
    ?>

</div>

</body>
</html>