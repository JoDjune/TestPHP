<?php

class Model_test extends TestCase {
    
    public function setUp() {
        $this->resetInstance();
        $this->CI->load->model("model");
        $this->obj = $this->CI->model;
    }
    
    public function test_getAllTims() {
        $actual = $this->obj->getAllTims();
        $expected = new stdClass();
        $expected->SifT = 1;
        $expected->Naziv = "Manchester United";
        $expected->Mesto = "Manchester";
        $this->assertEquals($expected, $actual[0]);
    }
    
    public function test_getPlayerById() {
        $actual = $this->obj->getPlayerById(10);
        $expected = "Andres Iniesta";
        $this->assertEquals($expected, $actual[0]->Ime);
    }
    
    public function test_lastIdPlayer() {
        $actual = $this->obj->getLastIdPlayer();
        $expected = 10;
        $this->assertNotEquals($expected, $actual[0]->SifF);
    }
}
?>