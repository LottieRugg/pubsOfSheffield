<?php
require '../functions.php';

use PHPUnit\Framework\TestCase;

class cleanInputTest extends TestCase{

    //success test for clean input function, clean data
    public function testCleanInputSuccess(){
        $testCleanData= 'The Queen Victoria, Walford';
        $expected='The Queen Victoria, Walford';
        $case = cleanInput($testCleanData);
        $this->assertEquals($expected, $case);
    }

    //success test with unclean data
    public function testCleanInputSuccessUncleanData(){
        $testUncleanData= "    <a href='html'>'specialchars'</a>   ";
        $expected="&lt;a href='html'&gt;'specialchars'&lt;/a&gt;";
        $case =cleanInput($testUncleanData);
        $this->assertEquals($expected, $case);

    }

    //malformed test
    public function testCleanInputMalformed(){
        $testMalformedData= [[1]];
        $this->expectException(TypeError::class);
        cleanInput($testMalformedData);
    }

}
