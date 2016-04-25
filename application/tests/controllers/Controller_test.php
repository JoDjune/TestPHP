<?php

class Controller_test extends TestCase {
    
    public function test_index() {
        $output = $this->request("GET", "controller/index");
        $this->assertContains("<h4>2 Rio Ferdinand", $output);
    }
    
    public function test_update() {
        $this->request("GET", "controller/getTim/1");
        // ili ["controller", "getTim", "1"] za drugi argument
        $output = $this->request("GET", "controller/index");
        $this->assertContains("Manchester United Manchester", $output);
    }
    
    public function test_add() {
        $this->request("POST", "controller/add", ["name"=>"Dusan", "tims"=>"5"]);
        $output = $this->request("GET", "controller/index");
        $this->assertContains("Dusan", $output);
    }
    
    public function test_notAdd() {
        $output = $this->request("POST", "controller/add", ["name"=>"abc", "tims"=>"5"]);
        $this->assertContains("The Ime field must be at least 4 characters in length.", $output);
    }
    
    public function test_delete() {
        $this->request("GET", "controller/delete/8");
        $output = $this->request("GET", ["controller", "index"]);
        $this->assertNotContains("Lionel Messi", $output);
    }
}
?>