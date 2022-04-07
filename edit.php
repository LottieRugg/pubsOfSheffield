<?php
require 'functions.php';
$db = connectToDatabase();
$id = $_POST["id"];
//$id=5;
//var_dump($_POST);
//This page is to edit data in the SQL database

if (isset($_POST["name"])) {
    if (strlen($_POST["name"]) > 3) {
        $name_input = cleanInput($_POST["name"]);
    } else {
        header("location:edit_a_pub.php?id={$id}&error_edit_name=Please check you have chosen the right name");
        exit();
    }
    if (strlen($_POST["address"]) > 5) {
        $address_input = cleanInput($_POST["address"]);
    } else {
        header("location:edit_a_pub.php?id={$id}&error_edit_address=Hmm not sure that address is correct");
        exit();
    }

    if (($_POST["rating"] >= 0) && ($_POST["rating"] <= 10)) {
        $rating_input = cleanInput($_POST["rating"]);
    } else {
        header("location:edit_a_pub.php?id={$id}&error_edit_rating=Your rating must be a number from 0 to 10");
        exit();
    }

    if ((strlen($_POST["local_brewery"]) >= 4) OR ($_POST["local_brewery"] == "")){
        $local_brewery_input = cleanInput($_POST["local_brewery"]);
    } else {
        header("location:edit_a_pub.php?id={$id}&error_brewery_edit=They don't brew beer there! Please enter a valid brewery or leave blank");
        exit();
    }
    $picture_input = $_POST["picture"];
    if (strpos($_POST["what_to_order"], 'carling') !== false){
        header("location:edit_a_pub.php?id={$id}&error_what_to_order_edit=Please don't order me a Carling!");
        exit();
    } else {
        $what_to_order_input = cleanInput($_POST["what_to_order"]);
    }
    $open_fire_input = cleanInput($_POST["open_fire"]);


}

$query = $db->prepare("UPDATE `pubs` SET `name` = :name, `address` =:address, `rating` =:rating, `local_brewery`= :local_brewery, `picture`= :picture, `what_to_order` = :what_to_order, `open_fire` = :open_fire
WHERE `id` = :id");

$query->bindParam(':name', $name_input);
$query->bindParam(':address', $address_input);
$query->bindParam(':rating', $rating_input);
$query->bindParam(':local_brewery', $local_brewery_input);
$query->bindParam(':picture', $picture_input);
$query->bindParam(':what_to_order', $what_to_order_input);
$query->bindParam(':open_fire', $open_fire_input);
$query->bindParam(':id', $id);

$query->execute();
header("location:pubs_of_sheffield.php");
