<?php if ($pagination_code == 0): ?>
    <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page + 1); ?>" class="btn-success ist-page-button">next</a>
<?php elseif ($pagination_code == 1): ?>
    <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page - 1); ?>" class="btn-success ist-page-button">prev</a> <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page + 1); ?>" class="btn-success ist-page-button">next</a>
<?php elseif ($pagination_code == 2): ?>
    <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page - 1); ?>" class="btn-success ist-page-button">prev</a>
<?php else: ?>
    &nbsp;
<?php endif; ?>

<div class="ist-stats-bar">
    <p>Total Records: <span class="text-success"><?php echo count($all_records); ?></span> | Page: <span class="text-success"><?php echo $page_info['current_page']; ?></span> | Total pages: <span class="text-success"><?php echo $page_info['total_pages']; ?></span>
</p>