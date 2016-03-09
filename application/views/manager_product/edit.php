<style>tr{line-height: 260%;margin-bottom: 100px;border-bottom: 1px solid #f1f1f1;}</style>
<div class="col-md-12">
<form action="#" method="POST" >
     <table>
     <tbody>
         <tr>
             <td><lable><b>id:</b></lable></td>
             <td>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" value="<?php echo $info->id;?>" disabled>
                 </div>
             </td>
         </tr>
         <tr>
             <td><lable><b>name:</b></lable></td>
             <td>
             <div class="col-md-6">
                <input type="text" name="name" class="form-control input-sm" value="<?php echo $info->name;?>">
             </div>
             </td>
         </tr>
         <tr>
             <td><lable><b>price:</b></lable></td>
             <td>
              <div class="col-md-4">
                <input class="form-control" name="price" value="<?php echo $info->price; ?>" placeholder="Default input">
                </div>
            </td>
         </tr>
         <tr>
             <td><lable><b>category_id:</b></lable></td>
             <td><?php $id= $info->category_id; ?>
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
             </td>
         </tr>
         <tr>
             <td><lable><b>status:</b></lable></td>
             <td>
                 <div class="col-md-2">
                     <select name="status" id="input" class="form-control input-sm" required="required">
                         <option value="1"<?php if($info->status==1)echo "selected"; ?>>Công khai</option>
                         <option value="0"<?php if($info->status==0)echo "selected"; ?>>Không Công khai</option>
                     </select>
                 </div>
             </td>
         </tr>
         <tr>
             <td><lable><b>top:</b></lable></td>
             <td>
             <div class="col-md-2">
                 <select name="top" id="input" class="form-control input-sm" required="required">
                     <option value="1"<?php if($info->top==1)echo "selected"; ?>>Uu tien</option>
                     <option value="0"<?php if($info->top==0)echo "selected"; ?>>Khong uu tien</option>
                 </select>
             </div>
            </td>
         </tr>
         <tr>
             <td><lable><b>link:</b></lable></td>
             <td><div class="col-md-10"><?php $arr = explode('|', $info->link);
                foreach ($arr as $value) {
                    echo '<img src="' . $value . '" class="img-responsive" style="max-height:150px;display:inline">';
                }
                ?></div>
            </td>
         </tr>
         <tr>
             <td><lable><b>img:</b></lable></td>
             <td><div class="col-md-6"><?php echo '<img src="' . $info->img . '" class="img-responsive" style="max-height:150px;display:inline">'; ?></td></div>
         </tr>
         <tr>
             <td><lable><b>detail:</b></lable></td>
             <td>
                 <div class="col-md-10">
                     <textarea class="form-control" name="detail" rows="6" required="required"><?php $arr = explode('|', $info->detail);foreach ($arr as $value) {
    echo $value . '<br>';}?></textarea>
                 </div>
             </td>
         </tr>
         <tr>
             <td><lable><b>caption:</b></lable></td>
             <td>
                <div class="col-md-10">
                    <textarea  class="form-control" name="caption" rows="8" required="required"><?php $arr = explode('|', $info->caption);
                     foreach ($arr as $value) {
                         echo $value . '<br>';}?>
                    </textarea>
                 </div>
             </td>
         </tr>
         <tr>
             <td><lable><b>description:</b></lable></td>
             <td>
            <div class="col-md-10">
                    <textarea  class="form-control" rows="4" name="description" required="required"><?php $arr = explode('|', $info->description);
                     foreach ($arr as $value) {
                         echo $value . '<br>';}?>
                    </textarea>
                 </div>  
             </td>
         </tr>
     </tbody>
     </table>
     <br>
     <button type="input" value="ok" name="submit" class="btn btn-info center-block">Update</button>
     <br>
     <br>
     <br>
     <br>
     </form>
</div>