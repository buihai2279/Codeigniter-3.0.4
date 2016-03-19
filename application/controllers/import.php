<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
		public function index()
	{

	}
	public function __construct()
	{
		parent::__construct();
		$this->load->library('demo_library');
	}
	public function import_cate()
	{
		# code...
	}
	public function import_laptop()
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	    $date_time = date('Y-m-d H:i:s');
		$result=$this->demo_library->Get_laptop();
		foreach ($result as $value) {
		    $slug=str_replace('/laptop/', '',$value['slug']);
		    $price=str_replace('.','',$value['price']);
		    $price=str_replace('₫','', $price);
		    $slide=implode('|', $value['slide']);
		    $data=array(
		    	'name'=> $value['name'],
		    	'slug'=> $slug,
		    	'price'=> $price,
		    	'total'=> rand(10,100),
		    	'status'=> 1,
		    	'category_id'=> 2,
		    	'img'=> $value['img'],
		    	'slide'=> $slide,
		    	'date_created'=> $date_time,
		    	'last_updated'=> $date_time 
		    	);
		    $this->db->insert('product',$data);
		}
	}
	public function import_smartphone()
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	    $date_time = date('Y-m-d H:i:s');
		$result=$this->demo_library->Get_smartphone();
		foreach ($result as $value) {
		    $slug=str_replace('/dtdd/', '', $value['slug']);
		    $price=str_replace('.','',$value['price']);
		    $price=str_replace('₫','', $price);
		    $slide=implode('|', $value['slide']);
		    $data=array(
		    	'name'=> $value['name'],
		    	'slug'=> $slug,
		    	'price'=> $price,
		    	'total'=> rand(10,100),
		    	'status'=> 1,
		    	'category_id'=> 1,
		    	'img'=> $value['img'],
		    	'slide'=> $slide,
		    	'date_created'=> $date_time,
		    	'last_updated'=> $date_time 
		    	);
		    $this->db->insert('product',$data);
		}
	}
	public function import_tablet()
	{
	    date_default_timezone_set('Asia/Ho_Chi_Minh');
	    $date_time = date('Y-m-d H:i:s');
		$result=$this->demo_library->Get_tablet();
		foreach ($result as $value) {
		    $slug=str_replace('/may-tinh-bang/', '', $value['slug']);
		    $price=str_replace('.','',$value['price']);
		    $price=str_replace('₫','', $price);
		    $slide=implode('|',$value['slide']);
		    $caption=implode('|', $value['caption']);
		    $data=array(
		    	'name'=> $value['name'],
		    	'slug'=> $slug,
		    	'price'=> $price,
		    	'total'=> rand(10,100),
		    	'status'=> 1,
		    	'category_id'=> 3,
		    	'img'=> $value['img'],
		    	'slide'=> $slide,
		    	'caption'=> $caption,
		    	'date_created'=> $date_time,
		    	'last_updated'=> $date_time 
		    	);
		    $this->db->insert('product',$data);
		}
	}
	public function import_phukien()
	{
	    date_default_timezone_set('Asia/Ho_Chi_Minh');
	    $date_time = date('Y-m-d H:i:s');
		$result=$this->demo_library->Get_phukien();
		foreach ($result as $value) {
		    $slug=str_replace('/op-lung-flipcover/', '', $value['slug']);
		    $slug=str_replace('/tai-nghe-day/', '', $slug);
		    $slug=str_replace('/sac-dtdd/', '', $slug);
		    $slug=str_replace('/op-lung-may-tinh-bang/', '', $slug);
		    $slug=str_replace('/the-nho-dien-thoai/', '', $slug);
		    $price=str_replace('.','',$value['price']);
		    $price=str_replace('₫','', $price);
		    $slide=implode('|', $value['slide']);
		    $data=array(
		    	'name'=> $value['name'],
		    	'slug'=> $slug,
		    	'price'=> $price,
		    	'total'=> rand(10,100),
		    	'status'=> 1,
		    	'category_id'=> 4,
		    	'img'=> $value['img'],
		    	'slide'=> $slide,
		    	'date_created'=> $date_time,
		    	'last_updated'=> $date_time 
		    	);
		    $this->db->insert('product',$data);
		}
	}
	public function import_user()
	{
		# code...
	}
	public function import_order()
	{
		# code...
	}
    public function test()
    {
        $result = $this->demo_library->Get_xml($link);
        foreach ($result as $value) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_time = date('Y-m-d H:i:s');
            $data      = array(
                'name'         => $value['name'],
                'price'        => $value['price'],
                'slug'        => $value['href'],
                'img'          => $value['src'],
                'category_id'  => $value['category_id'],
                'description'  => $value['description'],
                'caption'      => $value['caption'],
                'link'         => $link,
                'date_created' => $date_time,
                'detail'       => $value['detail'],
            );
            $this->db->insert('product', $data);
        }
        $this->My_model->Sent_message('Thao tác Thành công', 'manager_product', 'success');
    }

}

/* End of file import.php */
/* Location: ./application/controllers/import.php */