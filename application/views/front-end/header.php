<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo (isset($title)) ? $title.' - '.$this->title_main : $this->title_main; ?></title>
        <meta content="INDEX,FOLLOW" name="robots"/>
		<meta name="title" content="<?php echo (isset($description)) ? $description.' - '.$this->description_main : $this->description_main; ?>" />
        <meta name="copyright" content="Website thương mại điện tử" />
	    <meta name="description" content="<?php echo (isset($title)) ? $title.' - '.$this->title_main : $this->title_main; ?>" />
	    <meta name="keywords" content="điện thoại di dộng, máy tính bảng" />
		<meta name="copyright" content="Nhóm 5 : Nguyễn Trang,Trần Lộc, Bùi Hải">
		<meta name="author" content="PHP Team 5">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/font-awesome.min.css">
		<script src="<?php echo base_url('bootstrap')?>/js/jquery.min.js"></script>
        <script src="<?php echo base_url('bootstrap')?>/js/bootstrap.min.js"></script>
	</head>
<body>
<div class="container-fluid">
    <header class="row">
        <br class="hidden-xs">
        <div class="col-md-3 col-lg-2 col-sm-3 col-xs-8 col-xs-offset-2 col-sm-offset-0">
            <a href="<?php echo base_url()?>"><img class="img-responsive" src="<?php echo base_url('bootstrap')?>/images/logo.png" alt="Logo"></a>
        </div>
        <div class="col-md-7 col-lg-7 col-xs-12 col-sm-6">
            <form action="<?php echo base_url('home/Search_product'); ?>" method='GET'>
            <div class="input-group search-box ">
                <input type="text" name='search' class="form-control search-input" placeholder="Search for...">
                <span class="input-group-btn">
                    <input class="btn search-button btn-info" type="submit" >Search!</button>
                </span>
            </div>
            </form>
        </div>
        <div class="col-md-2 col-lg-2 col-xs-6 col-sm-2 cart">
            <button type="button" class="btn btn-info col-xs-12 col-md-12 col-lg-7" id="cart_list">
                <span><i class="fa fa-cart-plus"></i> Giỏ hàng</span> 
                <span class="badge" id="count_cart">
                <?php if(isset($_SESSION['cart_contents']))
                    echo ' '.count($this->cart->contents()).' ';
                    else echo 0;
                 ?></span>
            </button>
        </div>
<div class="modal fade" id="modal_cart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="content_list_cart">
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#cart_list').click(function(){
        $.ajax({
                dateType:"text",
                url: "<?php echo base_url('home/cart_detail')?>",
                success: function(result){
                    $('#content_list_cart').html(result);
                    $('#modal_cart').modal('show');
                }
            });
    })
    $('#history').click(function(){
        $.ajax({
                dateType:"text",
                url: "<?php echo base_url('home/history')?>",
                success: function(result){
                    $('#content_history').html(result);
                    $('#history_modal').modal('show');
                }
            });
    })

});
</script>
    <div class="navbar no_margin" role="navigation">
        <div class="navbar-header">
            <div class="col-xs-6">
                <button type="button" class=" col-xs-12 navbar-toggle button_menu" data-toggle="collapse" data-target=".menutop">
                    <span class="icon-toggle pull-left">Menu</span>
                    <i class="glyphicon glyphicon-list pull-right"></i>
                </button>
            </div>
        </div>
    <div class="col-md-12 col-xs-12 collapse navbar-collapse menutop ">
        <ul class="nav navbar-nav">
            <li class="list_menu">
                <a class='item_menu'class="dropdown-toggle" data-toggle="dropdown">
                Danh mục sản phẩm <i class="glyphicon glyphicon-chevron-down"></i></a>
                <ul class="dropdown-menu sub-menu" >
                <?php foreach ($menu as $value) {
                    ?>
                    <li><a href="<?php echo $value['slug']?>"><?php echo $value['name']?></a></li>
                    <?php 
                } ?>
                </ul>
            </li>
            <li class="list_menu"><a class='item_menu' href="<?php echo base_url('san-pham-moi') ?>">Sản phẩm mới</a></li>
            <li class="list_menu"><a class='item_menu' href="<?php echo base_url('ban-chay') ?>">Bán chạy</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
                <?php if (isset($_SESSION['login'])) {
                    ?>
            <li class="list_menu">
                <a id="dLabel" class="item_menu" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['mail'];?>
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu sub-menu" aria-labelledby="dLabel">
                    <?php if($_SESSION['level']>0){
                        ?>
                        <li><a href="<?php echo base_url('admin')?>">Vào trang quản trị</a></li>
                        <?php 
                        } ?>
                    <li><a href="<?php echo base_url('auth/change_password')?>">Đổi mật khẩu</a></li>
                    <li id="history"><a>Lịch sử mua hàng</a></li>
                    <li><a href="<?php echo base_url('auth/logout')?>">Đăng xuất</a></li>
                </ul>
            </li>
            <div class="modal fade" id="history_modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body" id="content_history">
                        </div>
                    </div>
                </div>
            </div>
               <?php  }else{
                ?>
                <li class="list_menu"><a class='item_menu' href="<?php echo base_url('auth')?>">Đăng ký / Đăng Nhập</a></li>
            <?php
                } ?>
        </div><!-- /end menu -->
    </div>
    <!-- . Navbar -->
    </header>
<?php
if (isset($_SESSION['message_tmp'])) {
echo $_SESSION['message_tmp'];
}
?>