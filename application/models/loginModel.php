<?php
class loginModel extends CI_Model {

    # VALIDA USUÁRIO
    function validate($user) {

        $this->db->where('email', $user['email'] ); 
        $this->db->where('password', $user['password']);
        $this->db->where('active', $user['active']); 

         return $this->db->get('users')->result(); 

        if ($query->num_rows == 1) { 
            return true; // RETORNA VERDADEIRO
        }
    }


    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            $this->session->sess_destroy();
            setcookie('cookie');
            return 1; 
        }
    }
}