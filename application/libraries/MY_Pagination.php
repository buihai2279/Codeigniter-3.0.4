<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Paginastion extends CI_Pagination
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}
	// public function Creaste_pagination($config)
	// {
	// 	$this->ci->load->library('pagination');

	// 	$config['base_url'] = '';
	// 	$config['total_rows'] = '';
	// 	$config['uri_segment'] = 3;
	// 	$config['num_links'] = 3;
	// 	$config['full_tag_open'] = '<nav><ul class="pagination pagination-sm">';
	// 	$config['full_tag_close'] = '</ul></nav>';
	// 	$config['num_tag_open'] = '<li>';
	// 	$config['num_tag_close'] = '</li>';
	// 	$config['first_link'] = 'First';
	// 	$config['first_tag_open'] = '<li class="">';
	// 	$config['first_tag_close'] = '</li>';
	// 	$config['last_link'] = 'Last';
	// 	$config['last_tag_open'] = '<li>';
	// 	$config['last_tag_close'] = '</li>';
	// 	$config['next_link'] = '<i class="fa fa-caret-right"></i>';
	// 	$config['next_tag_open'] = '<li>';
	// 	$config['next_tag_close'] = '</li>';
	// 	$config['prev_link'] = '<i class="fa fa-caret-left"></i>';
	// 	$config['prev_tag_open'] = '<li>';
	// 	$config['prev_tag_close'] = '</li>';
	// 	$config['cur_tag_open'] = '<li class="active"><a>';
	// 	$config['cur_tag_close'] = '</a></li>';
	// 	return $this;
	// }

	

}

/* End of file MY_Pagination.php */
/* Location: ./application/libraries/MY_Pagination.php */
