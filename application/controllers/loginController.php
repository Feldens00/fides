<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class loginController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('loginModel');
        $this->load->library('form_validation');

        // Load facebook library
        $this->load->library('facebook');
        
    }

    public function index()
    {   
        $dados['formerror']=NULL;
        $this->load->view('loginView',$dados);
    }

    public function login(){
            $this->form_validation->set_rules('email','E-mail','required');
            $this->form_validation->set_rules('password','Senha','required');

            if($this->form_validation->run()==FALSE){

                $dados['formerror']= validation_errors();
                $this->load->view('loginView',$dados);

            }
            else{
                    $user = array( 
                        'email' => $this->input->post('email'),
                        'password' => sha1($this->input->post('password')),
                        'logged'=> true, 
                        'active' => 1
                    );
                   //active serve para verificar se o usuario é ativo, caso queira desativalo n precisa excluir é so mudar o valor

                    $retorno = $this->loginModel->validate($user);

                       if(empty($retorno)){
                            $dados['formerror'] = "Login Incorreto";
                            $this->load->view('loginView',$dados);
                       }
                       else{

                            foreach ($retorno as $us) {
                                    $id = $us->id_user;
                                    $email = $us->email;
                                    $nivel = $us->nivel;
                            }

                            $user2 = array( 
                                'id_user' => $id,
                                'email' => $email,
                                'nivel' => $nivel,
                                'logged'=> true, 
                                'active' => 1
                            );
                            
                           $this->session->set_userdata($user2);
                           redirect('entitie');
                       }
                }
    }

    

    /*
     * Aqui eu destruo a variável logado na sessão e redireciono para a url base. Como esta variável não existe mais, o usuário
     * será direcionado novamente para a tela de login.
     */
    public function logout(){

            // Remove local Facebook session
            $this->facebook->destroy_session();
            // Remove user data from session
            $this->session->unset_userdata('userData');
            session_start(); // Inicia a sessão
            session_destroy(); // Destrói a sessão limpando todos os valores salvos
            redirect('');
    }

    public function Create_user(){

        $this->input->post('nameUser');
        $this->input->post('emailUser');
        $this->input->post('passwordUser');

        $this->form_validation->set_rules('nameUser','Nome','required|min_length[5]');
        $this->form_validation->set_rules('emailUser','Email','required');
        $this->form_validation->set_rules('passwordUser','Senha','required|min_length[5]');

        if($this->form_validation->run()==FALSE){
            $dados['formerror']= validation_errors();
         
             $this->load->view('loginView',$dados);
        }else{

            $user = array(
                'name_user' => $this->input->post('nameUser'),
                'email' => $this->input->post('emailUser'),
                'password' => $this->input->post('passwordUser'),
                'nivel' => 1,
                'active' => 1,
                'day_register' => date('Y-m-d H:i:s')
        
                );

            $this->loginModel->create($user);
            redirect('entitie');
        }

    }

   
}