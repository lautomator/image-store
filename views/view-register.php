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
            <?php if (isset($unq_names)): ?>
            <ul>
                <?php foreach ($unq_names as $u_name): ?>
                    <li><span class="text-success ist-file-names"><?php echo $u_name; ?></span> was uploaded.</li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if (isset($err_msg)): ?>
                <p class="text-danger"><?php echo $err_msg; ?></p>
            <?php endif; ?>
            <?php if (count($dup_names) > 0): ?>
                <ul>
                    <?php foreach ($dup_names as $dup): ?>
                        <li><span class="text-warning ist-file-names"><?php echo $dup; ?></span> was not uploaded because it already exists.</li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>