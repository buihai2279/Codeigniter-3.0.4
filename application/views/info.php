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
?>
    <div class="col-lg-12 box_info" style="background: #fff;" >
        <div class="clearfix"></div><hr>
        <div class="col-md-6">
        <br>
        <img src="<?php echo $result->img ?>" class='img-responsive center-block' alt="<?php echo $result->name?>">
        <br>
        </div>
        <div class="col-md-6">
            <h1><strong><?php echo $result->name?></strong></h1>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=868245903223472";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like" data-href="<?php echo current_url() ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" width='200px'></div>
            <h3 class="text-danger"><?php echo number_format($result->price)?></h3>
            <ul>
                <li class="text-primary">Giao hàng trong 30 phút, đổi trả 1 tháng (nếu lỗi).</li>
                <li class="text-primary">Gọi đặt mua :  08.38102102 (7:30 - 22:00)</li>
                <li class="text-primary">Bảo hành chính hãng 12 tháng.</li>
            </ul>
            <button type="button" class="btn btn-info" id='cart'><i class="fa fa-cart-arrow-down"></i> Add to cart</button>
        </div>
        <div class="clearfix"></div><hr>
    </div>
<script>
    $(document).ready(function() {
        $( "#cart" ).click(function() {
            var id=$('#id_name').val();
            var name=$('#name').val();
            var price=$('#price').val();
            var img=$('#img').val();
            $.ajax({
                    type : "post",
                    data : {
                                id : id,
                                qty : 1,
                                price : price,
                                name : name,
                                img : img
                            },
                    dateType:"text",
                    url: "<?php echo base_url('home/Add_to_cart')?>",
                    success: function(result){
                        $('#noti_cart').html(result);
                        $('#add_cart').modal('show');
                    }
            });
            $.ajax({
                    type : "post",
                    dateType:"text",
                    url: "<?php echo base_url('home/count_cart')?>",
                    success: function(result){
                        $('#count_cart').html(result);
                    }
            });
    });
});
</script>
<div class="modal fade" id="add_cart">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="noti_cart">
            </div>
        </div>
    </div>
</div>

    <div class="col-md-8 box_slide">    
        <h3 class="text-center">Điểm nổi bật</h3>
        <hr>

        <?php if ($result->slide!='') {
            $list_img=explode('|',$result->slide);
           ?>
                <div id="slide-info" class="owl-carousel owl-theme">
                    <?php foreach ($list_img as $key => $value): ?>
                    <div class="item">
                            <img src="<?php echo $value?>" class="img-responsive img-rounded">
                        <?php if(trim($result->caption)!=''){ ?>
                        <p class="description text-center">
                            <?php 
                            $list_caption=explode('|',$result->caption); 
                            echo $list_caption[$key];
                            ?>
                        </p>
                        <?php } ?>
                    </div>
                    <?php 
                    endforeach ?>
                </div>
           <?php 
        } else {
            echo "Không có slide";
        }
         ?>
    </div>

    <div class="visible-xs"><br><div class="clear-fixed"></div><hr></div>
    <div class="col-md-4 list_parameter">
        <h3 class="text-center">Thông số kỹ thuật</h3>
        <hr><p>
        <?php 
        if (trim($result->detail)!='') {
             echo $result->detail;
        } else {
            echo "Đang cập nhật";
        }
        ?></p>
    </div>
    <script>
    $(document).ready(function() {
        $('#collapseExample').collapse('show');
    });
    </script>
    <div class="clearfix"></div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Video Review
        </a>
    </div>

    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/23lDcWLW45M"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0I7vbYCVkj4"></iframe>
                </div>
            </div>
      </div>
    </div>
  </div>

<div class="clearfix"></div>

    <div class="col-md-6"><div class="fb-comments" data-href="<?php echo current_url()?>" data-numposts="4" width='100%'></div></div>
    <div class="col-md-5">
        <h3>Sản phẩm có thể bạn quan tâm</h3>
        <?php foreach ($suggest as $value) {
            ?>
        <div class="box_suggest">
            <div class="col-sm-3 col-xs-10">
                <a href="<?php echo base_url('dtdd').'/'.$value['slug']?>">
                <img class="media-object img-responsive" src="<?php echo $value['img']?>">
                </a> 
            </div> 
            <div class="col-sm-8 col-xs-12"> 
                <h4><a href="<?php echo base_url('dtdd').'/'.$value['slug']?>"><?php echo $value['name']?></a></h4>
                <p><span class="text-danger"><?php echo number_format($value['price'])?> VND</span><br>
                <?php echo str_replace('|', ', ', $value['description'])?></p>
            </div>
        </div>
            <?php 
        } ?>
    </div>
   <div class="clearfix"></div><hr>
   <h3 style="text-align: center">Sản phẩm cùng chuyên mục</h3>
   <?php foreach ($suggest as $key => $value) {
       ?>
   <div class="col-md-2 col-sm-5 block-center box_suggest" style="text-align: center;overflow: hidden;height: 240px">
        <img src="<?php echo $value['img']?>" class="img-responsive" style="height: 150px"><div class="clearfix">
        </div>
        <a href="<?php echo base_url('dtdd').'/'.$value['slug']?>">
        <?php echo $value['name']?>
        </a><br>
        <span class="text-danger"><?php echo number_format($value['price'])?></span>
    </div>
       <?php 
   } ?>

<div class="clearfix"></div>
<form>
    <input type="text" id="id_name" hidden="hidden" value="<?php echo $result->id?>">
    <input type="text" id="name" hidden="hidden" value="<?php echo $result->name?>">
    <input type="text" id="price" hidden="hidden" value="<?php echo $result->price?>">
    <input type="text" id="img" hidden="hidden" value="<?php echo $result->img?>">
    <input type="text" id="qty" hidden="hidden" value="1">
</form>

