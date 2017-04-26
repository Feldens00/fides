<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peopleModel extends CI_Model {

	public $table = "peoples";

	public function create($people){
	return $this->db->insert($this->table, $people);
	}

	public function delete($people){
		return $this->db->delete($this->table, $people);
	}

	public function update($people){
		$this->db->where('id_people', $people['id_people']);
		return $this->db->update($this->table, $people);
	}
	
	public function getOne($people){
	   
	    $this->db->select('*');    
		//$this->db->join('teams', 'peoples.id_team = teams.id_team','inner');
		$this->db->join('states', 'peoples.id_state = states.id_state','inner');
		$this->db->join('cities', 'peoples.id_city = cities.id_city','inner');
		$this->db->where('id_people', $people);
		$this->db->limit(1);
	   	return $this->db->get('peoples');
	}

	public function get(){
		$this->db->select('');    
		$this->db->join('states', 'peoples.id_state = states.id_state','inner');
		$this->db->join('cities', 'peoples.id_city = cities.id_city','inner');
		$this->db->order_by('name_people','asc');
		return $this->db->get($this->table);
	}

	function getEstados() {
		
		return $this->db->get('states')->result();
		
	}
	
	function getCidades($id = null) {
		
		if(!is_null($id))
			$this->db->where( array('states.id_state' => $id) );
		return $this->db->select('cities.id_city, cities.name_city')
				 		->from('states')
				 		->join('cities', 'cities.id_state = states.id_state')
						->get()->result();
		
	}

	function getNotEv($id_event) {

	$sql = "select DISTINCT name_people, id_people from peoples where id_people not in (select peoples_id_people from peoples_events where events_id_event = '".$id_event."')  and id_people not in (select peoples_id_people from peoples_teams )"; 
			
			return $this->db->query($sql)->result();

		
	}	
	
	function getNotTm($id_team) {

	$sql = "select DISTINCT name_people, id_people from peoples where id_people not in (select peoples_id_people from peoples_teams where teams_id_team = '".$id_team."') and id_people not in (select peoples_id_people from peoples_teams ) "; 
			
			return $this->db->query($sql)->result();

		
	}	
	 public function listEP($id_event) {

       	$this->db->select('');    
		$this->db->join('peoples_events', 'peoples.id_people = peoples_events.peoples_id_people','inner');
		$this->db->where('events_id_event', $id_event);
	   	return $this->db->get('peoples')->result();
    }

     public function listTP($id_team) {

       	$this->db->select('');    
		$this->db->join('peoples_teams', 'peoples.id_people = peoples_teams.peoples_id_people','inner');
		$this->db->where('teams_id_team', $id_team);
	   	return $this->db->get('peoples')->result();
    }

}