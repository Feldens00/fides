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
		$id_user =$this->session->userdata('id_user');

		$this->db->select('');    
		$this->db->join('states', 'peoples.id_state = states.id_state','inner');
		$this->db->join('cities', 'peoples.id_city = cities.id_city','inner');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('name_people','asc');
		return $this->db->get($this->table);
	}

	public function search_delete($id_team, $id_event, $search){

		$this->db->join('peoples_teams', 'peoples.id_people = peoples_teams.peoples_id_people','inner');
		$this->db->where('teams_id_team', $id_team);
		$this->db->where('events_id_event', $id_event);
		$this->db->like('peoples.name_people', $search);
	   	return $this->db->get('peoples')->result();
	}

	public function search_create($id_team, $id_event, $search){

		$id_user =$this->session->userdata('id_user');
		$sql = "SELECT * FROM peoples p 
			WHERE p.id_people NOT IN
			(SELECT peoples_id_people FROM peoples_teams 
			 WHERE events_id_event = ".$id_event." 
			 AND teams_id_team =".$id_team.")
			and p.id_people not in 
			(SELECT peoples_id_people FROM peoples_teams 
			 WHERE events_id_event = ".$id_event."
			 AND teams_id_team <>".$id_team.")
			 AND id_user = ".$id_user." AND p.name_people LIKE '%".$search."%';";

		return $this->db->query($sql)->result();

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
		$id_user = $this->session->userdata('id_user');

		$sql = "SELECT * FROM peoples p
				WHERE p.id_people NOT IN (SELECT peoples_id_people FROM peoples_events WHERE events_id_event =".$id_event.")
				and p.id_people NOT IN (SELECT peoples_id_people FROM peoples_teams pt
				INNER JOIN teams tm 
				ON pt.teams_id_team = tm.id_team
				INNER JOIN events_teams et
				ON et.teams_id_team = tm.id_team
				WHERE et.events_id_event = ".$id_event.") AND p.id_user = '".$id_user."';"; 
			
			return $this->db->query($sql)->result();

		
	}	
	
	
	public function getPeopleNotTE($id_team, $id_event){

		$id_user =$this->session->userdata('id_user');
		$sql = "SELECT * FROM peoples p 
			WHERE p.id_people NOT IN
			(SELECT peoples_id_people FROM peoples_teams 
			 WHERE events_id_event = ".$id_event." 
			 AND teams_id_team =".$id_team.")
			and p.id_people not in 
			(SELECT peoples_id_people FROM peoples_teams 
			 WHERE events_id_event = ".$id_event."
			 AND teams_id_team <>".$id_team.")
			 AND id_user = ".$id_user."
			 ORDER BY p.name_people ASC ;";

		return $this->db->query($sql)->result();
	}

    public function listTP($id_team,$id_event) {

		$this->db->join('peoples_teams', 'peoples.id_people = peoples_teams.peoples_id_people','inner');
		$this->db->where('teams_id_team', $id_team);
		$this->db->where('events_id_event', $id_event);
		$this->db->order_by('name_people','asc');
	   	return $this->db->get('peoples')->result();

	  
    }

}