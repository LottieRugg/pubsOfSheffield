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
    <?php foreach ($itemsList as $item) { ?>
        <div class='collection_item'>
            <div><h3>
                    <?php echo $item["name"];
                    ?></h3></div>
            <img src="<?php echo $item["picture"]; ?>" class="pub_image">
            <div class="item_detail">
                <h6> Where to find <?php echo $item["name"]; ?></h6>:
                <?php
                echo $item["address"]; ?></div>
            <div class="item_detail">
                <h6> What to order for me if you get to the bar first: </h6>
                <?php
                echo $item["what_to_order"]; ?>
            </div>
            <div class="item_detail">
                <h6> Can we sit by the fire? </h6>
                <?php if ($item['open_fire'] == 1) { ?>
                    Yes 🔥 !
                <?php } else { ?>
                    No, wrap up warm. ❄️ <?php
                } ?>
            </div>
            <div class="item_detail">

                <?php
                for ($i = 0; $i < $item['rating']; $i++) {
                    echo "🍺 ";
                } ?> /10.
            </div>
        </div>
        <?php

    } ?>

</div>

</body>
</html>