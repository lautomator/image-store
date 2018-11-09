<?php if (isset($tracking) && isset($set_ids) && isset($page_no)): ?>
    <?php if (! is_null($tracking['next']) && ! is_null($tracking['prev'])): ?>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['next'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">prev image</a>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['prev'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">next image</a>
    <?php elseif (! is_null($tracking['next'])): ?>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['next'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">next image</a>
    <?php else: ?>
        <a href="<?php echo $urls['properties'] . '?img_id=' . $tracking['prev'] . '&setIDs=' . $set_ids . '&p=' . $page_no; ?>" class="btn-success ist-page-button">prev image</a>
    <?php endif; ?>
<?php endif; ?>