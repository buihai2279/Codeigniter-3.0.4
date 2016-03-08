<div class="col-md-12">
     <table class="table table-bordered">
         <tr>
             <td><b>id:</b></td>
             <td><?php echo $var->id; ?></td>
         </tr>
         <tr>
             <td><b>name:</b></td>
             <td><?php echo $var->name; ?></td>
         </tr>
         <tr>
             <td><b>price:</b></td>
             <td><?php echo number_format($var->price); ?></td>
         </tr>
         <tr>
             <td><b>category Name:</b></td>
             <td><?php echo $category['name']; ?></td>
         </tr>
         <tr>
             <td><b>status:</b></td>
             <td><?php echo $var->status; ?></td>
         </tr>
         <tr>
             <td><b>top:</b></td>
             <td><?php echo $var->top; ?></td>
         </tr>
         <tr>
             <td><b>link:</b></td>
             <td><?php $arr = explode('|', $var->link);
foreach ($arr as $value) {
    echo '<img src="' . $value . '" class="img-responsive" style="max-height:150px;display:inline">';
}
?>
            </td>
         </tr>
         <tr>
             <td><b>img:</b></td>
             <td><?php echo '<img src="' . $var->img . '" class="img-responsive" style="max-height:150px;display:inline">'; ?></td>
         </tr>
         <tr>
             <td><b>detail:</b></td>
             <td><?php $arr = explode('|', $var->detail);foreach ($arr as $value) {
    echo $value . '<br>';}?></td>
         </tr>
         <tr>
             <td><b>caption:</b></td>
             <td><?php $arr = explode('|', $var->caption);foreach ($arr as $value) {
    echo $value . '<br>';}?></td>
         </tr>
         <tr>
             <td><b>description:</b></td>
             <td><?php $arr = explode('|', $var->description);foreach ($arr as $value) {
    echo $value . '<br>';}?></td>
         </tr>
         <tr>
             <td><b>date_created:</b></td>
             <td><?php echo $var->date_created; ?></td>
         </tr>
         <tr>
             <td><b>last_updated:</b></td>
             <td><?php echo $var->last_updated; ?></td>
         </tr>
     </table>
</div>