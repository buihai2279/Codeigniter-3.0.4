<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manager_product extends CI_Controller
{
    public $table = 'product';
    public $limit = 12;
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('Demo_library');
        if ($this->My_model->check_manager() == false) {
            $this->My_model->Sent_message('Khong duoc quyen truy cap', 'home', 'warning');
        }
    }
    public function index()
    {
        $segment = (int) $this->uri->segment(3);
        $total   = $this->My_model->Count_table($this->table);
        if ($segment >= $total && $total > 0) {
            $segment = $total - $limit;
        }
        if ($segment < 0) {
            $segment = 0;
        }
        $link           = 'http://localhost/Codeigniter-Project/manager_product/index/';
        if(!$tmp=$this->cache->get('list_product')){
            $tmp=$this->My_model->get_limit($this->table,$this->limit,$segment);
            $this->cache->save('list_product', $tmp, 30);
        }
        $data['result'] = $tmp;
        $data['pag']    = $this->My_model->create_pagination($link, $total, $segment);
        $this->My_model->Load_view('manager_product/list', $data);
    }
    public function fillter()
    {
        $this->My_model->Load_view('manager_product/list');
    }
    public function get_img($id)
    {
        $query = $this->db->select('slide,caption')->get_where('product', array('id' => $id));
        $var   = $query->row_array();
        $slide  = explode('|', $var['slide']);
        echo "<h3 class='text-center'>Hiển thị " . count($slide) . " hình ảnh<h3>";
        foreach ($slide as $key => $value) {
            echo "<div class='col-md-3 '>";
            echo "<a href='" . $value . "' target='_blank'><img src='" . $value . "' class='img-responsive ' ></a>";
            echo "</div>";
        }
    }
    public function get_info($id = '')
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product.id', $id);
        $query = $this->db->get();
        print_r($query->result_array());die();
        // $this->load->view('manager_product/info',$data);
    }
    public function Delete_product($id)
    {
        $result = $this->My_model->delete($id, $this->table);
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'manager_product', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'manager_product', 'danger');
        }
    }
    public function get_slug()
    {
        echo $this->My_model->utf8_to_url($_POST['slug']);
    }
    public function add()
    {
        $this->load->helper('form');
        if (isset($_POST['submit']) && $_POST['submit'] == 'ok') {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_time = date('Y-m-d H:i:s');
            $data      = array(
                'name'         => $this->input->post('name'),
                'slug'         => $this->input->post('txtslug'),
                'status'       => $this->input->post('status'),
                'top'          => $this->input->post('top'),
                'description'  => $this->input->post('description'),
                'img'          => $this->input->post('img'),
                'slide'         => $this->input->post('slide'),
                'caption'      => $this->input->post('caption'),
                'detail'       => $this->input->post('detail'),
                'date_created' => $date_time,
            );
            $tmp = $this->db->insert('product', $data);
            if ($tmp == 1) {
                $this->My_model->Sent_message('Thành công', 'manager_product', 'success');
            }
        }
        $cate = $this->My_model->Get_col('id,name', 'category');
        foreach ($cate as $value) {
            $list_category[$value['id']] = $value['name'];
        }
        $data['list_category'] = $list_category;
        $this->My_model->Load_view('manager_product/add', $data);
    }
    public function Edit($id = '')
    {
        $this->load->helper('form');
        if (isset($_POST['submit']) && $_POST['submit'] == 'ok') {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date('Y-m-d H:i:s');
            $data = array(
                'name'         => $_POST['name'],
                'price'        => $_POST['price'],
                'slug'         => $this->input->post('txtslug'),
                'status'       => $_POST['status'],
                'category_id'  => $_POST['category_id'],
                'top'          => $_POST['top'],
                'description'  => $_POST['description'],
                'detail'       => $_POST['detail'],
                'caption'      => $_POST['caption'],
                'last_updated' => $time,
            );
            $tmp = $this->My_model->Update($id, $data, $this->table);
            if ($tmp == 1) {
                $this->My_model->Sent_message('Thao tác thành công', 'manager_product', 'success');
            } else {
                $this->My_model->Sent_message('Thao tác lỗi', 'manager_product', 'danger');
            }
        }
        $query    = $this->db->get_where('product', array('id' => $id));
        $info     = $query->row();
        $category = $this->My_model->Get_col('id,name', 'category');
        foreach ($category as $value) {
            $category[$value['id']] = $value['name'];
        }
        $data['list_category'] = $category;
        $data['info']          = $info;
        $this->My_model->Load_view('manager_product/edit', $data);
    }
    public function Proccess()
    {
        if (!isset($_POST['submit']) || !isset($_POST['check'])) {
            $this->My_model->Sent_message('Có lỗi xảy ra', 'manager_product', 'danger');
        } else {
            if (isset($_POST['uri_string']) || $this->input->post('uri_string') != '') {
                $uri_string = base_url() . $_POST['uri_string'];
            } else {
                $uri_string = base_url() . 'manager_product';
            }
            $arrayName = $this->input->post('check');
            if ($this->input->post('edit') == 'delete') {
                foreach ($arrayName as $value) {
                    $result = $this->My_model->delete($value, $this->table);
                }
                if ($result == true) {
                    $this->My_model->Sent_message('Thao tác thành công', $uri_string, 'success');
                } else {
                    $this->My_model->Sent_message('Thao tác Lỗi', $uri_string, 'danger');
                }
            }
        }
    }
}
/* End of file manager_product.php */
/* Location: ./application/controllers/manager_product.php */
