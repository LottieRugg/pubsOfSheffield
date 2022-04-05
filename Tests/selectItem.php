<?php
require '../functions.php';

use PHPUnit\Framework\TestCase;

class selectItem extends TestCase
{
    //success test
    public function testSelectItemSuccess()
    {
        $testArray = [["id" => "1",
            "name" => "The Blake Hotel",
            "address" => "56 Blake Street, S6 5JS",
            "rating" => "10",
            "picture" => "https://whatpub-new.s3.eu-west-1.amazonaws.com/images/pubs/800x600%402x/SHF-659-66523-blake-hotel-sheffield-north.jpg",
            "what_to_order" => "the usual",
            "open_fire" => "1"]];

        $expected = '<div class="collection_item"><div><h3>The Blake Hotel</h3></div> <img src="https://whatpub-new.s3.eu-west-1.amazonaws.com/images/pubs/800x600%402x/SHF-659-66523-blake-hotel-sheffield-north.jpg" class="pub_image" alt="The Blake Hotel"> <div class="item_detail"><h6> Where to find The Blake Hotel</h6>:56 Blake Street, S6 5JS</div>
        <div class="item_detail">
        <h6> What to order for me if you get to the bar first: </h6>the usual</div>
        <div class="item_detail">
            <h6> Can we sit by the fire? </h6>Yes 🔥 !</div><div class="item_detail">🍺 🍺 🍺 🍺 🍺 🍺 🍺 🍺 🍺 🍺 /10.
        </div>
    </div>';

        $case = selectItem($testArray);
        $this->assertEquals($expected, $case);
    }

//Success empty array
    public function testSelectItemSuccessEmptyArray()
    {
        $testEmptyArray = [[]];
        $expected = 'This collection has no items in it yet!';
        $case = selectItem($testEmptyArray);
        $this->assertEquals($expected, $case);
    }

//malformed test
    public function testSelectItemMalformed()
    {
        $testBool = 0;
        $this->expectException(TypeError::class);
        selectItem($testBool);
    }
}
