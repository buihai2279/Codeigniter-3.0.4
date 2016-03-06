<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_product extends CI_Controller
{

    public $table = 'product';
    public $limit = 6;
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('Demo_library');
        $this->load->model('My_model');
    }
    public function index()
    {
        $segment    = (int) $this->uri->segment(3);
        $total = $this->My_model->Count_table($this->table);
        if ($segment >= $total) {
            $segment = $total - $limit;
        }
        if ($segment < 0) {
            $segment = 0;
        }
        $link           = 'http://localhost/Codeigniter-Project/manager_product/index/';
        $data['result'] = $this->My_model->get_limit($this->table, $this->limit, $segment);
        $data['pag']    = $this->My_model->create_pagination($link, $total, $segment);
        $this->My_model->Load_view('manager_product/list', $data);
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
            $link = implode('|', $value['link']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_time = date('Y-m-d H:i:s');
            $data      = array(
                'name'         => $value['name'],
                'price'        => $value['price'],
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
    public function fillter()
    {
        $this->My_model->Load_view('manager_product/list');
    }
    public function get_img($id)
    {
        $query   = $this->db->select('link,caption')->get_where('product', array('id' => $id));
        $var     = $query->row_array();
        $link    = explode('|', $var['link']);
        $caption = explode('|', $var['caption']);
        echo "<h3 class='text-center'>Hiển thị " . count($link) . " hình ảnh<h3>";
        foreach ($link as $key => $value) {
            // echo $key;
            echo "<div class='col-md-3 '>";
            echo "<a href='" . $value . "' target='_blank'><img src='" . $value . "' class='img-responsive ' data-toggle='tooltip' title='" . $caption[$key] . "' alt='" . $caption[$key] . "'></a>";
            echo "</div>";
        }

    }
    public function Edit($id = '')
    {
        $query = $this->db->get_where('product', array('id' => $id));
        $var   = $query->row();
        ?>
        <div class="col-md-12">
             <table class="table table-bordered">
                 <tr>
                     <td><b>id:</b></td>
                     <td><?php echo $var->id; ?></td>
                 </tr>
                 <tr>
                     <td><b>name:</b></td>
                     <td><?php echo $var->name; ?></td>
                 </tr>
                 <tr>
                     <td><b>price:</b></td>
                     <td><?php echo $var->price; ?></td>
                 </tr>
                 <tr>
                     <td><b>category_id:</b></td>
                     <td><?php echo $var->category_id; ?></td>
                 </tr>
                 <tr>
                     <td><b>status:</b></td>
                     <td><?php echo $var->status; ?></td>
                 </tr>
                 <tr>
                     <td><b>top:</b></td>
                     <td><?php echo $var->top; ?></td>
                 </tr>
                 <tr>
                     <td><b>link:</b></td>
                     <td><?php $arr = explode('|', $var->link);
        foreach ($arr as $value) {
            echo '<img src="' . $value . '" class="img-responsive" style="max-height:150px;display:inline">';
        }
        ?>
                    </td>
                 </tr>
                 <tr>
                     <td><b>img:</b></td>
                     <td><?php echo '<img src="' . $var->img . '" class="img-responsive" style="max-height:150px;display:inline">'; ?></td>
                 </tr>
                 <tr>
                     <td><b>detail:</b></td>
                     <td><?php $arr = explode('|', $var->detail);foreach ($arr as $value) {
            echo $value . '<br>';}?></td>
                 </tr>
                 <tr>
                     <td><b>caption:</b></td>
                     <td><?php $arr = explode('|', $var->caption);foreach ($arr as $value) {
            echo $value . '<br>';}?></td>
                 </tr>
                 <tr>
                     <td><b>description:</b></td>
                     <td><?php $arr = explode('|', $var->description);foreach ($arr as $value) {
            echo $value . '<br>';}?></td>
                 </tr>
                 <tr>
                     <td><b>date_created:</b></td>
                     <td><?php echo $var->date_created; ?></td>
                 </tr>
                 <tr>
                     <td><b>last_updated:</b></td>
                     <td><?php echo $var->last_updated; ?></td>
                 </tr>
             </table>
        </div>
        <?php
}
    public function get_info($id = '')
    {
        $query = $this->db->get_where('product', array('id' => $id));
        $var   = $query->row();
        ?>
        <div class="col-md-12">
             <table class="table table-bordered">
                 <tr>
                     <td><b>id:</b></td>
                     <td><?php echo $var->id; ?></td>
                 </tr>
                 <tr>
                     <td><b>name:</b></td>
                     <td><?php echo $var->name; ?></td>
                 </tr>
                 <tr>
                     <td><b>price:</b></td>
                     <td><?php echo $var->price; ?></td>
                 </tr>
                 <tr>
                     <td><b>category_id:</b></td>
                     <td><?php echo $var->category_id; ?></td>
                 </tr>
                 <tr>
                     <td><b>status:</b></td>
                     <td><?php echo $var->status; ?></td>
                 </tr>
                 <tr>
                     <td><b>top:</b></td>
                     <td><?php echo $var->top; ?></td>
                 </tr>
                 <tr>
                     <td><b>link:</b></td>
                     <td><?php $arr = explode('|', $var->link);
        foreach ($arr as $value) {
            echo '<img src="' . $value . '" class="img-responsive" style="max-height:150px;display:inline">';
        }
        ?>
                    </td>
                 </tr>
                 <tr>
                     <td><b>img:</b></td>
                     <td><?php echo '<img src="' . $var->img . '" class="img-responsive" style="max-height:150px;display:inline">'; ?></td>
                 </tr>
                 <tr>
                     <td><b>detail:</b></td>
                     <td><?php $arr = explode('|', $var->detail);foreach ($arr as $value) {
            echo $value . '<br>';}?></td>
                 </tr>
                 <tr>
                     <td><b>caption:</b></td>
                     <td><?php $arr = explode('|', $var->caption);foreach ($arr as $value) {
            echo $value . '<br>';}?></td>
                 </tr>
                 <tr>
                     <td><b>description:</b></td>
                     <td><?php $arr = explode('|', $var->description);foreach ($arr as $value) {
            echo $value . '<br>';}?></td>
                 </tr>
                 <tr>
                     <td><b>date_created:</b></td>
                     <td><?php echo $var->date_created; ?></td>
                 </tr>
                 <tr>
                     <td><b>last_updated:</b></td>
                     <td><?php echo $var->last_updated; ?></td>
                 </tr>
             </table>
        </div>
        <?php
}
    public function tesssst($id = '')
    {
        $tmp = $this->My_model->Get_user_by_id($id);
        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
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

}; /* End of file manager_product.php */; /* Location: ./application/controllers/manager_product.php */
?>

