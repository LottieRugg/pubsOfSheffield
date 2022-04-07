<?php
require 'functions.php';
$db = connectToDatabase();
$id= $_GET["id"];
function getDataForEdit($db,$id){
    $query = $db->prepare("SELECT `id`, `name`, `address`, `rating`, `local_brewery`, `picture`, `what_to_order`, `open_fire` FROM `pubs` WHERE `id` = '$id'");
    $query->execute();
    return $query->fetch();

}
$details_list =getDataForEdit($db, $id);

?>

<html>
<head>
    <link rel="stylesheet" href="pubs_stylesheet.css" type="text/css">
    <title>Editing pubs of Sheffield</title>
</head>
<body>

<div class="collection_item edit">
    <h3> Edit a pub</h3>
    <h5>Use this form to edit pubs in the collection!</h5>
    <h5>You're editing <?php echo $details_list["name"] ?>!</h5>
    <form method="post" class="input_form" action="edit.php">
        <label>Rename <?php echo $details_list["name"]?>:

            <span class="error_message"><?php if (isset($_GET["error_edit_name"])) {
                    echo $_GET["error_edit_name"];
                } ?> </span>
            <input type="text" name="name" required class="input_item" value="<?php echo $details_list["name"]?>">
        </label>
        <label>Change the address:
            <span class="error_message"><?php if (isset($_GET["error_edit_address"])) {
                    echo $_GET["error_edit_address"];
                } ?> </span>
            <input type="text" name="address" class="input_item" value="<?php echo $details_list["address"]?>">
        </label>
        <label> Want to supply a new rating out of ten?
            <span class="error_message"><?php if (isset($_GET["error_edit_rating"])) {
                    echo $_GET["error_edit_rating"];
                } ?> </span>
            <input type="number" min="0" max="10" name="rating" class="input_item" value="<?php echo $details_list["rating"]?>">
        </label>
        <label>Have they switched to a new brewery:
            <span class="error_message"><?php if (isset($_GET["error_brewery_edit"])) {
                    echo $_GET["error_brewery_edit"];
                } ?> </span>
            <input type="text" name="local_brewery" class="input_item" value="<?php echo $details_list["local_brewery"]?>">
        </label>
        <label>Add a new picture here:
            <input type="url" name="picture" class="input_item" value="<?php echo $details_list["picture"]?>">
        </label>
        <label>What should I order if I get to the bar first?
            <span class="error_message"><?php if (isset($_GET["error_what_to_order_edit"])) {
                    echo $_GET["error_what_to_order_edit"];
                } ?> </span>
            <input type="text" name="what_to_order" class="input_item" value="<?php echo $details_list["what_to_order"]?>">
        </label>
        <label class="open_fire">
            <div class="open_fire_label">
                Do they have an open fire?
            </div>
            <label class="radio_button">yes
                <?php if($details_list["open_fire"]==1){?>
                <input type="radio" id="yes" name="open_fire" value="1" checked>
                <?php } else { ?>
                <input type="radio" id="yes" name="open_fire" value="1">
                <?php }?>
            </label>
            <label class="radio_button">no
                <?php if($details_list["open_fire"]==0){?>
                    <input type="radio" id="no" name="open_fire" value="1" checked>
                <?php } else { ?>
                    <input type="radio" id="no" name="open_fire" value="1">
                <?php }?>
            </label>
            <input type="number" name="id" value="<?php echo $details_list["id"]?>" hidden>
        </label>
        <?php


        ?>
        <div class="submit">
            <input type="submit" class="submit_button" value="edit your pub!">
        </div>
    </form>


</form>
</div>
</body>
</html>