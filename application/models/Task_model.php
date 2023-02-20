<?php 
class Task_model extends CI_Model {

    public function getTask(){
        $allTask = $this->db->get('task');
        if($allTask){
            return $allTask->result();
        }
    }

    public function addTask($data){
      $addTask = $this->db->insert('task',$data);
      if($addTask){
        return true;
      }else{
        return false;
      }
       
    }
    
    public function getEditTask($id){
      $this->db->where('id',$id);
      $getEditTask = $this->db->get('task');
      if($getEditTask){
        return $getEditTask->row();
      }
    }
    
      public function editTask($data,$id){
        $this->db->where('id',$id);
        $addTask = $this->db->update('task',$data);
        if($addTask){
          return true;
        }else{
          return false;
        }
         
      }
    
}