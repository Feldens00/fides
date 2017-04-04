<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eventController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('eventModel');
		$this->load->model('peopleModel');
		$this->load->model('entitieModel');
		$this->load->model('teamModel');
	}

	public function index()
	{	

		$this->db->select('*');
		$dados['events'] = $this->db->get('events')->result();

		
		$this->template->load('template/templateHeader','event/index',$dados);
		
	}

	public function call_createView(){

		$dados['formerror']= NULL;
		$dados['estados'] = $this->eventModel->getEstados();

		$this->db->select('*');
		$dados['entities'] = $this->db->get('entities')->result();

		 $this->template->load('template/templateHeader', 'event/eventCreateView',$dados);
	}

	
	public function create()
	{	
		$this->form_validation->set_rules('eventName','Nome','required|min_length[5]');
		$this->form_validation->set_rules('estado','Estado','required');
		$this->form_validation->set_rules('cidade','Cidade','required');
		$this->form_validation->set_rules('entitie','Entidade','required');
		
	

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				$dados['estados'] = $this->eventModel->getEstados();

				$this->db->select('*');
				$dados['entities'] = $this->db->get('entities')->result();

				 $this->template->load('template/templateHeader', 'event/eventCreateView',$dados);
			
		}else{	
				
				$event = array(
				'name_event' => $this->input->post('eventName'),
				'start_date' => $this->input->post('eventStartDate'),
				'end_date' => $this->input->post('eventEndDate'),
				'adress' => $this->input->post('eventAdress'),
				'cep' => $this->input->post('eventCep'),
				'phone' => $this->input->post('eventPhone'),
				'neighborhood' => $this->input->post('eventNeigh'),
				'id_city' => $this->input->post('cidade'),
				'id_state' => $this->input->post('estado'),
				'id_entitie' => $this->input->post('entitie'),
				
		
				);

			$this->eventModel->create($event);
		
			redirect('event');
		
		}
		
	}


	public function delete(){
			$data = array('id_event' => $this->input->post('id_event'));
			if($this->eventModel->delete($data)){
				echo 'Cadastro Excluido!';

				
			}else { 
				echo 'Ocorreu algum erro. Tente novamente'; 
			}
			
		}

	public function update_form($id){
		$dados['formerror']=NULL;
		$dados['estados'] = $this->eventModel->getEstados();
		$dados['events']=$this->eventModel->getOne($id)->result();
		$this->template->load('template/templateHeader', 'event/eventUpdateView', $dados);
		
	}

	public function update(){
	

   		$this->form_validation->set_rules('updateEventName','Nome','required|min_length[5]');

		if($this->form_validation->run()==FALSE){
				$dados['formerror']=validation_errors();
			 	$id=$this->input->post('updateEventId');
				$dados['events'] = $this->db->getOne($id)->result();
			    $this->template->load('template/templateHeader', 'event/eventUpdateView', $dados);

			
		}else{
				
					$event = array(
				'id_event' => $this->input->post('updateEventId'),
				'name_event' => $this->input->post('updateEventName'),
				'start_date' => $this->input->post('updateEventStartDate'),
				'end_date' => $this->input->post('updateEventEndDate'),
				'adress' => $this->input->post('updateEventAdress'),
				'cep' => $this->input->post('updateEventCep'),
				'phone' => $this->input->post('updateEventPhone'),
				'neighborhood' => $this->input->post('updateEventNeigh'),
				'id_city' => $this->input->post('cidade'),
				'id_state' => $this->input->post('estado'),
				'id_entitie' => $this->input->post('entitie'),
				
		
				);

					$this->eventModel->update($event);
					redirect('event');
		}
	}
	public function getCidades($id) {
		
		
		
		$cidades = $this->eventModel->getCidades($id);
		
		if( empty ( $cidades ) ) 
			return '{ "nome": "Nenhuma cidade encontrada" }';
			
		$arr_cidade = array();

		foreach ($cidades as $cidade) {
			
			$arr_cidade[] = '{"id":' . $cidade->id_city . ',"nome":"' . $cidade->name_city . '"}';
				
		}
		
		echo '[ ' . implode(",",$arr_cidade) . ']';
		
		return;
		
	}


	//Pessoas do evento 

	public function call_eventPeopleCreateView($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		$this->db->select('*');
		$dados['peoples'] = $this->peopleModel->getNotEv($id_event);

		 $this->template->load('template/templateHeader', 'event/eventPeopleCreateView',$dados);
	}

	public function create_eventPeople($id_event){

		$this->form_validation->set_rules('selecao[]', 'Pessoas', 'required');
		$peopleArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();

				$dados['events'] = $this->eventModel->getOne($id_event)->result();
				
				$dados['peoples'] = $this->peopleModel->listEP($id_event);

				 $this->template->load('template/templateHeader', 'event/eventPeopleCreateView',$dados);
			
		}else{	
				
				

			$this->eventModel->create_eventPeople($id_event,$peopleArray);
		
			redirect('event');
		
		}

		 
	}


	public function call_eventPeople($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		
		$dados['peoples'] = $this->peopleModel->listEP($id_event);

		 $this->template->load('template/templateHeader', 'event/eventPeopleView',$dados);
	}
	

	


	public function delete_eventPeople($id_event){
			$this->form_validation->set_rules('selecao[]', 'Pessoas', 'required');
		$peopleArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['peoples'] = $this->peopleModel->listEP($id_event);

				 $this->template->load('template/templateHeader', 'event/eventPeopleView',$dados);
			
		}else{	
				
				

			$this->eventModel->delete_eventPeople($id_event,$peopleArray);
		
			redirect('event-people/'.$id_event);
		
		}
		
	}


	// Equipes do evento 
	
	public function call_eventTeamCreateView($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		$this->db->select('*');
		$dados['teams'] = $this->teamModel->getNotEv($id_event);

		 $this->template->load('template/templateHeader', 'event/eventTeamCreateView',$dados);
	}

	public function create_eventTeam($id_event){

		$this->form_validation->set_rules('selecao[]', 'Equipes', 'required');
		$teamArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();

				$dados['events'] = $this->eventModel->getOne($id_event)->result();
				$this->db->select('*');
				$dados['teams'] = $this->teamModel->getNotEv($id_event);

				 $this->template->load('template/templateHeader', 'event/eventTeamCreateView',$dados);
			
		}else{	
				
				

			$this->eventModel->create_eventTeam($id_event,$teamArray);
		
			redirect('event');
		
		}

		 
	}	


	public function call_eventTeam($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		
		$dados['teams'] = $this->teamModel->listET($id_event);

		 $this->template->load('template/templateHeader', 'event/eventTeamView',$dados);
	}
	

	


	public function delete_eventTeam($id_event){
			$this->form_validation->set_rules('selecao[]', 'Equipes', 'required');
		$teamArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['teams'] = $this->teamModel->listET($id_event);

				 $this->template->load('template/templateHeader', 'event/eventTeamView',$dados);
			
		}else{	
				
				

			$this->eventModel->delete_eventTeam($id_event,$teamArray);
		
			redirect('event-team/'.$id_event);
		
		}
		
	}

	//cronograma 

	public function call_eventScheduleCreateView($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		$this->db->select('*');
		$dados['activities'] = $this->db->get('activities')->result();

		$dados['schedule']= $this->eventModel->getSchedule($id_event)->result();



		$this->template->load('template/templateHeader', 'event/eventScheduleCreateView',$dados);
	}
	
}
