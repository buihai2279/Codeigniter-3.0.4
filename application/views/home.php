<script src="<?php echo base_url('bootstrap')?>/js/owl.carousel.min.js"></script>
<link href="<?php echo base_url('bootstrap')?>/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url('bootstrap')?>/css/owl.theme.css" rel="stylesheet">
<link href="<?php echo base_url('bootstrap')?>/css/owl.transitions.css" rel="stylesheet">
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
<div class="row1">
<div class="col-lg-8 col-md-8 box_slide">       
    <div id="slide-home" class="owl-carousel owl-theme">
      <?php foreach ($slide as $value) { ?>
        <div class="item">
        <img src="<?php echo $value['img']?>" class="img-responsive" alt="<?php echo $value['caption']?>" style='max-height: 300px'>
              <p class="description text-center">
              <a href="<?php echo base_url().$value['link'];?>"><?php echo $value['caption']?></a>
              </p>
        </div>
      <?php 
      } ?>
    </div>
</div>
<div class="clearfix hidden-lg hidden-md"></div>
  <div class="panel col-lg-4 col-md-4 news">
    <div class="panel-heading heading-news">
      <h3 class="panel-title"><a href="">Tin tuc</a></h3>
    </div>
    <div class="panel-body">
             <ul>
             <?php foreach ($news as $value) { ?>
                <li><a href="#" data-value="<?php echo $value['id']?>" class="news_view">
                  <?php echo $value['title']; ?>
                </a></li>
            <?php } ?>
            </ul>
            <?php if (count($news)==0) {
              echo "Không có tin tức";
            } ?>
    </div>
  </div>
