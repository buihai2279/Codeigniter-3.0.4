<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=868245903223472";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
	p.content_news{
	font-size: 14px;
	line-height: 27px;
	padding: 5px;
}
p.title_news{
	font-size: 16px;
	margin-left: 20px;
}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p class="title_news "><b><?php echo $result['title']; ?></b></p>
		<img src="https://www.thegioididong.com/images/42/73705/Slider/iphone-6s-slider-04.jpg" class="img-responsive">
	</div>
</div>
<hr>
<div style="margin: 0 auto;">
	<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1">
	 	<p><?php echo $result['date_created']; ?></p>
	 	<hr>
		<p><?php echo $result['description']; ?></p><br>
		<p class="content_news"><?php echo $result['content']; ?></p>
		 <div class="col-md-12">
		 	<div class="fb-comments" data-href="<?php echo base_url('news/view/'.$result['id'])?>" data-numposts="4" width='100%'></div>
		 </div>
	</div>
	<div class="clearfix"></div><hr>
 <button data-dismiss="modal" class="clearfix col-xs-12 btn ">close</button><br>
</div>