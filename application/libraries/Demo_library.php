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
    public function Get_xml($link)
    {
        include 'simple_html_dom.php';
        $html     = file_get_html($link);
        $variable = $html->find('ul.mobilecate', 0);
        foreach ($variable->find('li') as $value) {
            $tmp2 = $value->find('a strong', 0)->plaintext;
            $tmp1 = $value->find('a img', 0)->src;
            if ($tmp1 != 'https://cdn2.tgdd.vn/v2015/Content/desktop/images/bgtran.png' && $tmp2 != 0) {
                $tmp['src']   = $tmp1;
                $price = $value->find('a strong', 0)->plaintext;
                $price      = str_replace('.', '',$price );
                $tmp['price'] = str_replace('₫', '', $price);
                $tmp['href']= $value->find('a',0)->href;
                $html1     = file_get_html('https://www.thegioididong.com'.$tmp['href']);
                $variable1 = $html1->find('div.owl-carousel', 0);
                $tmp3=array();
                $caption=array();
                $text='';
                foreach ($variable1->find('div.item') as $value1) {
                    $tmp3[] = $value1->find('a', 0)->href;
                    $caption[]=trim($value1->find('p', 0)->plaintext);
                }
                $tmp['link']=$tmp3;
                $tmp['caption']=implode('|', $caption);
                $var3= $html1->find('ul.parameter', 0);
                $text=array();
                foreach ($var3->find('li') as $val3) {
                    $text[]= $val3->find('span',0)->plaintext.' '.$val3->find('div',0)->plaintext;
                }
                $tmp['detail']=implode('|', $text);
                $tmp['name']  = $value->find('figure.bginfo h3', 0)->innertext;
                $tmp['des']   = array();
                $tex1 = $value->find('figure.bginfo span', 0)->innertext;
                if (strlen($tex1)>40) {
                    continue;
                }else {
                    $tmp['des'][] = $value->find('figure.bginfo span', 0)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 1)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 2)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 3)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 4)->innertext;
                }
                $tmp['description']=implode('|', $tmp['des']);
                $tmp['category_id']='1';
                $arr[]        = $tmp;
            }
        }
        return $arr;
    }
    public function Get_laptop()
    {
        include 'simple_html_dom.php';
        $html     = file_get_html('file:///F:/Xampp/htdocs/ex.html');
        $tmp=array();
        $tmp['name']=$html->find('ul.laptopcate li a h3',0)->plaintext;
        $tmp['price']=$html->find('ul.laptopcate li a strong', 0)->plaintext;
        $tmp['slug']=$html->find('ul.laptopcate li a', 0)->href;
        $tmp['img']=$html->find('ul.laptopcate li a img', 0)->src;
        $info=$html->find('ul.laptopcate li figure.bginfo', 0);
        foreach ($info->find('span') as $value) {
            $span[]=$value->plaintext;
        }
        $tmp['info']=implode('|', $span);
        $html1     = file_get_html('https://www.thegioididong.com'.$tmp['slug']);
        return $variable1 = $html1->find(' div#own-demo div.item', 0)->plaintext;




        // return $tmp; 
        // foreach ($variable->find('li') as $value) {
        //     $tmp['slug']=$value->find('a',0)->href;
        //     $info=$value->find('figure.bginfo');
        //     foreach ($info->find('span') as $val) {
        //         $tmp['info'].=$val;
        //     }
        //     return $tmp;
        //     break;
        // }
    }
}

/* End of file My_sentmail.php */
/* Location: ./application/libraries/My_sentmail.php */
?>
<!-- HP Stream 13 N2840/2GB/32GB/Win8.1/Xanh
<li class="notbuy">
    <a href="/laptop/hp-stream-13" title="HP Stream 13 N2840">
        <img width="150" height="150" src="https://cdn1.tgdd.vn/Products/Images/44/72316/hp-stream-13-200x200.jpg">
        <h6 class="textkm">Hết hàng tạm thời</h6>                
        <h3>HP Stream 13 N2840</h3>
        <strong>4.990.000₫</strong>
    </a>
    <figure class="bginfo">
        <span>Màn hình: 13.3”, 1366x768</span>
        <span>CPU: Intel Celeron, 2.16GHz</span>
        <span>RAM: 2GB/ HDD: 32GB eMMC</span>
        <span>VGA: Intel HD Graphics</span>
        <span>HĐH: Windows 8.1 Bing</span>
        <span>Pin: 3 cell/ DVD: Không</span>
    </figure>
</li>
<li >
    <a href="/laptop/acer-es1-311-n2840-2gb-500gb-win81" title="Acer ES1 311 N2840/2GB/500GB/Win8.1">
        <img width="150" height="150" src="https://cdn3.tgdd.vn/Products/Images/44/74398/acer-es1-311-n2840-2gb-500gb-win81-300-200x200.jpg" />
        <h3>Acer ES1 311 N2840/2GB/500GB/Win8.1</h3>
        <strong>5.490.000₫</strong>
        <div class="km">
            <span>Tặng Chuột không dây</span>                            
            <span>Tặng USB 8GB</span>                            
        </div>
    </a>
    <a href="/them-vao-gio-hang?ProductId=74398" class="buy">Mua</a>    
    <figure class="bginfo">
        <span>Màn hình: 14”, 1366x768</span>
        <span>CPU: Intel Celeron, 2.16GHz</span>
        <span>RAM: 2GB/ HDD: 500GB</span>
        <span>VGA: Intel HD Graphics</span>
        <span>HĐH: Windows 8.1 Bing</span>
        <span>Pin: 3 cell/ DVD: Không</span>
    </figure>
</li>
 -->