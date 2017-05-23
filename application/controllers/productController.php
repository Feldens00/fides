<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('productModel');
		$this->load->model('eventModel');
	}

	public function index(){
		$dados['formerror']= NULL;
		
		$dados['products'] = $this->productModel->get()->result();
		
		$this->template->load('template/templateHeader', 'product/index',$dados);
	}

	public function create_product(){

				
					$product = array(
				
					'name_product' => $this->input->post('productName'),
					'type' => $this->input->post('productType'),
					
			
					);

					$this->productModel->create_product($product);
				
					redirect('product');
						 
	}	


	public function call_listCreateView($id_event){

		$dados['formerror']= NULL;
		
		$dados['events'] = $this->eventModel->getOne($id_event)->result();

		$dados['productEvent'] = $this->productModel->listPE($id_event)->result();

		$dados['products'] = $this->productModel->get()->result();


		$this->template->load('template/templateHeader', 'product/list_productCreateView',$dados);
	}

	public function create_listProduct($id_event){

		$this->form_validation->set_rules('productId','Produto','required');
		$this->form_validation->set_rules('productQuantity','Quantidade','required');
		$this->form_validation->set_rules('productUnitary','Valor Unitario','required');
		$this->form_validation->set_rules('productDate','Data de compra','required');
		$this->form_validation->set_rules('productProvider','Fornecedor','required');

		$qtd = $this->input->post('productQuantity');
		$unit = $this->input->post('productUnitary');
		$amount = $qtd * $unit;

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= validation_errors();
		
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['productEvent'] = $this->productModel->listPE($id_event)->result();

				$dados['products'] = $this->productModel->get()->result();


				$this->template->load('template/templateHeader', 'product/list_productCreateView',$dados);
			
		}else{
			$product = array(
				
					'events_id_event' => $id_event,
					'products_id_product' => $this->input->post('productId'),
					'purchase_date' => $this->input->post('productDate'),
					'provider' => $this->input->post('productProvider'),
					'amount' => $amount,
					'unitary_value' => $unit,
					'quantity' => $qtd
			
					);

			
			$this->productModel->create_listProduct($product);
		
			redirect('form-list-product/'.$id_event);
		
		}

		 
	}	


	public function delete_listProduct($id_event){
			$this->form_validation->set_rules('selecao[]', 'Produtos', 'required');
			$productArray = $this->input->post('selecao');

		if($this->form_validation->run()==FALSE){

				$dados['formerror']= ' Selecione uma atividade para remover do cronograma';
				
				
				$dados['events'] = $this->eventModel->getOne($id_event)->result();

				$dados['productEvent'] = $this->productModel->listPE($id_event)->result();

				$dados['products'] = $this->productModel->get()->result();


				$this->template->load('template/templateHeader', 'product/list_productCreateView',$dados);
			
			
		}else{	
				
				

			$this->productModel->delete_listProduct($id_event,$productArray);
		
			redirect('form-list-product/'.$id_event);
		
		}
		
	}
	public function delete(){
			$data = array('id_product' => $this->input->post('id_product'));
			if($this->productModel->delete($data)){
				echo 'Cadastro Excluido!';

				
			}else { 
				echo 'Ocorreu algum erro. Tente novamente'; 
			}
			
	}


	public function update_form($product){
		$dados['formerror']=NULL;
		$dados['products']=$this->productModel->getOne($product)->result();
		$this->template->load('template/templateHeader', 'product/productUpdateView', $dados);
		
	}

	
	public function update(){
	

   		$this->form_validation->set_rules('updateProductName','Nome','required');
   		$this->form_validation->set_rules('updateProductType','Tipo','required');
   		


		if($this->form_validation->run()==FALSE){
				$dados['formerror']=validation_errors();
			 	$id=$this->input->post('updateProductId');
				$dados['products']=$this->productModel->getOne($id)->result();
		$this->template->load('template/templateHeader', 'product/productUpdateView', $dados);

			
		}else{
				
					
					$product = array(
					'id_product'  =>$this->input->post('updateProductId'),
					'name_product' => $this->input->post('updateProductName'),
					'type' => $this->input->post('updateProductType'),
			
					);

					$this->productModel->update($product);
				
					redirect('product');
		}
	}


	public function print_list($id_event){
	$return = $this->eventModel->getOne($id_event)->result();
	$dados['maxProduct']=$this->productModel->getMax($id_event)->result();
	$dados['all']=$this->productModel->getAll($id_event)->result();
	foreach ($return as $ev) {
		$name_event = $ev->name_event;
	}


	// Instancia a classe mPDF
	$mpdf = new mPDF();
	// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
	// HTML dela para a variável $html
	$html = $this->load->view('event/print_list',$dados,true);
	// Define um Cabeçalho para o arquivo PDF
	$mpdf->SetHeader('Lista de Produtos do Evento '.$name_event);
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