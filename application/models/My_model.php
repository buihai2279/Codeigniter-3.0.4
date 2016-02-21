<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function Get_user_by_mail($mail='')
	{
		$query = $this->db->get_where('user',array('mail' => $mail));
		if ($query->num_rows()==1){
			return $query->row();
		}else{
			return FALSE;
		}
			
	}
	public function Check_login($mail='',$pass='')
	{
		$query = $this->db->get_where('user',array('mail' => $mail,'password'=>$pass));
		if ($query->num_rows()==1){
			return $query->row();
		}else{
			return FALSE;
		}
			
	}
	public function Get_limit($table,$limit=15,$offset=10)
	{
		$this->db->from($table);
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result();
	}
	public function Count_table($table)
	{
		return $this->db->count_all('user');
	}
	public function Get_user_by_code($code='')
	{
		$query = $this->db->get_where('user',array('code' => $code));
		if ($query->num_rows()==1){
			return $query->row();
		}else
			return FALSE;
	}
	public function Check_user_by_mail($mail)
	{
		$query = $this->db->select('mail')->get_where('user',array('mail'=>$mail));
		if ($query->num_rows()==1){
			return TRUE;
		}else
			return FALSE;
	}
	public function Update($id,$array,$table)
	{
	 	return $this->db->where('id',$id)->update($table,$array);
	}
	public function Block($id,$table)
	{
	 	return $this->db->where('id',$id)->update($table,array('status' => 2));
	}
	public function Un_block($id,$table)
	{
	 	return $this->db->where('id',$id)->update($table,array('status' => 1));
	}
	public function Delete($id,$table)
	{
	 	return $this->db->delete($table, array('id' => $id));
	}
	public function Get_all($table,$col='id',$sort='')
	 {
	 	if ($col==''&&$sort=='') {
	 		$query=$this->db->get($table);
	 	}else{
	 		$query=$this->db->get($table);
	 	}
	 	return $query->result_array();
	 	
	 } 
}

/* End of file My_model.php */
/* Location: ./application/models/My_model.php */
