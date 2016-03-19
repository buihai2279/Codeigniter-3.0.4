<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $table='product';
    public $url_api ='https://www.nganluong.vn/checkout.api.nganluong.post.php';  
    public $merchant_id = '45525';
    public $merchant_password = '2daa09faf06829a2d97bcde3b8ee2003';
    public $receiver_email = 'buihai2603@gmail.com';
    public $cur_code = 'vnd';
    public $fee_shipping=30000;
    public $discount_amount=0;
    public $tax_amount=10;
    public $title_main='Techshop sự lựa chọn cho tương lai';
    public $description_main='Techshop sự lựa chọn cho tương lai';
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }
    public function index()
    {
        $data['title']='Trang chủ';
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1 AND category_id=1 ORDER BY top DESC LIMIT 12");

        $data['mobie']=$query->result_array();

        $query1 = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1 AND category_id=2 ORDER BY top DESC LIMIT 12");

        $data['laptop']=$query1->result_array();

        $query2 = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1 AND category_id=3 ORDER BY top DESC LIMIT 12");

        $data['tablet']=$query2->result_array();

        $query3 = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1 AND category_id=4 ORDER BY top DESC LIMIT 12");

        $data['phukien']=$query3->result_array();

        $news = $this->db->query("SELECT id,title FROM news ORDER BY last_update DESC LIMIT 6");
        $data['news']=$news->result_array();
        $slide = $this->db->query("SELECT link,img,caption FROM slide ORDER BY top LIMIT 6 ");
        $data['slide']=$slide->result_array();

        if(!$tmp=$this->cache->get('data_one')){
            $tmp=$data;
            $this->cache->save('data_one', $tmp, 30);
        }
        $this->My_model->Load_front_end('home',$tmp);
    }
    public function cart_detail()
    {
        $this->load->helper('form');
        $this->load->view('front-end/cart_detail');
    }
    public function edit()
    {
        $data['title']='Cập nhật thông tin nhận hàng';
        $this->load->helper('form');
        $this->My_model->Load_front_end('nganluong/pay');
    }
    public function update_cart()
    {
        if (isset($_POST['update'])) {
            $data = $_POST;
            $this->cart->update($data);
            $this->session->set_userdata('count_cart',count($this->cart->contents()));
            $this->My_model->Sent_message('Cập nhật thành công','home/edit','success');
        }else
            $this->My_model->Sent_message('Có lỗi xảy ra','home','danger');
    }
    public function delete_cart($rowid='')
    {
        unset($_SESSION['cart_contents'][$rowid]);
        $_SESSION['count_cart']=count($this->cart->contents());
        $this->My_model->Sent_message('Cập nhật thành công','home/edit','success');
    }
    public function pay()
    {
        $this->load->library('form_validation');
        if (isset($_POST['nlpayment'])) {
            $this->form_validation->set_rules('buyer_fullname', 'Buyer fullname', 'required');
            $this->form_validation->set_rules('buyer_email', 'Buyer email', 'required');
            $this->form_validation->set_rules('buyer_mobile', 'Buyer mobile', 'required');
            if ($this->form_validation->run() == false) {
                $this->My_model->Load_front_end('nganluong/pay');die();
            }
            if ($this->session->has_userdata('mail')) {
                $user=$this->session->userdata('mail');
            } else {
                $user='';
            }
            foreach ($this->cart->contents() as $key => $value) {
                $data = array(
                        'id_order' => $id_order, 
                        'id_product' => $value['id'], 
                        'qty' => $value['qty'], 
                        'price' => $value['price'],
                    );
                $this->db->insert('order_detail',$data);
            }
            //sentmail
            unset($_SESSION['count_cart']);
            unset($_SESSION['cart_contents']);
            $this->My_model->Sent_message('Thanh toán thành công cảm ơn bạn đã mua hàng tại Techshop mời để lại feedback để chúng tôi phục vụ được tốt hơn','home/feedback','success');
        } else {
            echo "Error";
        }
    }
    public function Add_to_cart()
    {
        $data = array(
                    'id'      => $_POST['id'],
                    'qty'     => $_POST['qty'],
                    'price'   => $_POST['price'],
                    'img'   => $_POST['img'],
                    'link'   => current_url(),
                    'name'    => $_POST['name']
                );
        $this->cart->insert($data);
        echo "Thêm 1 sản phẩm vào giỏ hàng thành công";
    }
    public function slug($slug)
    {
        $data['result']=$this->My_model->get_row_by_slug($slug,'product');
        if ($data['result']!=false) {
            $query = $this->db->select('name,img,slug,price,description')->order_by('name', 'RANDOM')->limit(4)->get_where($this->table,array('category_id'=>$data['result']->category_id));
            $data['suggest']=$query->result_array();

            $query = $this->db->select('name,img,slug,price,description')->order_by('name', 'RANDOM')->limit(4)->get_where($this->table,array('category_id'=>4));
            $data['phukien']=$query->result_array();

            $this->My_model->Load_front_end('info',$data);
        }else $this->My_model->Sent_message('Bạn đang truy cập vào đường link không tồn tại','home/index','danger');
    }
    public function slug_category($slug)
    {
        $data['result']=$this->My_model->get_row_by_slug($slug,'category');
        $id=$data['result']->id;
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1 AND category_id=$id ORDER BY top DESC");
         $data['list']=$query->result_array();
        $this->My_model->Load_front_end('front-end/view_cate',$data);
    }
    public function count_cart()
    {
        $this->session->set_userdata('count_cart',count($this->cart->contents()));
        echo $_SESSION['count_cart'];
    }
    public function feedback()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->My_model->Load_front_end('contact/add');
    }
    public function pay_thank()
    {
        $this->My_model->Load_front_end('nganluong/payment_success');
    }
    public function pay_cancel()
    {
        $this->db->where('order_code',$_GET['order_code'])->update('order',array('status'=>3));
        unset($_SESSION['count_cart']);
        unset($_SESSION['cart_contents']);
        $this->My_model->Sent_message('Cảm ơn bạn đã ghé thăm website','home','info');
    }
    public function save()
    {
        if (isset($_GET['token'])) {
            $token=$_GET['token'];
        }else $this->My_model->Sent_message('Error','home','danger');
        $nl_result=$this->GetTransactionDetail($token);
        if($nl_result){
            $nl_errorcode           = (string)$nl_result->error_code;
            $nl_transaction_status  = (string)$nl_result->transaction_status;
            if($nl_errorcode == '00') {
                if($nl_transaction_status == '00') {
                    $data = array(
                        'status'=> 0,
                        'total'=> $nl_result->total_amount,
                        'bank_code'=>$nl_result->bank_code,
                        'transaction_id'=>$nl_result->transaction_id,
                    );
                    $this->db->where('order_code',$nl_result->order_code)->update('order', $data);
                    unset($_SESSION['count_cart']);
                    unset($_SESSION['cart_contents']);
                    $this->My_model->Sent_message('Cảm ơn bạn đã mua hàng tại website,chúng tôi sẽ giao hàng đúng thời gian,hãy để lại feedback','home/feedback','info');
                }
            }else{
                echo $nlcheckout->GetErrorMessage($nl_errorcode);
            }
        }
    }
    public function History()
    {
        echo "Đang xây dựng";
    }
    public function New_product()
    {
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1  ORDER BY date_created DESC");
        $data['list']=$query->result_array();
        $this->My_model->Load_front_end('front-end/view_new',$data);
    }
    public function Sell()
    {
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product WHERE status=1  ORDER BY sold DESC");
        $data['list']=$query->result_array();
        $this->My_model->Load_front_end('front-end/view_sold',$data);
    }
    public function Search_product($search='')
    {
        if (isset($_GET['search'])) {
            $search=$_GET['search'];
        } else {
            $search='';
        }
        $query = $this->db->query("SELECT name,slug,img,price,description FROM product  WHERE name LIKE %$search% ESCAPE '!'");
        $data['list']=$query->result_array();
        $this->My_model->Load_front_end('front-end/search',$data);
    }
    public function page_not_found()
    {
         $this->My_model->Load_front_end('page_not');
    }


    protected  function GetTransactionDetail($token){    
                ###################### BEGIN #####################
        $params = array(
            'merchant_id'       => $this->merchant_id ,
            'merchant_password' => MD5($this->merchant_password),
            'version'           => '3.1',
            'function'          => 'GetTransactionDetail',
            'token'             => $token
        );                      
        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url_api);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        $error = curl_error($ch);
        if ($result != '' && $status==200){
            $nl_result  = simplexml_load_string($result);                       
            return $nl_result;
        }
        return false;
            ###################### END #####################
    } 
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
