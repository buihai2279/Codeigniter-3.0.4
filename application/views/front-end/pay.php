<div class="container">
        <br>    
        <br><hr>    
        <br> 
        <?php if (count($this->cart->contents())>0){ ?>
                           
          
<?php echo form_open('user/update_cart'); ?>
<table cellpadding="6" cellspacing="1" style="width:100%" border="0">
<tr>
        <th>IMG</th>
        <th>Qty</th>
        <th>Name</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
</tr>
<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items): ?>
        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
        <tr style="border-bottom: 1px solid #f1f1f1;">
                <td><img src="<?php echo $items['img'] ?>" class='img-responsive' style='max-height: 150px;'></td>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>
                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>
<?php endforeach; ?>
<tr>
        <td colspan="2"><?php echo form_submit(array('class'=>'btn btn-primary'), 'Update your Cart'); ?></td>
        <td class="pull-left"><strong>Total</strong></td>
        <td colspan="2" class="pull-right"><?php echo $this->cart->format_number($this->cart->total()); ?> VNĐ</td>
</tr>
</table>

<div class="clearfix">
</div>
<?php }else{
        echo '<div class="alert alert-warning">Không có sản phẩm nào trong giỏ hàng</div>';
        } ?>
<br>
<hr>
<br>
<br>
</div>