<script src="<?php echo base_url('bootstrap')?>/js/owl.carousel.min.js"></script>
<link href="<?php echo base_url('bootstrap')?>/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url('bootstrap')?>/css/owl.theme.css" rel="stylesheet">
<link href="<?php echo base_url('bootstrap')?>/css/owl.transitions.css" rel="stylesheet">
<div class="row1">
<div class="col-lg-8 col-md-8 box_slide">       
    <div id="slide-home" class="owl-carousel owl-theme">
      <div class="item"><a href=""><img src="<?php echo base_url('bootstrap')?>/images/fullimage1.jpg" class="img-responsive" alt="The Last of us"></a>
            <p class="description text-center"><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></p>
      </div>
      <div class="item"><a href=""><img src="<?php echo base_url('bootstrap')?>/images/fullimage2.jpg" class="img-responsive" alt="The Last of us"></a>
            <p class="description text-center"><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></p>
      </div>
      <div class="item"><a href=""><img src="<?php echo base_url('bootstrap')?>/images/fullimage3.jpg" class="img-responsive" alt="The Last of us"></a>
            <p class="description text-center"><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></p>
      </div>
    </div>
</div>
<div class="clearfix hidden-lg hidden-md"></div>
    <div class="panel col-lg-4 col-md-4 news">
      <div class="panel-heading heading-news">
        <h3 class="panel-title"><a href="">Tin tuc</a></h3>
      </div>
      <div class="panel-body">
               <ul>
                    <li><a href="#">Tin tuc 1</a></li>
                    <li><a href="#">Tin tuc 2</a></li>
                    <li><a href="#">Tin tuc 3</a></li>
              </ul>
      </div>
    </div>
</div>
    <div class="clearfix"></div>

        <div class="panel panel-pro bg_img">
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

<?php foreach ($result as $value): ?>
<div class="col-sm-6 col-md-3 ">
    <div class="well text-center well-sm">
        <div class="info">
            <img src="<?php echo $value['img'] ?>" class="img-responsive " alt="">
                <span class="text-left">
                    <ul>
                        <?php $tmp= explode('|', $value['description']);
                        foreach ($tmp as  $val) {
                             echo "<li>$val</li>";
                         } ?>
                    </ul>
                </span>
        </div>
        <div class="detail">
            <h2 href="#" class="name "><a  href="#"><?php echo $value['name'] ?></a></h2>
            <hr>
            <i class="price pull-left"><?php echo $value['price']  ?>₫</i>
            <a href="#" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
        </div>
    </div>
</div>


<?php endforeach ?>
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
