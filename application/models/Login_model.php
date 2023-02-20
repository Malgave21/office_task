<?php 
class Login_model extends CI_Model {


    public function isValided($userame, $password){
	$vaildData = $this->db->where(['email'=>$userame,'password'=>$password])
				          ->get('user');
	if($vaildData->num_rows()){
	return $vaildData->row()->id;
    }else{
      return false;
       }
    }

    public function adduser($data){
        $addUser = $this->db->insert('user',$data);
        if($addUser){
          return true;
        }else{
          return false;
        }
         
      }
}