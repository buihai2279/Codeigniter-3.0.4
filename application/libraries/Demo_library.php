<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demo_library
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function sent_mail_active_user($mail_user, $code)
    {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->protocol   = 'smtp';
        $mail->Username   = 't3h0715e@gmail.com'; // SMTP username
        $mail->Password   = 't3h0715e!@#'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        $mail->isHTML(true);

        $mail->setFrom('t3h0715e@gmail.com', 'techshop');
        $mail->addAddress($mail_user, ' User'); // Add a recipient

        $mail->Subject = 'Mail active tai khoan';
        $mail->Body    = 'Mail active tài khoản click vào đường link sau để active<br>';
        $mail->Body .= '<b>' . base_url('auth/active') . '/' . $code . '</b><br>';
        $mail->Body .= 'Hoặc nhập code :<b>' . $code . '</b> vào trang : http://localhost/final/auth/active';
        if (!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    public function mail_recover_password($mail_user, $code)
    {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->protocol   = 'smtp';
        $mail->Username   = 't3h0715e@gmail.com'; // SMTP username
        $mail->Password   = 't3h0715e!@#'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        $mail->isHTML(true);

        $mail->setFrom('t3h0715e@gmail.com', 'techshop');
        $mail->addAddress($mail_user, ' User'); // Add a recipient

        $mail->Subject = 'Reset lại tài khoản';
        $mail->Body    = 'Mail Reset lại tài khoản click vào đường link sau để Reset lại tài khoản<br>';
        $mail->Body .= '<b>' . base_url('auth/active') . '/' . $code . '</b><br>';
        $mail->Body .= 'Hoặc nhập code :<b>' . $code . '</b> vào trang : http://localhost/final/auth/active';
        if (!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    public function reply_mail($mail='',$bbc='',$content='')
    {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->protocol   = 'smtp';
        $mail->Username   = 't3h0715e@gmail.com'; // SMTP username
        $mail->Password   = 't3h0715e!@#'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        $mail->isHTML(true);

        $mail->setFrom('t3h0715e@gmail.com', 'techshop');
        $mail->addAddress($mail, ' User'); // Add a recipient

        $mail->Subject = $bbc;
        $mail->Body    = $content;
        if (!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    public function Get_laptop()
    {
        include 'simple_html_dom.php';
        $html     = file_get_html('file:///F:/Xampp/htdocs/Codeigniter-Project/import/laptop.html');
        $tmp=array();
        $result=array();
        $q=$html->find('ul.laptopcate',0);
        foreach ($q->find('li') as $value) {
            $tmp['name']=$value->find(' a h3',0)->plaintext;
            $tmp['price']=$value->find(' a strong', 0)->plaintext;
            $tmp['slug']=$value->find(' a', 0)->href;
            $tmp['img']=$value->find(' a img', 0)->src;
            $info=$value->find('figure.bginfo', 0);
            $span=array();
            foreach ($info->find('span') as $va) {
                $span[]=$va->plaintext;
            }
            $tmp['info']=$span;
            $html1     = file_get_html('https://www.thegioididong.com'.$tmp['slug']);
            $ul= $html1->find('ul.parameter', 0);
            // $detail=array();
            // foreach ($ul->find('li') as $li) {
            //     $detail[]= $li->find('span',0)->plaintext.':'.$li->find('div',0)->plaintext;
            // }
            // $tmp['detail']=$detail;
            $variable1 = $html1->find('div.owl-carousel', 0);
            $slide=array();
            foreach ($variable1->find('div.item') as $value1) {
                $slide[] = $value1->find('img', 0)->getAttribute('data-src');
            }
            $tmp['slide']=$slide;
            $result[]=$tmp;
        }
        return $result;
    }
    public function Get_phukien()
    {
        include 'simple_html_dom.php';
        $html     = file_get_html('file:///F:/Xampp/htdocs/Codeigniter-Project/import/phukien.html');
        $result=array();
        $tmp=$html->find('ul#lstproduct',0);
        foreach ( $tmp->find('li') as $v) {
            $tmp1['name'] =$v->find('h3',0)->plaintext;
            $tmp1['price']= $v->find('strong',0)->plaintext;
            $tmp1['img'] =$v->find('img',0)->src;
            $slide=array();
            $s=array();
            foreach ($v->find('aside img') as $valu) {
                $s[]=$valu->src;
            }
            $tmp1['slide']=$s;
            $tmp1['slug']=$v->find('a',0)->href;
            $result[]=$tmp1;
        }
        return $result;
    }
    public function Get_tablet()
    {
        include 'simple_html_dom.php';
        $html     = file_get_html('file:///F:/Xampp/htdocs/Codeigniter-Project/import/tablet.html');
        $result=array();
        $tmp=$html->find('div.mobilecate',0);
        foreach ( $tmp->find('div.cell') as $v) {
            $tmp1['name'] =$v->find('a h3',0)->plaintext;
            $tmp1['price']= $v->find('strong',0)->plaintext;
            $tmp1['slug']=$v->find('a', 0)->href;
            $link=$tmp1['slug'];
            $tmp1['img'] =$v->find('img',0)->src;
            $info=$v->find(' figure.bginfo', 0);
            $span=array();
            foreach ($info->find('span') as $va) {
                $span[]=$va->plaintext;
            }
            $tmp1['info']=$span;
            $html1     = file_get_html('https://www.thegioididong.com'.$tmp1['slug']);
            $variable1 = $html1->find('div.owl-carousel', 0);
            $tmp3=array();
            $caption=array();
            foreach ($variable1->find('div.item') as $value1) {
                $tmp3[] = $value1->find('a', 0)->href;
                $caption[]=trim($value1->find('p', 0)->plaintext);
            }
            $tmp1['slide']=$tmp3;
            $tmp1['caption']=$caption;
            $result[]=$tmp1;
        }
        return $result;
    }
    public function Get_smartphone()
    {
        include 'simple_html_dom.php';
        $html     = file_get_html('file:///F:/Xampp/htdocs/Codeigniter-Project/import/smartphone.html');
        $variable = $html->find('div.mobilecate', 0);
        foreach ($variable->find('div.cell') as $value) {
            $tmp['name'] =$value->find('a h3',0)->plaintext;
            $array1=array('Samsung Galaxy S7','Samsung Galaxy S7 Edge','LG G5','Samsung Galaxy A3 2016','OPPO F1','Samsung Galaxy J1 (2016)','ZTE Blade Wave 3','Huawei G Play Mini','Huawei GR5');
            if(in_array($tmp['name'], $array1)) continue;
            $tmp['img'] =$value->find('a img',0)->src;
            $tmp['price'] =$value->find('a strong',0)->plaintext;
            $info=$value->find(' figure.bginfo', 0);
            $span=array();
            foreach ($info->find('span') as $va) {
                $span[]=$va->plaintext;
            }
            $tmp['slug']=$value->find('a',0)->href;
            $html1     = file_get_html('https://www.thegioididong.com'.$tmp['slug']);
            $var3= $html1->find('ul.parameter', 0);
            $tmp['info']=$span;
            $text=array();
            foreach ($var3->find('li') as $val3) {
                $text[]= $val3->find('span',0)->plaintext.' '.$val3->find('div',0)->plaintext;
            }
            $tmp['detail']=implode('|', $text);
            $variable1 = $html1->find('div.owl-carousel', 0);
            $tmp3=array();
            $caption=array();
            foreach ($variable1->find('div.item') as $value1) {
                $tmp3[] = $value1->find('a', 0)->href;
                $caption[]=$value1->find('p', 0)->plaintext;
            }
            $tmp['slide']=$tmp3;
            $tmp['caption']=$caption;
            $result[]=$tmp;
        }
        return $result;
    }
}
/* End of file My_sentmail.php */
/* Location: ./application/libraries/My_sentmail.php */
?>