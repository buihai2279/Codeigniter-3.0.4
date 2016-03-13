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
    public function cart_detail()
    {
        $this->load->library('cart');
        ?>
              <div class="row">
                <div class="pull-left col-sm-5 col-md-4 ">
                  <img src="<?php echo base_url() ?>/bootstrap/images/fullimage1.jpg" style="max-width: 200px" class="img-responsive">
                  </div>
                <div class="pull-right col-sm-6 col-md-7">
                  <p>Name</p>
                  <p>Price</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="pull-left col-sm-5 col-md-4 ">
                  <img src="<?php echo base_url() ?>/bootstrap/images/fullimage1.jpg" style="max-width: 200px" class="img-responsive">
                  </div>
                <div class="pull-right col-sm-6 col-md-7">
                  <p>Name</p>
                  <p>Price</p>
                </div>
              </div>
              <hr>
              <div class="pull-left col-sm-6 col-md-6 "><b>Total</b></div><div class="pull-right col-sm-6 col-md-6">35$</div>
              <hr>
        <?php
        // echo "<pre>";
        // print_r($this->cart->contents());
        // echo "</pre>";
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
