<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		$this->load->library('facebook');
		
		//Load user model
		$this->load->model('loginModel');
    }
    
     public function index(){
            $userData = array();
        
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            
            // Insert or update user data
            $userID = $this->loginModel->checkUser($userData);
            
            // Check user data insert or update status
            if(!empty($userID)){
                $retorno = $this->loginModel->getFace($userData);

                 foreach ($retorno as $us) {
                                    $id = $us->id_user;
                                    $name = $us->first_name;
                                    $email = $us->email;
                                    $nivel = $us->nivel;
                            }

                $user2 = array( 
                                'id_user' => $id,
                                'name' => $name,
                                'email' => $email,
                                'nivel' => $nivel,
                                'logged'=> true, 
                                'active' => 1
                            );
                            
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
                 $this->session->set_userdata($user2);
            } else {
               $data['userData'] = array();
            }
            
           		redirect('entitie');
        }else{
            $fbuser = '';
            
            // Get login URL
            $authUrl =  $this->facebook->login_url();
            redirect($authUrl);

        }

        
    }

}
