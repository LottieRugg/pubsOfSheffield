<?php
require 'functions.php';
$db = connectToDatabase();


if (isset($_POST["name"])) {
    if (strlen($_POST["name"]) > 3) {
        $name_input = cleanInput($_POST["name"]);
    } else {
        header("location:pubs_of_sheffield.php?error_name=Please check the name of your pub");
        exit();
    }
    if (strlen($_POST["address"]) > 5) {
        $address_input = cleanInput($_POST["address"]);
    } else {
        header("location:pubs_of_sheffield.php?error_address=Hmm not sure that address is correct");
        exit();
    }

    if (($_POST["rating"] >= 0) && ($_POST["rating"] <= 10)) {
        $rating_input = cleanInput($_POST["rating"]);
    } else {
        header("location:pubs_of_sheffield.php?error_rating=Your rating must be a number from 0 to 10");
        exit();
    }

    if ((strlen($_POST["local_brewery"]) >= 4) OR ($_POST["local_brewery"] == "")){
        $local_brewery_input = cleanInput($_POST["local_brewery"]);
    } else {
        header("location:pubs_of_sheffield.php?error_brewery=They don't brew beer there! Please enter a valid brewery or leave blank");
        exit();
    }

    $picture_input = $_POST["picture"];

    if ($_POST["what_to_order"] == "Pint of Carling"){
        header("location:pubs_of_sheffield.php?error_what_to_order=There is no chance I am drinking a pint of Carling please try again");
        exit();
    } else{
        $what_to_order_input = cleanInput($_POST["what_to_order"]);
    }

    $open_fire_input = cleanInput($_POST["open_fire"]);

}

$query = $db->prepare("INSERT INTO `pubs` (`name`, `address`, `rating`, `local_brewery`, `picture`, `what_to_order`, `open_fire`)
VALUES (:name, :address, :rating, :local_brewery, :picture, :what_to_order, :open_fire);");

$query->bindParam(':name', $name_input);
$query->bindParam(':address', $address_input);
$query->bindParam(':rating', $rating_input);
$query->bindParam(':local_brewery', $local_brewery_input);
$query->bindParam(':picture', $picture_input);
$query->bindParam(':what_to_order', $what_to_order_input);
$query->bindParam(':open_fire', $open_fire_input);

$query->execute();
header("location:pubs_of_sheffield.php");