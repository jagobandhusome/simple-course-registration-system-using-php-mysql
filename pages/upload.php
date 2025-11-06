                            
<?php


if (isset($_FILES['bdraft'])) {
   
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    //$objValid->fileValidation();
    //$file = rename();

    $file = $_FILES['bdraft'];

    echo $file['name'];

    move_uploaded_file($file['tmp_name'], "uploaded/".$file['name']);

    //move_uploaded_file(filename, destination)

            
}
?>
            <form role="form" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                              <label for="bdraft">Attach a scan copy of your Bank Draft (only .jpg entention accepted and not bigger than 300KB) </label>
                                <?php 
                                    //validateUpload('bdraft');
                                ?>
                                <div class="input-group">
                                    <span class="btn btn-lg btn-file input-box-height">
                                    <input type="file" name="bdraft" enctype='multipart/form-data' id="bdraft" multiple accept="image/gif, image/png, image/jpeg"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="picture">Attach Picture (only .jpg extention  not bigger than 300KB)</label>
                                    <?php 
                                        //validateUpload('picture');
                                    ?>
                                    <div class="input-group">
                                        <span class="btn btn-lg btn-file" name="picture" >
                                        <input type="file" name="picture" enctype='multipart/form-data' id="picture"  multiple accept="image/gif, image/png, image/jpeg"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </form>