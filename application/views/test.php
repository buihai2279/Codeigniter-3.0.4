 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>CKFinder 3</title>
     <script src="<?php echo base_url('public')?>/ckfinder/ckfinder.js"></script>
 </head>
 <body>

 <form action="#">
     <script>
         function openPopup() {
             CKFinder.modal( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();
                         $('#url').append( file.getUrl());
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {
                         $('#url').append(evt.data.resizedUrl);
                     } );
                 }
             } );
         }
     </script>
     <div id="url"></div>
     <textarea  name="url"  /></textarea> <button onclick="openPopup()">Select file</button>
     <input type="submit">
 </form>
 </body>
 </html>
 <?php print_r($_GET);
  print_r($_POST);?>