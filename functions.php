<?php
// Connect to the main database
/**
 * Creating a function to connect to the main database
 * @return PDO
 */
function connectToDatabase(){
    $db = new PDO('mysql:host=db; dbname=pubs_of_sheffield', 'root', 'password');
    return $db;
}

/**
 * Return list of all items in the database
 *
 * @return mixed
 */
function getAllItems($db){
    $returnItems = $db->prepare('SELECT `id`, `name`, `address`, `rating`, `picture`, `what_to_order`, `open_fire` FROM `pubs`;');
    $returnItems->execute();
    $itemsList = $returnItems->fetchAll();
    return $itemsList;
}