<?php
class loginModel extends CI_Model {

   function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id_user';
    }

    public function create($user){
    return $this->db->insert($this->tableName, $user);
    }

    # VALIDA USUÁRIO
    function validate($user) {

        $this->db->where('email', $user['email'] ); 
        $this->db->where('password', $user['password']);
        $this->db->where('active', $user['active']); 

         return $this->db->get('users')->result(); 

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

    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id_user'=>$prevResult['id_user']));
            $userID = $prevResult['id_user'];
        }else{

            $psw = rand(1,2000);

            $data['nivel'] = 1;
            $data['password'] = sha1($psw);
            $data['active'] = 1;
            $data['day_register'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }



    public function getFace($user){
        $this->db->select('');
        $this->db->where('email',$user['email']);
        $this->db->where('first_name',$user['first_name']);
        $this->db->where('last_name',$user['last_name']);

        return $this->db->get('users')->result();
    }
}