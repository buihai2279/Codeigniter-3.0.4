<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_product extends CI_Controller
{

    public function index()
    {
        $data['result'] = $this->My_model->get_all('product');
        // print_r($result);
        $this->load->view('back-end/header');
        $this->load->view('manager_product/list', $data);
        $this->load->view('back-end/footer');
        if ($this->session->has_userdata('login') == false&&$this->session->has_userdata('level')==0) {
            redirect('home','refresh');
        }
    }
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('Demo_library');
        $this->load->model('My_model');
    }
    public function add()
    {
        $this->demo_library->Load_view('categories/add');
    }
    public function test()
    {
        $link   = 'https://www.thegioididong.com/dtdd';
        $result = $this->demo_library->Get_xml($link);
        foreach ($result as $value) {
            $t      = str_replace('.', '', $value['price']);
            $t = str_replace('₫', '', $t);
            $link=implode('|',$value['link']);
            $des    = implode('|', $value['des']);
            $data   = array(
                'name'        => $value['name'],
                'price'       => $t,
                'img'         => $value['src'],
                'description' => $des,
                'link' => $link,
                'detail' => $value['detail']
            );
            $this->db->insert('product', $data);
        }
    }
    public function test2()
    {
    	$link   = 'https://www.thegioididong.com/dtdd/lg-k10';
        $result = $this->demo_library->Get_xml_1($link);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
    public function fillter()
    {
        $this->My_model->Load_view('manager_product/list');
    }
    public function get_img($id)
    {
        $result=$this->db->select('images')->get_where('product',array('id' => $id));
        echo "string";
        // print_r($result);
    }

}
/* End of file manager_product.php */
/* Location: ./application/controllers/manager_product.php */
?>

