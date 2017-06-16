<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peopleController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('peopleModel');
		$this->load->model('teamModel');
		$this->load->model('loginModel');
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

	public function index()
	{	

		$this->db->select('*');
		$dados['peoples'] = $this->peopleModel->get()->result();
		$retorno = $this->loginModel->logged();
		if($retorno == 1){
				
				$dados['formerror'] = 'Sem permissão de acesso.';
				$this->load->view('loginView',$dados);

			}else{

				$this->template->load('template/templateHeader','people/index',$dados);
		
			}		
		
	}

	public function call_createView(){

		
		$this->db->select('*');
		$dados['estados'] = $this->peopleModel->getEstados();
		$dados['formerror']=NULL;

		$this->template->load('template/templateHeader', 'people/peopleCreateView',$dados);
	}

	public function create()
	{	
		$this->form_validation->set_rules('peopleName','Nome','required|min_length[4]');
		$this->form_validation->set_rules('estado','Estado','required');
		$this->form_validation->set_rules('cidade','Cidade','required');

		
		
		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				

				$this->db->select('*');
				$dados['estados'] = $this->peopleModel->getEstados();
				$this->template->load('template/templateHeader', 'people/peopleCreateView',$dados);
					
		}else{	
				
			 
				
				$people = array(
				'name_people' => $this->input->post('peopleName'),
				'birth' => $this->input->post('peopleBirth'),
				'adress' => $this->input->post('peopleAdress'),
				'cep' => $this->input->post('peopleCep'),
				'phone' => $this->input->post('peoplePhone'),
				'email' => $this->input->post('peopleEmail'),
				'neighborhood' => $this->input->post('peopleNeigh'),
				'id_city' => $this->input->post('cidade'),
				'id_state' => $this->input->post('estado'),
				'id_user' => $this->session->userdata('id_user')
				);

			$this->peopleModel->create($people);
		
			redirect('people');
		
		}
		
	}

	public function delete(){
		$data = array('id_people' => $this->input->post('id_people'));
		if($this->peopleModel->delete($data)){
			echo 'Cadastro Excluido!';

			
		}else { 
			echo 'Ocorreu algum erro. Tente novamente'; 
		}
		
	}

	public function update_form($id){
		 $dados['formerror']=NULL;
		 $dados['teams'] = $this->db->get('teams')->result();
		 $dados['estados'] = $this->peopleModel->getEstados();
		 $dados['peoples']=$this->peopleModel->getOne($id)->result();
		 $this->template->load('template/templateHeader', 'people/peopleUpdateView', $dados);
		
	}


public function update(){
	

  $this->form_validation->set_rules('updatePeopleName','Nome','required|min_length[4]');
		$this->form_validation->set_rules('estado','Estado','required');
		$this->form_validation->set_rules('cidade','Cidade','required');
		//$this->form_validation->set_rules('team','Equipe','required');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
				$id=$this->input->post('updatePeopleId');
				$dados['peoples']=$this->peopleModel->getOne($id)->result();

				//$this->db->select('*');
				//$dados['teams'] = $this->db->get('teams')->result();

				 $this->template->load('template/templateHeader', 'people/peopleUpdateView',$dados);
					
		}else{	
				//$team = $this->input->post('team');
				//$retorno = $this->teamModel->getOne($team)->row();
			 
				
			$people = array(
				'id_people' => $this->input->post('updatePeopleId'),
				'name_people' => $this->input->post('updatePeopleName'),
				'birth' => $this->input->post('updatePeopleBirth'),
				'adress' => $this->input->post('updatePeopleAdress'),
				'cep' => $this->input->post('updatePeopleCep'),
				'phone' => $this->input->post('updatePeoplePhone'),
				'email' => $this->input->post('updatePeopleEmail'),
				'neighborhood' => $this->input->post('updatePeopleNeigh'),
				'id_city' => $this->input->post('cidade'),
				'id_state' => $this->input->post('estado'),
				'id_user' => $this->session->userdata('id_user')
			
				);

			$this->peopleModel->update($people);
		
			redirect('people');
		
		}
	}

}
