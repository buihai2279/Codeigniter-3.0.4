<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Load_view($view, $data = null)
    {
        $this->load->view('front-end/header');
        $this->load->view($view, $data);
        $this->load->view('front-end/footer');
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('cart');
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product");
        $data['result']=$query->result_array();
        $this->Load_view('home',$data);
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
