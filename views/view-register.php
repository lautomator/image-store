<div class="container">
    <p>Upload new images to the store.</p>

    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo $urls['register']; ?>" method="post" enctype="multipart/form-data" id="uploadImage">
                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max; ?>">
                    <input type="file" name="image[]" id="image" multiple required>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="upload" id="upload" value="upload">
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <?php if (isset($upload_result)): ?>
            <ul>
                <?php foreach ($upload_result as $u_msg): ?>
                    <li><span class="text-success ist-file-names"><?php echo $u_msg; ?></span></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>