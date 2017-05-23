<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teamModel extends CI_Model {

	public $table = "teams";

	public function create($team){
	return $this->db->insert($this->table, $team);
	}

	public function delete($team){
		return $this->db->delete($this->table, $team);
	}

	public function update($team){
		$this->db->where('id_team', $team['id_team']);
		return $this->db->update($this->table, $team);
	}
	
	public function getOne($team){
	   
	    $this->db->select('*');    
		//$this->db->join('events', 'teams.id_event = events.id_event','inner');
		$this->db->where('id_team', $team);
		$this->db->limit(1);
	   	return $this->db->get('teams');
	}

	public function get(){

		//$this->db->from('peoples p');
		//$this->db->join('peoples_teams pt', 'p.id_people = pt.peoples_id_people','inner');
		//$this->db->join('teams t', 'pt.teams_id_team = t.id_team','inner');
		//$this->db->join('events', 'teams.id_event = events.id_event','inner'
		//$this->db->join('events', 'teams.id_event = events.id_event','inner');
		$this->db->order_by('name_team','asc');
		return $this->db->get('teams');
	}



	public function listET($id_event) {

       	$this->db->select('');    
		$this->db->join('events_teams', 'teams.id_team = events_teams.teams_id_team','inner');
		$this->db->where('events_id_event', $id_event);
	   	return $this->db->get('teams')->result();
    }

	public function create_teamPeople($id_team, $peopleArray){
	for ( $i = 0, $total = count( $peopleArray ); $i < $total; $i++ )
		{
			$sql = "INSERT INTO  peoples_teams (teams_id_team, peoples_id_people) VALUES (".$id_team.",".$peopleArray[$i].") ON DUPLICATE KEY UPDATE peoples_id_people= ".$peopleArray[$i]."; "; 
			
			$this->db->query($sql);

						
					
		}
	}
	public function delete_teamPeople($id_team,$peopleArray){
	for ( $i = 0, $total = count( $peopleArray ); $i < $total; $i++ )
		{
			$sql = "DELETE FROM peoples_teams WHERE teams_id_team = ".$id_team." AND peoples_id_people ='".$peopleArray[$i]."'	; "; 
			
			$this->db->query($sql);

						
					
		}
	}

}