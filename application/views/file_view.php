<html>
    <head>
        <title>Upload Form</title>
    </head>

    <body>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>
        $( document ).ready(function() {
            $('form').trigger("reset");
        });
        </script>
        
	<?php echo $error; ?>
	<?php echo form_open_multipart('upload_controller/do_upload');?>
	3D model: <?php echo "<input type='file' name='3Dfile' size='20' accept='.obj,.jpg,.png'>"; ?>
	<br />
	Data file: <?php echo "<input type='file' name='XMLfile' size='20' accept='.xml,.jpg,.png'>"; ?>
	<br />
	<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
	<?php echo "</form>"?>
    </body>
</html>