<script src="<?php echo base_url('bootstrap')?>/js/owl.carousel.min.js"></script>
<link href="<?php echo base_url('bootstrap')?>/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url('bootstrap')?>/css/owl.theme.css" rel="stylesheet">
<link href="<?php echo base_url('bootstrap')?>/css/owl.transitions.css" rel="stylesheet">
<script>
    $(document).ready(function() {
      $("#slide-info").owlCarousel({
        autoPlay : 3000,
        stopOnHover : true,
        paginationNumbers: true,
        paginationSpeed : 1000,
        goToFirstSpeed : 2000,
        singleItem : true,
        autoHeight : true,
        transitionStyle:"fade"
      });
});
</script>
<style>
    #slide-info .item img{
    display: block;
    width: 100%;
    height: auto;
}
</style>
<?php 
$list_img=explode('|',$result->link);
$list_caption=explode('|',$result->caption);
?>
    <div class="row">
        <h1><?php echo $result->name ?></h1><h3><?php echo $result->price; ?></h3>
    </div>
    
    <div class="col-md-8 box_slide">       
        <div id="slide-info" class="owl-carousel owl-theme">
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
    <div class="col-md-4">
        <h3>Thông số kỹ thuật</h3>
        <?php echo $result->detail; ?>
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
