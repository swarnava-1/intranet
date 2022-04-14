<?php
class Wfh_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct() {

        $this->load->database();
    }
  	
    public function get_all_wfh() {

    	$this->db->select('*');
    	$this->db->from('work_from_home');
		$query = $this->db->get();
		return $query->result();
    
    }
    public function add_wfh($data){
       
        $query = $this->db->insert('work_from_home',$data);
        return $query;

    }
    public function get_all_users($user_id) {

        $this->db->select('user.id,user_name,CONCAT(first_name," ",last_name) AS full_name,email,designation_name');
        $this->db->from('user');
        $this->db->join('designation','user.designation=designation.id');
        $this->db->where('user.id !=' , $user_id);
        $query=$this->db->get();
        return $query->result();
    
    }
    public function get_wfh_by_id($id){
        $this->db->select('*');
        $this->db->from('work_from_home');
        $this->db->where('id',$id);
        $query=$this->db->get();  
        return $query->result();
    }
    public function update_wfh($data,$id)
    {
        $this->db->where('id', $id);
    	$flag =$this->db->update('work_from_home', $data);
        return $flag;
    }
    public function remove_wfh($wfh_id){        
        $this->db->where('id', $wfh_id);
        $rec = $this->db->delete('work_from_home');
        return $rec;
    }
    public function get_all_total_wfh($user_id) {

    	$this->db->select('wfh_count');
    	$this->db->from('total_wfh');
		$this->db->where('user_id',$user_id);
        $query=$this->db->get();
        return $query->result();

    
    }
    public function get_curent_wfh($user_id)
    {
       $this->db->select('wfh_count');
       $this->db->from('total_wfh');
     
       $this->db->where('user_id',$user_id);
       $query=$this->db->get();
       return $query->result();
    }
    public function update_day($now_date,$user_id){
        $this->db->where('user_id',$user_id);
        $flag =$this->db->update('total_wfh', $now_date);
        return $flag;
    }
    public function previous_wfh($wfh_date_to,$user_id)
    {
        $this->db->select("wfh_date_to");
        $this->db->from("work_from_home");
        $this->db->limit(1);
        $this->db->where('user_id',$user_id);
        
        $this->db->order_by('id',"DESC");
        //$this->db->where('user_id',$user_id);
        $query = $this->db->get();
        $result = $query->result();
    }
}