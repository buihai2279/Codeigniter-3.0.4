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
        $this->My_model->Load_front_end('front-end/pay');
    }
    public function update_cart()
    {
        if (isset($_POST['update'])) {
            $data = $_POST;
            $this->cart->update($data);
            $this->My_model->Sent_message('Cập nhật thành công','home/pay','success');
        }else
            $this->My_model->Sent_message('Có lỗi xảy ra','home','danger');
    }
    public function pay()
    {
        if (isset($_POST)) {
            if ($this->session->has_userdata('mail')) {
                $user=$this->session->userdata('mail');
            } else {
                $user='';
            }
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_time = date('Y-m-d H:i:s');
            $data = array(
                    'user' => $user, 
                    'date_order' => $date_time, 
                    'date_ship' => $_POST['date_ship'], 
                    'receiver_name' => $_POST['receiver_name'], 
                    'contact' => $_POST['phone'], 
                    'note' => $_POST['note'], 
                    'status' => '0', 
                );
            $this->db->insert('order',$data);
            $id_order=$this->db->insert_id();
            foreach ($this->cart->contents() as $key => $value) {
                $data = array(
                        'id_order' => $id_order, 
                        'id_product' => $value['id'], 
                        'qty' => $value['qty'], 
                        'price' => $value['price'], 
                        'subtotal' => $value['subtotal'], 
                    );
                $this->db->insert('order',$data);
                $id_order=$this->db->insert_id();
            }
        } else {
            echo "string";
        }
        
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
