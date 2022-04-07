<?php
require 'functions.php';
$db = connectToDatabase();
$id = $_GET["id"];
$is_deleted = 1;

$query = $db->prepare("UPDATE `pubs` SET `is_deleted` = :is_deleted WHERE `id` = :id");

$query->bindParam(':is_deleted', $is_deleted);
$query->bindParam(':id', $id);
$query->execute();
header("location:pubs_of_sheffield.php");