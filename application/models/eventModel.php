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


	public function getTE($event){

		$sql = "SELECT tm.name_team FROM teams tm INNER JOIN events_teams et ON tm.id_team = et.teams_id_team INNER JOIN events ev ON et.events_id_event = ev.id_event WHERE tm.id_team IN (SELECT teams_id_team FROM events_teams WHERE events_id_event ='".$event."') AND tm.id_team IN (SELECT teams_id_team FROM peoples_teams)"; 
			
			return $this->db->query($sql);

		
	}

	

	public function getPT($event){
		$id_user = $this->session->userdata('id_user');
		$this->db->select('peoples.name_people, teams.name_team, peoples.email, states.name_state, cities.name_city');        
		$this->db->join('events_teams', 'events.id_event = events_teams.events_id_event','inner');
		$this->db->join('teams', 'events_teams.teams_id_team = teams.id_team','inner');
		$this->db->join('peoples_teams', 'teams.id_team = peoples_teams.teams_id_team','inner');
		$this->db->join('peoples', 'peoples_teams.peoples_id_people = peoples.id_people','inner');
		$this->db->join('states', 'peoples.id_state = states.id_state','inner');
		$this->db->join('cities', 'peoples.id_city = cities.id_city','inner');
		$this->db->where('id_event', $event);
		$this->db->where('peoples_teams.events_id_event', $event);
		$this->db->where('events.id_user', $id_user);
		$this->db->order_by('teams.id_team','asc');
	   return $this->db->get('events');
		
	}

	public function getPE($event){
		$id_user = $this->session->userdata('id_user');

		$this->db->select('*');   
		$this->db->join('peoples_events', 'events.id_event = peoples_events.events_id_event','inner');
		$this->db->join('peoples', 'peoples_events.peoples_id_people = peoples.id_people','inner');
		$this->db->join('states', 'peoples.id_state = states.id_state','inner');
		$this->db->join('cities', 'peoples.id_city = cities.id_city','inner'); 
		$this->db->where('id_event', $event);
		$this->db->where('events.id_user', $id_user);
	   return $this->db->get('events');
		
	}
	
	public function get(){
		$id_user =$this->session->userdata('id_user');
		
		$this->db->select('*');   
		$this->db->join('states', 'events.id_state = states.id_state','inner');
		$this->db->join('cities', 'events.id_city = cities.id_city','inner'); 
		$this->db->join('entities', 'events.id_entitie = entities.id_entitie','inner');
		$this->db->where('events.id_user',$id_user);
		$this->db->order_by('name_event','asc');
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

	/*function getNotET($id_team) {

	$sql = "select DISTINCT name_event, id_event from events where id_event not in (select teams_id_team from events_teams where teams_id_team = '".$id_team."')"; 
			
			return $this->db->query($sql);

		
	}


	}*/	

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