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
                        $('#content_cart').html(result);
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


            

    <div class="col-md-8 box_slide">    
        <h3 class="text-center">Điểm nổi bật</h3>
        <hr>
        <div id="slide-info" class="owl-carousel owl-theme">
            <?php foreach ($list_img as $key => $value): ?>
            <div class="item">
                <a href="">
                    <img src="<?php echo $value?>" class="img-responsive img-rounded" alt="The Last of us">
                </a>
                <p class="description text-center">
                    <a href=""><?php echo $list_caption[$key]; ?></a>
                </p>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="visible-xs"><br><div class="clear-fixed"></div><hr></div>
    <div class="col-md-4 list_parameter">
        <h3 class="text-center">Thông số kỹ thuật</h3>
        <hr>
        <table>
        <?php 
        $array=explode('|',$result->detail);
        foreach ($array as $value) {
            $tmp=explode(':', $value)
            ?>
           <tr>
               <td class="left_parameter"><?php echo $tmp['0']?></td>
               <td><?php echo $tmp['1']?></td>
           </tr>
            <?php        
             } 
        ?>
        </table>
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
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kykU9rgmtLs"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/l60E4njGGn8"></iframe>
                </div>
            </div>
      </div>
    </div>
  </div>

<div class="clearfix"></div>

    <div class="col-md-6"><div class="fb-comments" data-href="<?php echo current_url()?>" data-numposts="4" width='100%'></div></div>
    <div class="col-md-6">Video Suggest</div>
    

<div class="clearfix"></div>
<form>
    <input type="text" id="id_name" hidden="hidden" value="<?php echo $result->id?>">
    <input type="text" id="name" hidden="hidden" value="<?php echo $result->name?>">
    <input type="text" id="price" hidden="hidden" value="<?php echo $result->price?>">
    <input type="text" id="img" hidden="hidden" value="<?php echo $result->img?>">
    <input type="text" id="qty" hidden="hidden" value="1">
</form>

<div class="modal fade" id="add_cart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body" id="content_cart">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
