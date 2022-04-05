<?php
require 'functions.php';
$db = connectToDatabase();

if (isset($_POST["name"])) {
    $name_input = $_POST["name"];
    $address_input = $_POST["address"];
    $rating_input = $_POST["rating"];
    $local_brewery_input = $_POST["local_brewery"];
    $picture_input = $_POST["picture"];
    $what_to_order_input = $_POST["what_to_order"];
    $open_fire_input = $_POST["open_fire"];
}


$query = $db->prepare("INSERT INTO `pubs` (`name`, `address`, `rating`, `local_brewery`, `picture`, `what_to_order`, `open_fire`)
VALUES (:name, :address, :rating, :local_brewery, :picture, :what_to_order, :open_fire);");

$query->bindParam(':name',$name_input);
$query->bindParam(':address', $address_input);
$query->bindParam(':rating', $rating_input);
$query->bindParam(':local_brewery', $local_brewery_input);
$query->bindParam(':picture', $picture_input);
$query->bindParam(':what_to_order', $what_to_order_input);
$query->bindParam(':open_fire', $open_fire_input);

$query-> execute();
header ("location:pubs_of_sheffield.php");