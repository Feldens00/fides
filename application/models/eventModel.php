<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eventModel extends CI_Model {

	public $table = "events";

	public function create($event){
	return $this->db->insert($this->table, $event);
	}

	public function delete($event){
		return $this->db->delete($this->table, $event);
	}

	public function update($event){
		$this->db->where('id_event', $event['id_event']);
		return $this->db->update($this->table, $event);
	}


	public function getOne($event){
		
		$this->db->select('*');    
		$this->db->join('states', 'events.id_state = states.id_state','inner');
		$this->db->join('cities', 'events.id_city = cities.id_city','inner');
		$this->db->join('entities', 'events.id_entitie = entities.id_entitie','inner');
		$this->db->where('id_event', $event);
		$this->db->limit(1);
	   return $this->db->get('events');
		
	}

	
	public function get(){
		$this->db->order_by('name_entitie','asc');
		return $this->db->get($this->table)->result_array();
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

	function getNotET($id_team) {

	$sql = "select DISTINCT name_event, id_event from events where id_event not in (select teams_id_team from events_teams where teams_id_team = '".$id_team."')"; 
			
			return $this->db->query($sql);

		
	}	

	 public function listTE($id_team) {

       	$this->db->select('');    
		$this->db->join('events_teams', 'events.id_event = events_teams.events_id_event','inner');
		$this->db->where('teams_id_team', $id_team);
	   	return $this->db->get('events');
    }



	public function create_eventPeople($id_event,$peopleArray){
	for ( $i = 0, $total = count( $peopleArray ); $i < $total; $i++ )
		{
			$sql = "INSERT INTO  peoples_events (events_id_event, peoples_id_people) VALUES (".$id_event.",'".$peopleArray[$i]."') ON DUPLICATE KEY UPDATE peoples_id_people= ".$peopleArray[$i]."; "; 
			
			$this->db->query($sql);

						
					
		}
	}


	



	public function delete_eventPeople($id_event,$peopleArray){
	for ( $i = 0, $total = count( $peopleArray ); $i < $total; $i++ )
		{
			$sql = "DELETE FROM peoples_events WHERE events_id_event = ".$id_event." AND peoples_id_people ='".$peopleArray[$i]."'	; "; 
			
			$this->db->query($sql);

						
					
		}
	}

	public function create_eventTeam($id_event,$teamArray){
	for ( $i = 0, $total = count( $teamArray ); $i < $total; $i++ )
		{
			$sql = "INSERT INTO  events_teams (events_id_event, teams_id_team) VALUES (".$id_event.",'".$teamArray[$i]."') ON DUPLICATE KEY UPDATE teams_id_team= ".$teamArray[$i]."; "; 
			
			$this->db->query($sql);

						
					
		}
	}

	public function delete_eventTeam($id_event,$teamArray){
	for ( $i = 0, $total = count( $teamArray ); $i < $total; $i++ )
		{
			$sql = "DELETE FROM events_teams WHERE events_id_event = ".$id_event." AND teams_id_team ='".$teamArray[$i]."'	; "; 
			
			$this->db->query($sql);

						
					
		}
	}
	
}