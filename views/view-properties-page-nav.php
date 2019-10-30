<?php if (isset($page_no) || isset($_GET['p'])): ?>
    <a href="<?php echo '../' . $urls['home'] . '?p=' . $_GET['p'] . $item_queries . '#' . $img_id; ?>" class="btn-success ist-page-button">return to results </a>
<?php endif; ?>
