<?php print_r($_GET) ?>
<?php print_r($_POST) ?>
<!DOCTYPE html>
<html>
<head>
    <title>CKEditor Classic Editing Sample</title>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="<?php echo base_url('public'); ?>/ckeditors/ckeditor.js"></script>
    <script src="<?php echo base_url('public'); ?>/ckfinder/ckfinder.js"></script>
</head>
<body>
    <form method="post">
        <p>
            My Editor:<br>
            <textarea name="editor1" id="editor1">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
            <script>
                // CKEDITOR.replace( 'editor1' );
                var editor = CKEDITOR.replace( 'editor1' );
				CKFinder.setupCKEditor( editor );
            </script>
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
</body>
</html>
