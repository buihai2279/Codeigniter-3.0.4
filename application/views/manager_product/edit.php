<style>tr{line-height: 260%;margin-bottom: 100px;border-bottom: 1px solid #f1f1f1;}</style>
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
<div class="col-md-12">
<form action="#" method="POST" ><hr>
         <div class="row">
             <div><lable><b>id:</b></lable></div>
             <div>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" value="<?php echo $info->id;?>" disabled>
                 </div>
             </div>
         </div><hr>
         <div class="row">
             <div><lable><b>name:</b></lable></div>
             <div class="col-md-6">
                <input type="text" name="name" id='txtname'  class="form-control input-sm" value="<?php echo $info->name;?>">
             </div>
         </div><hr>
        <div class="row">
            <div class="form-group col-md-12 pull-right">
                <label>Slug</label>
                <div class="input-group col-sm-10">
                    <input type="text" class="form-control input-sm" id='txtslug' name='txtslug' value="<?php echo $info->slug;?>">
                </div>
            </div>
        </div>
        <hr>
         <div class="row">
             <div><lable><b>price:</b></lable></div>
             <div>
              <div class="col-md-4">
                <input class="form-control" name="price" value="<?php echo $info->price; ?>" placeholder="Default input">
                </div>
            </div>
         </div>
         <div class="row" >
             <div><lable><b>category_id:</b></lable></div>
             <div><?php $id= $info->category_id; ?>
                <div class="col-sm-2">
                    <select name="category_id" class="form-control input-sm">
                    <?php 
                        foreach ($list_category as $key => $value) { 
                            if($id!=$key)
                                echo '<option value="'.$key.'">'.$value.'</option>';
                            else 
                                echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        } 
                    ?>
                    </select>
                </div>
             </div>
         </div><hr>
         <div class="row">
             <div><lable><b>status:</b></lable></div>
             <div>
                 <div class="col-md-2">
                     <select name="status" id="input" class="form-control input-sm" required="required">
                         <option value="1"<?php if($info->status==1)echo "selected"; ?>>Công khai</option>
                         <option value="0"<?php if($info->status==0)echo "selected"; ?>>Không Công khai</option>
                     </select>
                 </div>
             </div>
         </div><hr>
         <div class="row">
             <div><lable><b>top:</b></lable></div>
             <div>
             <div class="col-md-2">
                 <select name="top" id="input" class="form-control input-sm" required="required">
                     <option value="1"<?php if($info->top==1)echo "selected"; ?>>Uu tien</option>
                     <option value="0"<?php if($info->top==0)echo "selected"; ?>>Khong uu tien</option>
                 </select>
             </div>
            </div>
         </div><hr>
         <div class="row">
             <div><lable><b>Slide:</b></lable></div>
             <div><div class="col-md-10"><?php $arr = explode('|', $info->slide);
                foreach ($arr as $value) {
                    echo '<img src="' . $value . '" class="img-responsive" style="max-height:150px;display:inline">';
                }
                ?></div>
            </div>
         </div><hr>
         <div class="row">
             <div><lable><b>img:</b></lable></div>
             <div><div class="col-md-6"><?php echo '<img src="' . $info->img . '" class="img-responsive" style="max-height:150px;display:inline">'; ?></div></div>
         </div><hr>
         <div class="row">
             <div><lable><b>detail:</b></lable></div>
             <div>
                 <div class="col-md-10">
                     <textarea class="form-control" name="detail" rows="6" required="required">
                     <?php $value=str_replace('|', '<br>', $info->caption);
                        echo $value;
                        ?>
                </textarea>
                 </div>
             </div>
         </div><hr>
         <div class="row">
             <div><lable><b>caption:</b></lable></div>
                <div class="col-md-10">
                    <textarea  class="form-control" name="caption" rows="8" required="required">
                    <?php
                    $value=str_replace('|','<br>', $info->caption);
                         echo $value;?>
                    </textarea>
                 </div>
         </div><hr>
         <div class="row">
             <div><lable><b>description:</b></lable></div>
             <div>
            <div class="col-md-10">
                    <textarea  class="form-control" rows="4" name="description" required="required"><?php $value=str_replace('|', '<br>', $info->caption);
                         echo $value;?>
                    </textarea>
                 </div>  
             </div>
         </div>
     <br>
     <button type="input" value="ok" name="submit" class="btn btn-info center-block">Update</button>
     <br>
     <br>
     <br>
     </form>
</div>