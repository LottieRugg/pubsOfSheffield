<?php
require 'functions.php';
$db = connectToDatabase();
$itemsList = getAllItems($db);
session_start()
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="pubs_stylesheet.css" type="text/css">
</head>
<body>

<h1>Pubs of Sheffield</h1>
<h3> The definitive guide to the pubs of Sheffield </h3>

<div class="collection_set">
    <?php
    echo selectItem($itemsList);
    ?>


    <div class="collection_item">
        <h3> Add a pub!</h3>
        <h5>Use this form to add new pubs to the collection!</h5>
        <form method="post" class="input_form">
            <label>Pub name:
                <input type="text" name="name" required class="input_item">
            </label>
            <label>What is the pub's address?
                <input type="text" name="address" class="input_item">
            </label>
            <label> What is rating out of ten?
                <input type="number" min="0" max="10" name="rating" class="input_item">
            </label>
            <label>What is their local brewery?
                <input type="text" name="local_brewery" class="input_item">
            </label>
            <label>Include a link to a picture here:
                <input type="url" name="picture" class="input_item">
            </label>
            <label>What should I order if I get to the bar first?
                <input type="text" name="what_to_order" class="input_item">
            </label>
            <label class="open_fire">
                <div class="open_fire_label">
                    Do they have an open fire?
                </div>
                <label class="radio_button">yes
                    <input type="radio" id="yes" name="open_fire" value="1">
                </label>
                <label class="radio_button">no
                    <input type="radio" id="no" name="open_fire" value="0">
                </label>
            </label>
            <div class="submit">
                <input type="submit" class="submit_button" value="Collect your pub!">
            </div>
        </form>
    </div>
</div>
</body>
</html>