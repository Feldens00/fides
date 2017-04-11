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

	public function getAll($schedule){
		
		$this->db->select('*'); 
		$this->db->from('schedule s'); 
		$this->db->join('activities_schedule as', 'as.schedule_id_schedule = s.id_schedule','inner');
		$this->db->join('activities ac', 'ac.id_activitie = as.activities_id_activitie','inner');
		$this->db->order_by("horary", "asc");
		$this->db->where('s.id_schedule', $schedule);
	   return $this->db->get();
		
	}

	public function getSchedule($event){
		
		$this->db->select('*');    
		$this->db->join('events', 'schedule.id_event = events.id_event','inner');
		$this->db->where('schedule.id_event', $event);
		$this->db->limit(1);
	    $schedule = $this->db->get('schedule')->result();
		
		foreach ($schedule as $sc) {
			$id_schedule = $sc->id_schedule;
			$id_event = $sc->id_event;
		}

		$sArray = array(
				'id_schedule' => $id_schedule,
				'id_event' => $id_event
				);


		if (empty($schedule) ) {
			
			$this->db->insert('schedule', $event);
		}else{
			$this->db->where('id_event', $event);
			$this->db->update('schedule', $sArray);
		}

		$this->db->select('*');    
		$this->db->join('events', 'schedule.id_event = events.id_event','inner');
		$this->db->where('schedule.id_event', $event);
		$this->db->limit(1);
	    return $this->db->get('schedule');
	}

	
	 public function listAE($id_event) {

       	$this->db->select('');    
		$this->db->join('schedule', 'events.id_event = schedule.id_event','inner');
		$this->db->join('activities_schedule', 'schedule.id_schedule= activities_schedule.schedule_id_schedule','inner');
		$this->db->join('activities', 'activities_schedule.activities_id_activitie = activities.id_activitie','inner');
		$this->db->where('events.id_event', $id_event);
	   	return $this->db->get('events');
    }

    public function create_actvitie($activitie){
	return $this->db->insert('activities', $activitie);
	}

	public function create_scheduleActivitie($id_schedule,$activitieArray){
	for ( $i = 0, $total = count( $activitieArray ); $i < $total; $i++ )
		{
			$sql = "INSERT INTO  activities_schedule (schedule_id_schedule, activities_id_activitie ) VALUES (".$id_schedule.",'".$activitieArray[$i]."') ON DUPLICATE KEY UPDATE activities_id_activitie= ".$activitieArray[$i]."; "; 
			
			$this->db->query($sql);

						
					
		}
	}

	public function delete_scheduleActivitie($id_schedule,$activitieArray){
	for ( $i = 0, $total = count( $activitieArray ); $i < $total; $i++  )
		{
			$sql = "DELETE FROM activities_schedule WHERE schedule_id_schedule = ".$id_schedule." AND activities_id_activitie ='".$activitieArray[$i]."'	; "; 
			
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