<html>
    <head>
        <title>Upload Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    </head>

    <body>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('input[type!="button"][type!="submit"][type!="reset"], select, textarea')
                    .val('')
                    .blur();
            });
        </script>

        <?php $this->load->helper('url'); ?>
        <br>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Upload package</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if (strlen($error) > 0) {
                        echo
                        "<div class='alert alert-danger' role='alert'>"
                        . $error
                        . "</div>";
                    }
                    ?>

                    <?php
                    echo
                    validation_errors("<div class='alert alert-danger alert-dismissible' role='alert'>"
                            . "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>"
                            . "<span class='sr-only'>Error:</span> "
                            . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                            , "</div>");
                    ?>


                    <?php echo form_open_multipart('upload_controller/do_upload'); ?>
                    <div class="form-group" id='should_append'>
                        <label for="3DfileField">3D model 
                            <a href="#" id='add_btn'>
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                <span class="sr-only">Add File</span>
                            </a>
                        </label>
                        <?php echo "<input type='file' name='modelFiles[]' size='20' id='3DfileField' accept='.obj,.jpg,.png'>"; ?>
                        
                    </div>

                    <div class="form-group">
                        <label for="DatafileField">Data file</label>
                        <?php echo "<input type='file' name='XMLfile' size='20' id='DatafileField' accept='.xml,.jpg,.png'>"; ?>
                    </div>

                    <div class="form-group">
                        <p><label for="NoteField">Note</label></p>
                        <?php echo "<textarea rows='4' class='form-control' name='note' maxlength='220' style='resize:none' id='NoteField' placeholder='Input some notes'></textarea>"; ?>
                    </div>

                    <?php echo "<input type='submit' name='submit' value='Upload' class='btn btn-primary'/>"; ?>
                    <?php echo "<input type='reset' name='reset' value='Reset' class='btn btn-default'/>"; ?>
                    
                    <?php echo "</form>" ?>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script>
            $("#add_btn").on("click", function()
            {
                $("#should_append").append("<input type='file' name='modelFiles[]' size='20' id='3DfileField' accept='.obj,.jpg,.png'>");
            });
        </script>
    </body>
</html>