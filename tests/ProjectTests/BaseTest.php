<?php
/**
*
*/

/**
*
*/
class BaseTest extends PHPUnit_Framework_TestCase {
    /**
    *
    */
    public function testVariables() {
        $base = new Base;

        $base->a = "working";
        $this->assertEquals($base->a, "working");

        $this->assertNull($base->doesNotExist);
    }

    /**
    *
    */
    public function testMethods() {
        $base = new Base;
        $base->exists = function () { return true; };
        $this->assertTrue($base->exists());
    }

    /**
    * @expectedException Exception
    */
    public function testMethodDoesNotExist() {
        $base = new Base;
        $this->assertNull($base->doesNotExist());
    }
}

