<?php

class Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("model");
        $this->load->library("session");
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->helper("security");
    }
    
    public function index() {
        echo $this->session->flashdata("tim");
        $data = $this->model->getAllPlayers();
        $arr = array(
            "title" => "Database", 
            "page" => "select",
            "data" => $data
        );
        $this->load->view("templates/page", $arr);
    }
    
    public function getTim($id) {
        $data = $this->model->getTim($id);
        foreach ($data as $row) {
            $result = $row->Naziv." ".$row->Mesto;
        }
        $this->session->set_flashdata("tim", $result);
        redirect("controller");
    }
    
    public function delete($id) {
        $this->model->delete($id);
        redirect("controller");
    }
    
    public function create() {
        $data = $this->model->getAllTims();
        $arr = array(
            "title" => "Database", 
            "page" => "add",
            "data" => $data
        );
        $this->load->view("templates/page", $arr);
    }
    
    public function add() {
        $ime = $this->input->post("name");
        $tim = $this->input->post("tims");
        $this->form_validation->set_rules("name", "Ime", "required|xss_clean|min_length[4]");
        if ($this->form_validation->run()) {
            $data = array(
                "Ime" => $ime,
                "SifT" => $tim
            );
            $this->model->insert($data);
            redirect("controller");
        }
        else {
            $data = $this->model->getAllTims();
            $arr = array(
                "title" => "Database",
                "page" => "add",
                "data" => $data, 
                "errors" =>  validation_errors()
            );
            $this->load->view("templates/page", $arr);
        }
    }
    
    public function update($id) {
        $data = $this->model->getAllTims();
        $player = $this->model->getPlayerById($id);
        $arr = array(
            "title" => "Database", 
            "page" => "update",
            "data" => $data, 
            "id" => $player[0]->SifF,
            "name" => $player[0]->Ime,
            "tim" => $player[0]->SifT
        );
        $this->load->view("templates/page", $arr);
    }
    
    public function change($id) {
        $ime = $this->input->post("name");
        $tim = $this->input->post("tims");
        $this->form_validation->set_rules("name", "Ime", "required|xss_clean|min_length[4]");
        if ($this->form_validation->run()) {
            $data = array(
                "Ime" => $ime,
                "SifT" => $tim
            );
            $this->model->update($id, $data);
            redirect("controller");
        }
        else {
            $player = $this->model->getPlayerById($id);
            $data = $this->model->getAllTims();
            $arr = ["title" => "Database",
                "page" => "update",
                "data" => $data, 
                "errors" =>  validation_errors(),
                "id" => $player[0]->SifF,
                "name" => $player[0]->Ime,
                "tim" => $player[0]->SifT
                ];
            $this->load->view("templates/page", $arr);
        }
    }
}
?>