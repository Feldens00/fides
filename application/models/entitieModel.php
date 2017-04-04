<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class entitieModel extends CI_Model {

	public $table = "entities";

	public function create($entitie){
	return $this->db->insert($this->table, $entitie);
	}

	public function delete($entitie){
		return $this->db->delete($this->table, $entitie);
	}

	public function update($entitie){
		$this->db->where('id_entitie', $entitie['id_entitie']);
		return $this->db->update($this->table, $entitie);
	}

	public function getOne($entitie){
		 
		$this->db->where('id_entitie', $entitie);
		$this->db->limit(1);
		return $this->db->get('entities');
	
	}

	public function get(){
		$this->db->order_by('name_entitie','asc');
		return $this->db->get($this->table)->result_array();
	}
}
	