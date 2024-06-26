<div class="container">
    <?php if ($render): ?>
        <div class="row">
            <div class="col-md-5">
                <form method="post" action="../inc/add-term.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" name="addTag" id="addTag" placeholder="Tag (16 chars max)" value="" maxlength="16" required autofocus>
                        <input name="imgId" value="<?php echo $img_id; ?>" type="hidden">
                        <input name="p" value="<?php echo $page_no; ?>" type="hidden">
                        <input class="btn-success form-control" type="submit" value="Add">
                    </div>
                </form>
                <?php if (isset($err_msg)): ?>
                    <p class="text-danger"><?php echo $err_msg; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4"><?php require_once('view-properties-page-nav.php'); ?></div>
            <div class="col-md-3"><?php require_once('view-add-cart.php'); ?></div>

            <div class="col-md-12">
                <div class="ist-form-suggestions-panel-static">
                    <div class="ist-form-suggestions">&nbsp;</div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
    var tagFieldEl = document.getElementById("addTag");
    tagFieldEl.addEventListener("keypress", function() { console.log("this changed")});
</script>
