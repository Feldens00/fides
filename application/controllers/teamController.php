<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teamController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('eventModel');
		$this->load->model('teamModel');
		$this->load->model('peopleModel');
		$this->load->model('loginModel');
	}

	public function index()
	{	

		$this->db->select('*');
		$dados['teams'] = $this->teamModel->get()->result();
		$retorno = $this->loginModel->logged();
		if($retorno == 1){
				
				$dados['formerror'] = 'Sem permissão de acesso.';
				$this->load->view('loginView',$dados);

			}else{

				$this->template->load('template/templateHeader','team/index',$dados);
		
			}		
	
	}

	public function call_createView(){

		
		$this->db->select('*');
		$dados['events'] = $this->db->get('events')->result();
		$dados['formerror']=NULL;

		$this->template->load('template/templateHeader', 'team/teamCreateView',$dados);
	}

	public function create()
	{	
		$this->form_validation->set_rules('teamName','Nome','required|min_length[4]');
		

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();

				 $this->template->load('template/templateHeader', 'team/teamCreateView',$dados);
					
		}else{	
				$event = $this->input->post('teamEvent');
				$retorno = $this->eventModel->getOne($event)->row();
			 
				
				$team = array(
				'name_team' => $this->input->post('teamName'),
				'description' => $this->input->post('teamDescription'),
				'id_user' => $this->session->userdata('id_user')
				);

			$this->teamModel->create($team);
		
			redirect('team');
		
		}
		
	}



	public function call_teamPeopleCreateView($id_team){

		$dados['formerror']= NULL;
		
		$dados['teams'] = $this->teamModel->getOne($id_team)->result();

		$dados['peoples'] = $this->peopleModel->getNotTm($id_team);

		 $this->template->load('template/templateHeader', 'team/teamPeopleCreateView',$dados);
	}

	public function create_teamPeople($id_team){
		$this->form_validation->set_rules('selecao[]', 'Pessoas', 'required');
		$peopleArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				$dados['teams'] = $this->teamModel->getOne($id_team)->result();

			
				$dados['peoples'] = $this->peopleModel->getNotTm($id_team);

				 $this->template->load('template/templateHeader', 'team/teamPeopleCreateView',$dados);
			
		}else{	
				
			

			$this->teamModel->create_teamPeople($id_team ,$peopleArray);

		
			redirect('team');
		
		}

		 
	}

		public function call_teamPeople($id_team){

		$dados['formerror']= NULL;
		
		$dados['teams'] = $this->teamModel->getOne($id_team)->result();

		$dados['events'] = $this->eventModel->listTE($id_team)->result();

		$dados['peoples'] = $this->peopleModel->listTP($id_team);

		 $this->template->load('template/templateHeader', 'team/teamPeopleView',$dados);
	}

	public function delete(){
		$data = array('id_team' => $this->input->post('id_team'));
		if($this->teamModel->delete($data)){
			echo 'Cadastro Excluido!';

			
		}else { 
			echo 'Ocorreu algum erro. Tente novamente'; 
		}
		
	}

	public function delete_teamPeople($id_team){

		$this->form_validation->set_rules('selecao[]', 'Pessoas', 'required');
		$peopleArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				$dados['teams'] = $this->teamModel->getOne($id_team)->result();

				$dados['peoples'] = $this->peopleModel->listTP($id_team);

				 $this->template->load('template/templateHeader', 'team/teamPeopleCreateView',$dados);
			
		}else{	
				
				

			$this->teamModel->delete_teamPeople($id_team,$peopleArray);
		
			redirect('team-people/'.$id_team);
		
		}

		 
	}

	public function update_form($id){
		 $dados['formerror']=NULL;
		 $dados['teams']=$this->teamModel->getOne($id)->result();
		 $this->template->load('template/templateHeader', 'team/teamUpdateView', $dados);
		
	}

	public function update(){
	

    $this->form_validation->set_rules('updateTeamName','Nome','required|min_length[5]');
   // $this->form_validation->set_rules('updateTeamEvent','Evento','required');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				$id=$this->input->post('updateTeamId');
				$dados['teams']=$this->teamModel->getOne($id)->result();


				 $this->template->load('template/templateHeader', 'team/teamUpdateView',$dados);
					
		}else{	
				
				$team = array(
				'id_team' => $this->input->post('updateTeamId'),	
				'name_team' => $this->input->post('updateTeamName'),
				'description' => $this->input->post('updateTeamDescription'),
				'id_user' => $this->session->userdata('id_user')
				);

			$this->teamModel->update($team);
		
			redirect('team');
		
		}
	}


}
