<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Techshop.com.vn - ĐTDD, Laptop, Máy tính bảng </title>
		<meta name="title" content="Amazon.com.vn - ĐTDD, Laptop," />
	    <meta name="description text-center" content="Hàng 100% chính hãng được phân p   " />
	    <meta name="keywords" content="điện thoại di dộng, máy tính bảng,  " />
		<meta name="copyright" content="Nhóm 5 : Nguyễn Trang,Trần Lộc, Bùi Hải">
		<meta name="author" content="PHP Team 5">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url('bootstrap')?>/css/style.css">
		<script src="<?php echo base_url('bootstrap')?>/js/jquery.min.js"></script>
		<script src="<?php echo base_url('bootstrap')?>/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#slide-home").owlCarousel({
				      // navigation : true, // Show next and prev buttons
				      slideSpeed : 400,
				      autoPlay: 5500,
				      lazyLoad : true,
				      paginationSpeed : 5000,
				      paginationNumbers: true,
				      stopOnHover : true,
                      autoHeight : true,
				      transitionStyle: "backSlide",
				      // navigationText : ["Trước","Tiếp"],
				      singleItem:true,
				});
			});
		</script>
	</head>
<body>
<div class="container-fluid">
    <header class="row">
        <br class="hidden-xs">
        <div class="col-md-3 col-lg-2 col-sm-3 col-xs-8 col-xs-offset-2 col-sm-offset-0">
            <img class="img-responsive" src="<?php echo base_url('bootstrap')?>/images/logo.png" alt="Logo">
        </div>
        <div class="col-md-7 col-lg-7 col-xs-12 col-sm-6">
            <div class="input-group search-box ">
                <input type="text" class="form-control search-input" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn search-button btn-info" type="button">Search!</button>
                </span>
            </div>
        </div>
            <div class="col-md-2 col-lg-2 col-xs-6 col-sm-2 cart">
            <button type="button" class="btn btn-info col-xs-12 col-md-12 col-lg-7"  data-toggle="modal" data-target="#cart">
                <i class="glyphicon glyphicon-shopping-cart"></i> 5 Giỏ hàng
            </button>
            </div>
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
                        Danh muc san pham <i class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul class="dropdown-menu sub-menu" >
                            <li><a href=" ">Category 1</a></li>
                            <li><a href=" ">Category 2</a></li>
                            <li><a href=" ">Category 3</a></li>
                        </ul>
                    </li>
                    <li class="list_menu"><a class='item_menu' href="">San pham moi</a></li>
                    <li class="list_menu"><a class='item_menu' href="">Khuyen mai</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right ">
                    <li class="list_menu"><a class='item_menu'data-toggle="modal" data-target="#myModal2" href="">Đăng ký / Đăng Nhập</a></li>
                </ul>
                    </div><!-- /end menu -->
            </div>
            <!-- . Navbar -->
            </header>
<?php
if (isset($_SESSION['message_tmp'])) {
echo $_SESSION['message_tmp'];
}
?>