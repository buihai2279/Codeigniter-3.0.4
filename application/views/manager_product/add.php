<style>tr{line-height: 260%;margin-bottom: 100px;border-bottom: 1px solid #f1f1f1;}
tr:last-child{border-bottom:none;}
label{width: 80px;}</style>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#txtname" ).change(function() {
            var slug = $(this).val();
            $.ajax({
                type : "post",
                data : {
                            slug : slug
                        },
                dateType:"text",
                url: "<?php echo base_url('manager_product/get_slug')?>",
                success: function(result){
                    $("#txtslug").val(result);
                }
            });
        });
    });
</script>
<script src="<?php echo base_url('bootstrap/js/jquery.number.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#price').number(true,2);
    });
// <?php $number = preg_replace( '/([^0-9\.])/', '', $_POST['price'] )?>
    
</script>
<form class="form-inline" action="#" method="POST" >
    <div class="clearfix"></div><hr>
    <div class="form-group form-group-lg col-lg-12">
        <label>Name</label>
        <input type="text" class="form-control" name='name' id='txtname' value="<?php echo set_value("name"); ?>" placeholder="Jane Doe" style='width: 80%;'>
    </div>
    <div class="clearfix"></div><hr>
    <div class="form-group col-md-5">
        <label>price</label>
        <div class="input-group">
            <div class="input-group-addon">$</div>
                <input type="text" name="price" id="price" class="form-control" value="<?php echo set_value("price"); ?>" placeholder="Amount">
            <div class="input-group-addon">VND</div>
        </div>
    </div>
    <div class="form-group col-md-7 pull-right">
        <label class=" col-sm-2">Slug</label>
        <div class="input-group col-sm-10">
            <div class="input-group-addon">/dttd/</div>
                <input type="text" class="form-control" id='txtslug' name='txtslug' value="<?php echo set_value('txtslug'); ?>" placeholder="Amount">
        </div>
    </div>
    <div class="clearfix"></div><hr>
    <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
    <div class="form-group col-md-4">
        <label>Category Name</label>
        <select name="category_id" class="form-control input-sm">
            <option value="0">Uncategory</option>
            <?php foreach ($list_category as $key=> $value) { ?>
                <option value="<?php echo $key ?>"><?php echo $value ?></option>
             <?php  }?>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Status</label>
        <select name="status" id="input" class="form-control input-sm">
        <option value="1">Công khai</option>
        <option value="0">Không Công khai</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Top</label>
        <select name="top" id="input" class="form-control input-sm">
        <option value="1">Uu tien</option>
        <option value="0" selected>Khong uu tien</option>
        </select>
    </div>
    <div class="clearfix"></div><hr>
    <div class="form-group col-md-6">
    <label>description</label>
        <textarea class="form-control" rows="4" name="description"><?php echo set_value("description"); ?></textarea>
        </div>
        <div class="form-group col-md-6">
        <label>img</label>
        <textarea class="form-control" name="img" rows="4"></textarea>
    </div>
    <div class="clearfix"></div><hr>
    <div class="form-group col-md-6">
        <label>link</label>
        <textarea class="form-control" name="link" rows="4"></textarea>
    </div>
    <div class="form-group col-md-6">
        <label>caption</label>
        <textarea class="form-control" name="caption" rows="4" rows="3"><?php echo set_value('caption'); ?></textarea>
    </div>
    <div class="clearfix"></div><hr>
    <div class="form-group col-md-10">
        <label>detail</label>
        <textarea class="form-control" name="detail" rows="8"><?php echo set_value('detail'); ?></textarea>
    </div>
    <div class="clearfix"></div><hr>
    <button type="input" value="ok" name="submit" class="btn btn-info center-block">Add</button>
</form>
