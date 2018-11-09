<?php if (isset($tracking) && isset($set_ids) && isset($page_no)): ?>
    <?php if ($tracking['next'] > -1 && $tracking['prev'] > -1): ?>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['next'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">prev image</a>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['prev'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">next image</a>
    <?php elseif ($tracking['next'] > -1): ?>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['next'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">next image</a>
    <?php elseif ($tracking['prev'] > -1): ?>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['prev'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">prev image</a>
    <?php else: ?>
        &nbsp;
    <?php endif; ?>
<?php endif; ?>

<?php

print_r($tracking);
echo ' / ' . $set_ids . ' / ' . $page_no;