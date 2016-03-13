<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $table='product';
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }
    public function Load_view($view, $data = null)
    {
        $this->load->view('front-end/header');
        $this->load->view($view, $data);
        $this->load->view('front-end/footer');
    }
    public function index()
    {
        $this->load->helper('form');
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product");
        $data['result']=$query->result_array();
        $this->Load_view('home',$data);
    }
    public function cart_detail()
    {
        $this->load->helper('form');
        $this->load->view('front-end/cart_detail');
    }
    public function update_cart()
    {
        if (isset($_POST)) {
            $data = $_POST;
            $this->cart->update($data);
            $this->My_model->Sent_message('Cập nhật thành công','home/pay','success');
        }else $this->My_model->Sent_message('Có lỗi xảy ra','home','danger');
    }
    public function pay()
    {
        $this->load->helper('form');
        $this->My_model->Load_front_end('front-end/pay');
    }
    public function count_cart()
    {
        $this->load->library('session');
        $this->session->set_userdata('count_cart',count($this->cart->contents()));
        echo $_SESSION['count_cart'];
    }
    public function Add_to_cart()
    {
        $data = array(
                    'id'      => $_POST['id'],
                    'qty'     => $_POST['qty'],
                    'price'   => $_POST['price'],
                    'img'   => $_POST['img'],
                    'name'    => $_POST['name']
                );
        $this->cart->insert($data);
        echo "<pre>";
        print_r(count($this->cart->contents()));
        echo "</pre>";
    }
    public function slug($slug)
    {
        $data['result']=$this->My_model->get_row_by_slug($slug);
        if ($data['result']!=false) {
            $query = $this->db->select('name,img,slug,price,description')->order_by('name', 'RANDOM')->limit(4)->get($this->table);
            $data['suggest']=$query->result_array();
            $this->My_model->Load_front_end('info',$data);
        }else $this->My_model->Sent_message('Bạn đang truy cập vào đường link không tồn tại','home/index','danger');
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
