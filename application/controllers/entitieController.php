<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class entitieController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('entitieModel');
	}

	public function index()
	{	
		$this->template->load('template/templateHeader','entitieView');
		
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
				'phone' => $this->input->post('entitiePhone')

				);

			$this->entitieModel->create($entitie);
			
			redirect('');
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

		if($this->form_validation->run()==FALSE){
				$dados['formerror']=validation_errors();
				$id=$this->input->post('updateEntitieId');
				$dados['entities'] = $this->db->getOne($id)->result();
			    $this->template->load('template/templateHeader', 'homeView', $dados);

			
		}else{
				
					$entitie = array(
						'id_entitie' => $this->input->post('updateEntitieId'),
						'name_entitie' => $this->input->post('updateEntitieName'),
						'phone' => $this->input->post('updateEntitiePhone'),
							
						);

					$this->entitieModel->update($entitie);
					redirect();
		}
	}
}