<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class activitieController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('eventModel');
		$this->load->model('activitieModel');
	}

	public function index()
	{	
		$dados['formerror']= NULL;
		
		$dados['activities'] = $this->activitieModel->get()->result();
		
		$this->template->load('template/templateHeader', 'activitie/index',$dados);
	}

	public function create_activitie(){

				
					$activitie = array(
				
					'name_activitie' => $this->input->post('activitieName'),
					'description' => $this->input->post('activitieDescription'),
					
			
					);

					$this->activitieModel->create_actvitie($activitie);
				
					redirect('activitie');
						 
	}	
	
	//cronogramas e atividades

	public function call_scheduleCreateView($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		$dados['acEvents'] = $this->activitieModel->listAE($id_event)->result();

		$dados['activities'] = $this->activitieModel->get()->result();


		$this->template->load('template/templateHeader', 'activitie/scheduleCreateView',$dados);
	}

	public function create_scheduleActivitie($id_event){

		$this->form_validation->set_rules('activitieId','Atividade','required');
		$this->form_validation->set_rules('activitieHorary','Hora','required');

		$horary = $this->input->post('activitieHorary');
		$horary = $horary.':00';

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
		
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['acEvents'] = $this->activitieModel->listAE($id_event)->result();

				$dados['activities'] = $this->activitieModel->get()->result();

				$this->template->load('template/templateHeader', 'activitie/scheduleCreateView',$dados);
			
		}else{	

			$schedule = array(
				
					'activities_id_activitie' => $this->input->post('activitieId'),
					'events_id_event' => $id_event,
					'horary' => $horary
			
					);

			
			$this->activitieModel->create_scheduleActivitie($schedule);
		
			redirect('form-event-schedule/'.$id_event);
		
		}

		 
	}	
	
	

	public function delete_scheduleActivitie($id_event){
			$this->form_validation->set_rules('selecao[]', 'Atividades', 'required');
			$activitieArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= ' Selecione uma atividade para remover do cronograma';
				
				
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['acEvents'] = $this->activitieModel->listAE($id_event)->result();

				
				$dados['activities'] = $this->activitieModel->get()->result();

				$this->template->load('template/templateHeader', 'activitie/scheduleCreateView',$dados);
			
		}else{	
				
				

			$this->activitieModel->delete_scheduleActivitie($id_event,$activitieArray);
		
			redirect('form-event-schedule/'.$id_event);
		
		}
		
	}


	public function delete(){
			$data = array('id_activitie' => $this->input->post('id_activitie'));
			if($this->activitieModel->delete($data)){
				echo 'Cadastro Excluido!';

				
			}else { 
				echo 'Ocorreu algum erro. Tente novamente'; 
			}
			
	}


	public function update_form($schedule){
		$dados['formerror']=NULL;
		$dados['activities']=$this->activitieModel->getOne($schedule)->result();
		$this->template->load('template/templateHeader', 'activitie/activitieUpdateView', $dados);
		
	}

	
	public function update(){
	

   		$this->form_validation->set_rules('updateActivitieName','Nome','required');
   		


		if($this->form_validation->run()==FALSE){
				$dados['formerror']=validation_errors();
			 	$id=$this->input->post('updateActivitieId');
				$dados['activities']=$this->activitieModel->getOne($id)->result();
		$this->template->load('template/templateHeader', 'activitie/activitieUpdateView', $dados);

			
		}else{
				
					
					$activitie = array(
					'id_activitie'  =>$this->input->post('updateActivitieId'),
					'name_activitie' => $this->input->post('updateActivitieName'),
					'description' => $this->input->post('updateActivitieDescription'),
			
					);

					$this->activitieModel->update($activitie);
				
					redirect('activitie');
		}
	}

	public function print_schedule($id_event){
	$return = $this->eventModel->getOne($id_event)->result();
	$dados['all']=$this->activitieModel->getAll($id_event)->result();
	foreach ($return as $ev) {
		$name_event = $ev->name_event;
	}


	// Instancia a classe mPDF
	$mpdf = new mPDF();
	// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
	// HTML dela para a variável $html
	$html = $this->load->view('event/printView',$dados,true);
	// Define um Cabeçalho para o arquivo PDF
	$mpdf->SetHeader('Cronograma do Evento '.$name_event);
	// Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
	// página através da pseudo-variável PAGENO
	$mpdf->SetFooter('{PAGENO}');
	// Insere o conteúdo da variável $html no arquivo PDF
	$mpdf->writeHTML($html);
	// Cria uma nova página no arquivo
	//$mpdf->AddPage();
	// Insere o conteúdo na nova página do arquivo PDF
	//$mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
	// Gera o arquivo PDF
	$mpdf->Output();

	}


}	
