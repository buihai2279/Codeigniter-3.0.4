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
		}else
		return FALSE;
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
		if ($query->num_rows()==1&&$mail==$query->row()->mail){
			return TRUE;
		}else
		return FALSE;
	}
	public function Update($id,$array,$table)
	 {
	 	$this->db->where('id',$id)->update($table,$array);
	 } 
}

/* End of file My_model.php */
/* Location: ./application/models/My_model.php */
