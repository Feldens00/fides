<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class loginController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('loginModel');
        $this->load->library('form_validation');
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
            session_start(); // Inicia a sessão
            session_destroy(); // Destrói a sessão limpando todos os valores salvos
            redirect('');
    }
}