<script>
    $(document).ready(function() {
        $( ".news_view" ).click(function() {
            var id=$(this).attr("data-value");
            $.ajax({
                    type : "post",
                    data : {
                                id : id,
                            },
                    dateType:"text",
                    url: "<?php echo base_url('news/view')?>",
                    success: function(result){
                        $('#content_news').html(result);
                        $('#modal_news').modal('show');
                    }
            });
    });
        
});
</script>
  <div class="modal fade" id="modal_news">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body" id ='content_news'style="overflow: hidden;">
        </div>
      </div>
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
                            <a href="<?php echo base_url('dtdd')?>" class="navbar-brand">Điện thoại</a>
                        </div>
                        <div class="navbar-collapse collapse nav-tittle">
                            <ul class="nav navbar-nav">
                                <?php 
                                $query=$this->db->get_where('category',array('parrent_id' => 1),4,0);
                                  $result=$query->result_array();
                                  foreach ($result as $value) {
                                    echo '<li><a href="'.$value['slug'].'">'.$value['name'].'</a></li>';
                                  }
                                  ?>
                            </ul>
                        </div>
                </div>
                <div class="panel-body product" >
                        <!-- result -->
              <?php foreach ($mobie as $value): ?>
              <div class="col-sm-6 col-md-3" style='height: 320px'>
                  <div class="well text-center well-sm">
                      <div class="info">
                          <img src="<?php echo $value['img'] ?>" class="img-responsive" alt="">
                          <?php if ($value['description']!='') {
                            ?>
                              <span class="text-left">
                                  <ul>
                                      <?php $tmp= explode('|', $value['description']);
                                      foreach ($tmp as  $val) {
                                           echo "<li class='line_height'>$val</li>";
                                       } ?>
                                  </ul>
                              </span>
                            <?php 
                          } ?>
                      </div>
                      <div class="detail">
                          <h2 class="name"><a href="<?php echo base_url('dtdd/'.$value['slug'])?>"><?php echo $value['name'] ?></a></h2>
                          <hr>
                          <i class="price pull-left"><?php echo $value['price'] ?>₫</i>
                          <a href="<?php echo base_url('dtdd/'.$value['slug'])?>" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                      </div>
                  </div>
              </div>
              <?php endforeach ?>
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
                            <a href="<?php echo base_url('dtdd')?>" class="navbar-brand">Laptop</a>
                        </div>
                        <div class="navbar-collapse collapse nav-tittle">
                            <ul class="nav navbar-nav">
                                <?php 
                                $query=$this->db->get_where('category',array('parrent_id' => 2),4,0);
                                  $result=$query->result_array();
                                  foreach ($result as $value) {
                                    echo '<li><a href="'.$value['slug'].'">'.$value['name'].'</a></li>';
                                  }
                                  ?>
                            </ul>
                        </div>
                </div>
                <div class="panel-body product" >
                        <!-- result -->
              <?php foreach ($laptop as $value): ?>
              <div class="col-sm-6 col-md-3" style='height: 320px'>
                  <div class="well text-center well-sm">
                      <div class="info">
                          <img src="<?php echo $value['img'] ?>" class="img-responsive" alt="">
                          <?php if ($value['description']!='') {
                            ?>
                              <span class="text-left">
                                  <ul>
                                      <?php $tmp= explode('|', $value['description']);
                                      foreach ($tmp as  $val) {
                                           echo "<li class='line_height'>$val</li>";
                                       } ?>
                                  </ul>
                              </span>
                            <?php 
                          } ?>
                      </div>
                      <div class="detail">
                          <h2 class="name"><a href="<?php echo base_url('dtdd/'.$value['slug'])?>"><?php echo $value['name'] ?></a></h2>
                          <hr>
                          <i class="price pull-left"><?php echo $value['price'] ?>₫</i>
                          <a href="<?php echo base_url('dtdd/'.$value['slug'])?>" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                      </div>
                  </div>
              </div>
              <?php endforeach ?>
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
                            <a href="<?php echo base_url('dtdd')?>" class="navbar-brand">Tablet</a>
                        </div>
                        <div class="navbar-collapse collapse nav-tittle">
                            <ul class="nav navbar-nav">
                                <?php 
                                $query=$this->db->get_where('category',array('parrent_id' => 3),4,0);
                                  $result=$query->result_array();
                                  foreach ($result as $value) {
                                    echo '<li><a href="'.$value['slug'].'">'.$value['name'].'</a></li>';
                                  }
                                  ?>
                            </ul>
                        </div>
                </div>
                <div class="panel-body product" >
                        <!-- result -->
              <?php foreach ($tablet as $value): ?>
              <div class="col-sm-6 col-md-3" style='height: 320px'>
                  <div class="well text-center well-sm">
                      <div class="info">
                          <img src="<?php echo $value['img'] ?>" class="img-responsive" alt="">
                          <?php if ($value['description']!='') {
                            ?>
                              <span class="text-left">
                                  <ul>
                                      <?php $tmp= explode('|', $value['description']);
                                      foreach ($tmp as  $val) {
                                           echo "<li class='line_height'>$val</li>";
                                       } ?>
                                  </ul>
                              </span>
                            <?php 
                          } ?>
                      </div>
                      <div class="detail">
                          <h2 class="name"><a href="<?php echo base_url('dtdd/'.$value['slug'])?>"><?php echo $value['name'] ?></a></h2>
                          <hr>
                          <i class="price pull-left"><?php echo $value['price'] ?>₫</i>
                          <a href="<?php echo base_url('dtdd/'.$value['slug'])?>" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                      </div>
                  </div>
              </div>
              <?php endforeach ?>
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
                            <a href="<?php echo base_url('dtdd')?>" class="navbar-brand">Phụ kiện</a>
                        </div>
                        <div class="navbar-collapse collapse nav-tittle">
                            <ul class="nav navbar-nav">
                                <?php 
                                $query=$this->db->get_where('category',array('parrent_id' => 4),4,0);
                                  $result=$query->result_array();
                                  foreach ($result as $value) {
                                    echo '<li><a href="'.$value['slug'].'">'.$value['name'].'</a></li>';
                                  }
                                  ?>
                            </ul>
                        </div>
                </div>
                <div class="panel-body product" >
                        <!-- result -->
              <?php foreach ($phukien as $value): ?>
              <div class="col-sm-6 col-md-3" style='height: 320px'>
                  <div class="well text-center well-sm">
                      <div class="info">
                          <img src="<?php echo $value['img'] ?>" class="img-responsive" alt="">
                          <?php if ($value['description']!='') {
                            ?>
                              <span class="text-left">
                                  <ul>
                                      <?php $tmp= explode('|', $value['description']);
                                      foreach ($tmp as  $val) {
                                           echo "<li class='line_height'>$val</li>";
                                       } ?>
                                  </ul>
                              </span>
                            <?php 
                          } ?>
                      </div>
                      <div class="detail">
                          <h2 class="name"><a href="<?php echo base_url('dtdd/'.$value['slug'])?>"><?php echo $value['name'] ?></a></h2>
                          <hr>
                          <i class="price pull-left"><?php echo $value['price'] ?>₫</i>
                          <a href="<?php echo base_url('dtdd/'.$value['slug'])?>" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                      </div>
                  </div>
              </div>
              <?php endforeach ?>
                  </div>
              </div>
