<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class entitieController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('entitieModel');
		$this->load->model('loginModel');
	}

	public function index()
	{	
		
		$dados['entities'] = $this->entitieModel->get()->result();
		$retorno = $this->loginModel->logged();
		if($retorno == 1){
				
				$dados['formerror'] = 'Sem permissão de acesso.';
				$this->load->view('loginView',$dados);

			}else{

				$this->template->load('template/templateHeader','homeView',$dados);
		
			}		
		
	}

	public function call_createView(){
		$dados['formerror']= NULL;
		 $this->template->load('template/templateHeader', 'entitie/entitieCreateView',$dados);
	}

	public function create()
	{	
		
		$this->form_validation->set_rules('entitieName','Nome','required|min_length[5]');
		

		if($this->form_validation->run()==FALSE){
			$dados['formerror']= validation_errors();
			$this->template->load('template/templateHeader', 'entitie/entitieCreateView',$dados);
		}else{
				
			  

				$entitie = array(
				'name_entitie' => $this->input->post('entitieName'),
				'responsible' => $this->input->post('entitieResponsible'),
				'phone' => $this->input->post('entitiePhone'),
				'id_user' => $this->session->userdata('id_user')
				);

			$this->entitieModel->create($entitie);
			
			redirect('entitie');
		}
		
	}

	public function delete(){
		$data = array('id_entitie' => $this->input->post('id_entitie'));
		if($this->entitieModel->delete($data)){
			echo 'Cadastro Excluido!';
			
		}else { 
			echo 'Ocorreu algum erro. Tente novamente'; 
		}
		
	}


	public function update_form($id){
		$dados['formerror']=NULL;
		$dados['entities']=$this->entitieModel->getOne($id)->result();
		 $this->template->load('template/templateHeader', 'entitie/entitieUpdateView', $dados);
		
	}

	public function update(){
	

   		$this->form_validation->set_rules('updateEntitieName','Nome','required|min_length[5]');
   		$id = $this->input->post('updateEntitieId');
		if($this->form_validation->run()==FALSE){
				$dados['formerror']=validation_errors();
				$id=$this->input->post('updateEntitieId');
				$dados['entities'] = $this->entitieModel->getOne($id)->result();
			    $this->template->load('template/templateHeader', 'entitie/entitieUpdateView', $dados);

			
		}else{
				
					$entitie = array(
						'id_entitie' => $id,
						'name_entitie' => $this->input->post('updateEntitieName'),
						'responsible' => $this->input->post('updateEntitieResponsible'),
						'phone' => $this->input->post('updateEntitiePhone'),
							
					);

					$this->entitieModel->update($entitie);
					redirect();
		}
	}
}
