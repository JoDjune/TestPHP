<?php

class Model extends CI_Model {
   
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllPlayers() {
        $query = $this->db->get("fudbaler");
        return $query->result();
    }
    
    public function getTim($id) {
        $this->db->where("SifT", $id);
        return $this->db->get("tim")->result();
    }
    
    public function delete($id) {
        $this->db->where("SifF", $id);
        $this->db->delete("fudbaler");
    }
    
    public function getAllTims() {
        return $this->db->get("tim")->result();
    }
    
    public function getLastIdPlayer() {
        $this->db->order_by("SifF", "desc");
        $this->db->limit(1);
        return $this->db->get("Fudbaler")->result(); 
    }
    public function insert($data) {
        $last = $this->getLastIdPlayer();
        $data["SifF"] = $last[0]->SifF + 1;
        $this->db->insert("fudbaler", $data);
    }
    
    public function getPlayerById($id) {
        return $this->db->get_where("fudbaler", array("SifF"=>$id))->result();
    }
    
    public function update($id, $data) {
        $this->db->where("SifF", $id);
        $this->db->update("fudbaler", $data);
    }
}
?>