<?php if (! empty($result['terms'])): ?>
    <form method="get" action="../inc/select-tags.php" class="form-inline">
        <div class="row">
            <?php foreach ($result['terms'] as $terms): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" name="<?php echo $terms['term_slug'];?>" value="<?php echo $terms['term_id']; ?>">&nbsp;<?php echo $terms['term_name'];?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <input class="btn-success" type="submit" name="qTags" value="Search">
        </div>
    </form>
<?php endif; ?>