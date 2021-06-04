<div class="container-fluid">
    <?php if ($result['status'] == 1): ?>
        <p class="text-danger"><?php echo $result['err_msg']; ?></p>
    <?php elseif (isset($no_records_warn)): ?>
        <p class="text-warning"><?php echo $no_records_warn; ?></p>
    <?php else: ?>
        <div class="row">
        <?php foreach($page_items as $row): ?>
            <?php if (! empty($row)): ?>
                <?php 
                    $img_id = $row['file_id'];
                    // $item_terms = get_terms($result['term_rels'], $img_id); 
                ?>
                <div id="<?php echo $img_id; ?>" class="col-md-2 tiled-img">
                    <?php require('view-img-thmb.php'); ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>

        <?php require('view-img-page-nav.php'); ?>

    <?php endif; ?>
</div>
