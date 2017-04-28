<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class activitieModel extends CI_Model
{

	public function getOne($activitie){
		
		$this->db->select('*');    
		$this->db->where('id_activitie', $activitie);
		$this->db->limit(1);
	   return $this->db->get('activities');
		
	}

	public function get(){
		
		$this->db->select('*');
		$this->db->order_by("name_activitie", "asc");    
	  	return $this->db->get('activities');
		
	}

	public function getAll($id_event){
		
		$this->db->select('*'); 
		$this->db->from('events ev'); 
		$this->db->join('schedule s', 'ev.id_event = s.events_id_event','inner');
		$this->db->join('activities ac', 'ac.id_activitie = s.activities_id_activitie','inner');
		$this->db->order_by("horary", "asc");
		$this->db->where('ev.id_event', $id_event);
	   return $this->db->get();
		
	}

	public function getSchedule($event){
	
		$this->db->select('*');    
		$this->db->join('events', 'schedule.id_event = events.id_event','inner');
		$this->db->where('schedule.id_event', $event);
		$this->db->limit(1);
	    $schedule = $this->db->get('schedule')->result();
		

		if (empty($schedule) ) {
			$sArray = array(
				
				'id_event' => $event
				);

			$this->db->insert('schedule',$sArray);
		}else{


		foreach ($schedule as $sc) {
			$id_schedule = $sc->id_schedule;
			$id_event = $sc->id_event;
		}

		$sArray = array(
				'id_schedule' => $id_schedule,
				'id_event' => $id_event
				);

			$this->db->where('id_event', $event);
			$this->db->update('schedule', $sArray);
		}

		$this->db->select('*');    
		$this->db->join('events', 'schedule.id_event = events.id_event','inner');
		$this->db->where('schedule.id_event',$event);
		$this->db->limit(1);
	    return $this->db->get('schedule');
	}

	
	 public function listAE($id_event) {

       	$this->db->select('');    
		$this->db->join('schedule', 'activities.id_activitie= schedule.activities_id_activitie','inner');
		$this->db->join('events', 'schedule.events_id_event = events.id_event','inner');
		$this->db->where('events.id_event', $id_event);
	   	return $this->db->get('activities');
    }

    public function create_actvitie($activitie){
	return $this->db->insert('activities', $activitie);
	}

	public function create_scheduleActivitie($schedule){


		$where = "events_id_event=".$schedule['events_id_event']." AND activities_id_activitie = ".$schedule['activities_id_activitie']." ";

		$this->db->select('*');   
		$this->db->from('schedule');  
		$this->db->where($where);
		$this->db->limit(1);
	   	$retorno = $this->db->get()->result();
		
		if (empty($retorno)){
			return $this->db->insert('schedule', $schedule);
			
		}else{
			
			foreach ($retorno as $r) {
			$id_event = $r->events_id_event;
			$id_activitie = $r->activities_id_activitie;
			$horary = $r->horary;
			}

			if (($schedule['events_id_event'] == $id_event) AND ($schedule['activities_id_activitie'] == $id_activitie) AND
			 ($schedule['horary'] != $horary)) {


				$this->db->where($where);
				return $this->db->update('schedule', $schedule);
			}
		}
	}

	public function delete_scheduleActivitie($id_event,$activitieArray){
	for ( $i = 0, $total = count( $activitieArray ); $i < $total; $i++  )
		{
			$sql = "DELETE FROM schedule WHERE events_id_event = ".$id_event." AND activities_id_activitie ='".$activitieArray[$i]."'	; "; 
			
			$this->db->query($sql);

						
					
		}
	}

	public function delete($activitie){
		return $this->db->delete('activities', $activitie);
	}

	public function update($activitie){
		$this->db->where('id_activitie', $activitie['id_activitie']);
		return $this->db->update('activities', $activitie);
	}
}