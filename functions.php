<?php

/**
 * Connect to the main database
 *
 * @return PDO
 */
function connectToDatabase(): PDO
{
    $db = new PDO('mysql:host=db; dbname=pubs_of_sheffield', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * Return list of all items in the database
 *
 * @param $db
 * @return mixed
 */
function getAllItems($db): array
{
    $query = $db->prepare('SELECT `id`, `name`, `address`, `rating`, `picture`, `what_to_order`, `open_fire` FROM `pubs` WHERE `is_deleted` = 0;');
    $query->execute();
    return $query->fetchAll();

}


/**
 * Displays items from an array as HTML
 *
 * @param array $itemsList
 * @return string
 */
function selectItem(array $itemsList): string
{
    if ($itemsList == [[]]) {
        return 'This collection has no items in it yet!';
    } else {
        $itemResult = "";
        foreach ($itemsList as $item) {
            $itemResult .= '<div class="collection_item">';
            $itemResult .= '<div><h3>';
            $itemResult .= $item["name"];
            $itemResult .= '</h3></div> <img src="';
            $itemResult .= $item["picture"];
            $itemResult .= '" class="pub_image" alt="';
            $itemResult .= $item["name"];
            $itemResult .= '"> <div class="item_detail"><h6> Where to find ';
            $itemResult .= $item["name"];
            $itemResult .= '</h6>:';
            $itemResult .= $item["address"];
            $itemResult .= '</div>
        <div class="item_detail">
        <h6> What to order for me if you get to the bar first: </h6>';
            $itemResult .= $item["what_to_order"];
            $itemResult .= '</div>
        <div class="item_detail">
            <h6> Can we sit by the fire? </h6>';

            if ($item["open_fire"] == '1') {
                $itemResult .= 'Yes 🔥 !';
            } else {
                $itemResult .= 'No, wrap up warm.  ❄';

            }
            $itemResult .= '</div><div class="item_detail">';

            for ($i = 0; $i < $item["rating"]; $i++) {
                $itemResult .= "🍺 ";
            }
            $itemResult .= '/10.
           
        </div>';
            $itemResult .= '<div class="buttons"> <a href="edit_a_pub.php?id=';
            $itemResult .= $item["id"];
            $itemResult .= '" class="edit_button"> <i class="fa-solid fa-pencil fa-2x"></i></a>';
            $itemResult .= '<a href="delete_from_collection.php?id=';
            $itemResult .= $item["id"];
            $itemResult .= '" class="delete_button"> <i class="fa-solid fa-trash-can fa-2x button"></i></a>';


            $itemResult .= '</div></div>';
        }
    }
    return $itemResult;
}


/**
 * Cleans the data input
 *
 * @param $inputData
 * @return string
 */

function cleanInput(string $inputData): string
{
    $trimmedInput = trim($inputData);
    return htmlspecialchars($trimmedInput);

}

/**
 * deletes a database item
 *
 * @param $id
 * @param $db
 * @return void
 */
function deleteItem($id, $db)
{
    $is_deleted=1;
    $query = $db->prepare("UPDATE `pubs` SET `is_deleted` = :is_deleted WHERE `id` = :id");
    $query->bindParam(':is_deleted', $is_deleted);
    $query->bindParam(':id', $id);
    $query->execute();
    header("location:pubs_of_sheffield.php");
}

/**
 * Making sure no one ever orders a carling.
 *
 * @param string
 * @return bool
 */
function carlingValidator(string $order): bool{
    $carling_query = strtolower($order);
    if (strpos($carling_query, 'carling') !== false){ return TRUE;}
    return FALSE;

}

