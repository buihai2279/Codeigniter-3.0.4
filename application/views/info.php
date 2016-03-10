<?php 
$list_img=explode('|',$result->link);
$list_caption=explode('|',$result->caption);
// print_r($list_img);
// print_r($list_caption);
?>

<div class="col-lg-8 col-md-8 box_slide">       
    <div id="owl-demo" class="owl-carousel owl-theme">
    <?php foreach ($list_img as $key => $value): ?>
    <div class="item">
        <a href="">
            <img src="<?php echo $value?>" class="img-responsive" alt="The Last of us">
        </a>
        <p class="description text-center">
            <a href=""><?php echo $list_caption[$key]; ?></a>
        </p>
    </div>
    <?php endforeach ?>
    </div>
</div>
<div class="clearfix"></div>
<div class="panel panel-pro">
<div class="panel-heading  navbar-default heading-cate">
<div class="navbar-header">
        <button type="button" class="navbar-toggle button_menu" data-toggle="collapse" data-target=".nav-tittle">
    <span class="icon-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </span>
</button>
        <a href="#" class="navbar-brand">Dien thoai</a>
</div>
<div class="navbar-collapse collapse nav-tittle">
        <ul class="nav navbar-nav">
                <li><a href="#">Dien thoai</a></li>
                <li><a href="#">Dien thoai</a></li>
                <li><a href="#">Dien thoai</a></li>
                <li><a href="#">Dien thoai</a></li>
        </ul>
</div>
</div>
<div class="panel-body product" >
<!-- result -->
<div class="col-sm-6 col-md-3 ">
        <div class="well text-center well-sm">
                <div class="info">
                        <img src="<?php echo base_url('bootstrap')?>/images/6.png" class="img-responsive " alt="">
                                <span class="text-left">
                                        <ul>
                                                <li>Ram</li>
                                                <li>Man hinh</li>
                                                <li>CPU</li>
                                                <li>Bo nho trong</li>
                                                <li>Chip</li>
                                        </ul>
                                </span>
                </div>
                <div class="detail">
                        <h2 href="#" class="name "><a  href="#">Samsung Galaxy A8</a></h2>
                        <hr>
                        <i class="price pull-left">10.990.000 ₫</i>
                        <a href="#" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                        
                </div>
        </div>
</div>
<div class="col-sm-6 col-md-3 ">
    <div class="well text-center well-sm">
        <div class="info">
            <img src="<?php echo base_url('bootstrap')?>/images/6.png" class="img-responsive " alt="">
                <span class="text-left">
                    <ul>
                        <li>Ram</li>
                        <li>Man hinh</li>
                        <li>CPU</li>
                        <li>Bo nho trong</li>
                        <li>Chip</li>
                        </ul>
                </span>
        </div>
        <div class="detail">
            <h2 href="#" class="name "><a  href="#">Samsung Galaxy A8</a></h2>
            <hr>
            <i class="price pull-left">10.990.000 ₫</i>
            <a href="#" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                    
        </div>
    </div>
</div>
</div>
</div>
