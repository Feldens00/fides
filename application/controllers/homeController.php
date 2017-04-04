<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeController extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('entitieModel');
		$this->load->model('eventModel');
		
	}
	public function index()
	{	
		$this->db->select('*');
		$dados['entities'] = $this->db->get('entities')->result();

		$this->db->select('*');
		$dados['events'] = $this->db->get('events')->result();

		
		$this->template->load('template/templateHeader','homeView',$dados);
		
	}
}
