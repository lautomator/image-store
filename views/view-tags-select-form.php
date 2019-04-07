<?php if (count($all_terms) > 0): ?>
    <form method="post" action="../inc/process-search.php" class="form-inline">
        <div class="row">
            <?php foreach ($all_terms as $terms): ?>
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
<?php else: ?>
    <p class="text-warning">There are no terms to view.</p>
<?php endif; ?>