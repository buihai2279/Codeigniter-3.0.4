<style>tr{line-height: 260%;margin-bottom: 100px;border-bottom: 1px solid #f1f1f1;}
tr:last-child{border-bottom:none;}
label{width: 80px;}</style>
<form class="form-inline" action="#" method="POST" >
    <div class="clearfix"></div><hr>
    <div class="form-group form-group-lg col-md-6">
        <label>Name</label>
        <input type="text" class="form-control" name='name' value="<?php echo set_value("name"); ?>" placeholder="Jane Doe">
    </div>
    <div class="form-group">
        <label>price</label>
        <div class="input-group">
            <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo set_value("name"); ?>" placeholder="Amount">
            <div class="input-group-addon">VND</div>
        </div>
    </div>
    <div class="clearfix"></div><hr>
    <div class="form-group col-md-4">
        <label>Category Name</label>
        <select name="category_id" class="form-control input-sm">
            <?php foreach ($list_category as $key=> $value) { ?>
                <option value="<?php echo $key ?>"><?php echo $value ?></option>;
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
