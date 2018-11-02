<div class="container">
    <?php if ($render): ?>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="../inc/add-term.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" name="addTag" id="addTag" placeholder="Tag (16 chars max)" value="" maxlength="16" required>
                        <input name="imgId" value=<?php echo $img_id; ?> type="hidden">
                        <input class="btn-success form-control" type="submit" value="Add">
                        <div class="ist-form-suggestions-panel"><ul class="ist-form-suggestions"><li class="ist-tag-suggestion">&nbsp;</li></ul></div>
                    </div>
                </form>
                <?php if (isset($err_msg)): ?>
                    <p class="text-danger"><?php echo $err_msg; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">&nbsp;</div>
        </div>
    <?php endif; ?>
</div>
