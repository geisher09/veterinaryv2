<?php

class User_model extends CI_Model {
    private $table = 'user';
    
    function create($userRecord){
        $this->db->insert($this->table, $userRecord);
    }
    
    function read($condition=null){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(isset($condition))
            $this->db->where($condition);
        
        $query = $this->db->get();
        
        if($query->num_rows()>0)
            return $query->result_array();
        else
            return false;
        
    }
    
    function update($data){
     
                $this->db->set('username',$data['username']);
                $this->db->set('name',$data['name']);
                $this->db->set('isDoctor',$data['isDoctor']);
             
                $this->db->where('userID',$data['userID']);
                $this->db->update('user');
    }
    function updatepass($data){
     
                $this->db->set('password',$data['password']);
             
                $this->db->where('userID',$data['userID']);
                $this->db->update('user');
    }
    
    function del($where_array){
        $this->db->delete($this->table,$where_array);
    }
}
?>