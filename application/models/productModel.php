<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class productModel extends CI_Model
{

	public function getOne($product){
		
		$this->db->select('*');    
		$this->db->where('id_product', $product);
		$this->db->limit(1);
	   return $this->db->get('products');
		
	}

	public function get(){
		
		$this->db->select('*');
		$this->db->order_by("name_product", "asc");    
	  	return $this->db->get('products');
		
	}

	public function getAll($id_event){
		
		$this->db->select('*'); 
		$this->db->from('events ev'); 
		$this->db->join('list_products lp', 'ev.id_event = lp.events_id_event','inner');
		$this->db->join('products p', 'p.id_product = lp.products_id_product','inner');
		$this->db->order_by("name_product", "asc");
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

	
	 public function listPE($id_event) {

       	$this->db->select('');    
		$this->db->join('products', 'list_products.products_id_product= products.id_product','inner');
		$this->db->join('events', 'list_products.events_id_event = events.id_event','inner');
		$this->db->where('events.id_event', $id_event);
	   	return $this->db->get('list_products');
    }

    public function create_product($product){
	return $this->db->insert('products', $product);
	}

	public function create_listProduct($product){


		$where = "events_id_event=".$product['events_id_event']." AND products_id_product = ".$product['products_id_product']." ";

		$this->db->select('*');   
		$this->db->from('list_products');  
		$this->db->where($where);
		$this->db->limit(1);
	   	$retorno = $this->db->get()->result();
		
		if (empty($retorno)){
			return $this->db->insert('list_products', $product);
			
		}else{
			
			foreach ($retorno as $r) {
			$id_event = $r->events_id_event;
			$id_product = $r->products_id_product;
			$amount = $r->amount;
			$unitary = $r->unitary_value;
			$quantity = $r->quantity;
			}

			if (($product['events_id_event'] == $id_event) AND ($product['products_id_product'] == $id_product)) {

					if (($product['unitary_value'] != $unitary) OR ($product['quantity'] != $quantity)){
						

						$this->db->where($where);
						return $this->db->update('list_products', $product);
					}

			}
		}
	}

	public function delete_listProduct($id_event,$productArray){
	for ( $i = 0, $total = count( $productArray ); $i < $total; $i++  )
		{
			$sql = "DELETE FROM list_products WHERE events_id_event = ".$id_event." AND products_id_product ='".$productArray[$i]."'	; "; 
			
			$this->db->query($sql);

						
					
		}
	}

	public function delete($product){
		return $this->db->delete('products', $product);
	}

	public function update($product){
		$this->db->where('id_product', $product['id_product']);
		return $this->db->update('products', $product);
	}
}