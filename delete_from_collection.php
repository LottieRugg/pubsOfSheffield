<?php
require 'functions.php';
$db = connectToDatabase();
$id = $_GET["id"];

deleteItem($id,$db);
