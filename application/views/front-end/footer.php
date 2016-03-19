<script type="text/javascript">
    $(document).ready(function(){
        $( "#submit" ).click(function() {
            var mail = $('#re_mail').val();
            $.ajax({
                type : "post",
                data : {
                            mail : mail
                        },
                dateType:"text",
                url: "<?php echo base_url('list_mail/add')?>",
                success: function(result){
                	if (result=='Thao tác thành công') {
						$('#result_mail').html('<div class="alert alert-success" style="margin:0">'+result+'</div>');
                	}else{
	                    $('#modal_body').html('<div class="text-danger text-center">'+result+'</div>');
	                    $('#modal').modal('show');
	                    setTimeout(function(){
			              $('#modal').modal('hide');
			            }, 2000);
                	}
                }
            });
        });
    });
</script>
<footer>
	<div class="row"><br>
		<div class="col-md-6 col-md-offset-2" id="result_mail">
			<div class="form-inline ">
				<!-- <div class="form-group"> -->
				    <label>Đăng kí nhận KM: </label>
				    <input type="text" class="form-control" id="re_mail" placeholder="Email của bạn....">
				    <button type="input" class="btn btn-info" id="submit">Submit</button>
			    <!-- </div> -->
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-md-6 col-sm-6 col-lg-3 col-xs-6">
		<ul>
			<li><a href="">TechShop.vn</a></li>
			<li><a href="">Giới thiệu</a></li>
			<li><a href="<?php echo base_url('lien-he')?>">Liên Hệ </a></li>
			<li><a href="">Trợ giúp </a></li>
		</ul></div>
		<ul class="col-md-6 col-sm-6 col-lg-3 col-xs-6">
			<li><a href="">Dịch vụ & Hỗ trợ</a></li>
			<li><a href="">Hướng dẫn mua hàng </a></li>
			<li><a href="">Thanh toán</a></li>
			<li><a href="">Chính sách  </a></li>
		</ul>
		<h6 class="col-md-6 col-sm-6 col-lg-3 col-xs-12">
			<span>Chứng nhận website TMDT</span>
			<img src="<?php echo base_url('bootstrap')?>/images/certify.png" alt="">
		</h6>
		<div class="col-md-6 col-sm-6 col-lg-3 col-xs-12">			
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/facebook&amp;width=240&amp;colorscheme=light&amp;show_faces=true&amp;connections=9&amp;stream=false&amp;header=false&amp;height=250" frameborder="0" scrolling="no" style="border: medium none; overflow: hidden; height: 250px; width: 240px;background:#fff;"></iframe>
		</div> 
		<div class="clear-fixed"></div>
			<h6 class="col-md-12">
				<span>© 2015. Công ty ABC
				Địa chỉ : Cầu Giấy - Hà Nội <a href="#"><i class="glyphicon glyphicon-map-marker"></i>  Bản đồ đường đi</a>
				GPĐKKD số 123 do Sở KHĐT TP.Hà Nội cấp ngày 01/01/2015</span>
			</h6>
	</div>
</footer>
</div><!-- .wrapper -->
</body>
</html>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body" id="modal_body">

      </div>
    </div>
  </div>
</div>
