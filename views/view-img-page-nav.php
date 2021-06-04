<footer>
    <div class="ist-pagination-bar">
        <?php if ($pagination_code == 0): ?>
            <input type="number" name="pageNo" id="pageNo" min="1" max="<?php echo $max_page_no; ?>" value="<?php echo $current_page; ?>"> <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page + 1) . $url_query; ?>" class="btn-success ist-page-button">next</a>
        <?php elseif ($pagination_code == 1): ?>
            <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page - 1) . $url_query; ?>" class="btn-success ist-page-button">prev</a> <input type="number" name="pageNo" id="pageNo" min="1" max="<?php echo $max_page_no; ?>" value="<?php echo $current_page; ?>"><a href="<?php echo $urls['home'] . '?p=' . (string)($current_page + 1) . $url_query; ?>" class="btn-success ist-page-button">next</a>
        <?php elseif ($pagination_code == 2): ?>
            <a href="<?php echo $urls['home'] . '?p=' . (string)($current_page - 1) . $url_query; ?>" class="btn-success ist-page-button">prev</a><input type="number" name="pageNo" id="pageNo" min="1" max="<?php echo $max_page_no; ?>" value="<?php echo $current_page; ?>">
        <?php else: ?>
            &nbsp;
        <?php endif; ?>
    </div>

    <div class="ist-stats-bar">
        <p>Total Records: <span class="text-success"><?php echo count($records); ?></span> | Page: <span class="text-success"><?php echo $page_info['current_page']; ?></span> | Total pages: <span class="text-success"><?php echo $page_info['total_pages']; ?></span>
    </p>
</div>
