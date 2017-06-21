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

	public function getIdEventPT($id_team){

		$this->db->where('teams_id_team', $id_team);
		$this->db->order_by('events_id_event','DESC');
		$this->db->limit(1);
	   	return $this->db->get('peoples_teams');
	}
	public function getOne($team){
	   
	       
		//$this->db->join('events', 'teams.id_event = events.id_event','inner');
		$this->db->where('id_team', $team);
		$this->db->limit(1);
	   	return $this->db->get($this->table);
	}

	public function get(){
		
		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('name_team','asc');
		return $this->db->get($this->table);
	}

	function getNotEV($id_event) {
  		
  		$id_user = $this->session->userdata('id_user');
 		$sql = "select DISTINCT name_team, id_team from teams where id_team not in (select teams_id_team from events_teams where events_id_event = '".$id_event."') and teams.id_user = '".$id_user."';"; 
 			
 			return $this->db->query($sql)->result();
 
 		
 	}	

	public function listET($id_event) {

       	$this->db->select('');    
		$this->db->join('events_teams', 'teams.id_team = events_teams.teams_id_team','inner');
		$this->db->where('events_id_event', $id_event);
	   	return $this->db->get($this->table)->result();
    }

    public function verificationTeamEvent($id_team) {
 		
       	$this->db->select('*');    
		$this->db->where('teams_id_team', $id_team);
	    $retorno = $this->db->get('events_teams')->result();

	    if (empty($retorno)) {
	    	return false;
	    }else{
	    	return true;
	    }
    }

     public function verificationPeopleTeam($id_team,$id_event) {

       	  
		$this->db->where('teams_id_team', $id_team);
		$this->db->where('events_id_event', $id_event);
	    $retorno = $this->db->get('peoples_teams')->result();

	    if (empty($retorno)) {
	    	return false;
	    }else{
	    	return true;
	    }
    }

	public function create_teamPeople($id_team, $id_event, $peopleArray){
	for ( $i = 0, $total = count( $peopleArray ); $i < $total; $i++ )
		{
			$sql = "INSERT INTO  peoples_teams (teams_id_team,events_id_event, peoples_id_people) VALUES (".$id_team.",".$id_event.",".$peopleArray[$i].") ON DUPLICATE KEY UPDATE peoples_id_people= ".$peopleArray[$i]."; "; 
			
			$this->db->query($sql);

						
					
		}
	}
	public function delete_teamPeople($id_team,$id_event,$peopleArray){
	for ( $i = 0, $total = count( $peopleArray ); $i < $total; $i++ )
		{
			$sql = "DELETE FROM peoples_teams WHERE teams_id_team = ".$id_team." AND events_id_event = ".$id_event." AND peoples_id_people ='".$peopleArray[$i]."'	; "; 
			
		
			$this->db->query($sql);

						
					
		}
	}

}