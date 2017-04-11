<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class activitieController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('eventModel');
		$this->load->model('peopleModel');
		$this->load->model('entitieModel');
		$this->load->model('teamModel');
		$this->load->model('activitieModel');
	}

	public function index()
	{	

		
		
	}

	
	//cronogramas e atividades

	public function call_eventScheduleCreateView($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		$dados['acEvents'] = $this->activitieModel->listAE($id_event)->result();

		$this->db->select('*');
		$dados['activities'] = $this->db->get('activities')->result();

		$dados['schedule']= $this->activitieModel->getSchedule($id_event)->result();



		$this->template->load('template/templateHeader', 'event/eventScheduleCreateView',$dados);
	}

	public function create_scheduleActivitie($id_schedule,$id_event){

		$this->form_validation->set_rules('selecao[]', 'Atividades', 'required');
		$activitieArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= ' Selecione uma atividade na area "Atividades em nosso banco de dados" para adicionar ao cronograma';
		
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['acEvents'] = $this->activitieModel->listAE($id_event)->result();

				$this->db->select('*');
				$dados['activities'] = $this->db->get('activities')->result();

				$dados['schedule']= $this->activitieModel->getSchedule($id_event)->result();



				$this->template->load('template/templateHeader', 'event/eventScheduleCreateView',$dados);
			
		}else{	
				
				

			$this->activitieModel->create_scheduleActivitie($id_schedule,$activitieArray);
		
			redirect('form-event-schedule/'.$id_event);
		
		}

		 
	}	
	
	public function create_activitie($id_event){

				
					$activitie = array(
				
					'name_activitie' => $this->input->post('activitieName'),
					'description' => $this->input->post('activitieDescription'),
					'horary' => $this->input->post('activitieHorary')
			
					);

					$this->activitieModel->create_actvitie($activitie);
				
					redirect('form-event-schedule/'.$id_event);
						 
	}	

	public function delete_scheduleActivitie($id_schedule,$id_event){
			$this->form_validation->set_rules('selecao[]', 'Atividades', 'required');
			$activitieArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= ' Selecione uma atividade na area "Atividades do Cronograma do Evento ..." para remover do cronograma';
				
				
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['acEvents'] = $this->activitieModel->listAE($id_event)->result();

				$this->db->select('*');
				$dados['activities'] = $this->db->get('activities')->result();

				$dados['schedule']= $this->activitieModel->getSchedule($id_event)->result();



				$this->template->load('template/templateHeader', 'event/eventScheduleCreateView',$dados);
			
		}else{	
				
				

			$this->activitieModel->delete_scheduleActivitie($id_schedule,$activitieArray);
		
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
		$this->template->load('template/templateHeader', 'event/activitieUpdateView', $dados);
		
	}

	public function printView($schedule,$event){
	$dados['events']=$this->eventModel->getOne($event)->result();
	$dados['all']=$this->activitieModel->getAll($schedule)->result();
	$this->load->view('event/printView',$dados);


	// Instancia a classe mPDF
	$mpdf = new mPDF();
	// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
	// HTML dela para a variável $html
	$html = $this->load->view('event/printView',$dados,true);
	// Define um Cabeçalho para o arquivo PDF
	$mpdf->SetHeader('Cronograma');
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

	public function update(){
	

   		$this->form_validation->set_rules('updateActivitieName','Nome','required');
   		$this->form_validation->set_rules('updateActivitieHorary','Hora','required');


		if($this->form_validation->run()==FALSE){
				$dados['formerror']=validation_errors();
			 	$id=$this->input->post('updateActivitieId');
				$dados['activities']=$this->activitieModel->getOne($id)->result();
		$this->template->load('template/templateHeader', 'event/activitieUpdateView', $dados);

			
		}else{
				
					
					$activitie = array(
					'id_activitie'  =>$this->input->post('updateActivitieId'),
					'name_activitie' => $this->input->post('updateActivitieName'),
					'description' => $this->input->post('updateActivitieDescription'),
					'horary' => $this->input->post('updateActivitieHorary')
			
					);

					$this->activitieModel->update($activitie);
				
					redirect('event');
		}
	}

}	
