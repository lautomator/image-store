<?php if ($page == 'home'): ?>
    <a href="<?php echo $urls['properties'] . '?img_id=' . $row['file_id'] . (isset($_GET['p']) ? '&p=' . $_GET['p'] : '&p=1') . $item_queries; ?>"><img class="ist-thumb-img" style="width: 100%" src="<?php echo $row['file_path'] . $row['file_name'] . '_200.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>"></a>
<?php else: ?>
    <a href="<?php echo $urls['properties'] . '?img_id=' . $row['file_id'] . (isset($_GET['p']) ? '&p=' . $_GET['p'] : '&p=1') . $item_queries; ?>"><img class="ist-thumb-img" style="width: 100%" src="<?php echo '../' . $row['file_path'] . $row['file_name'] . '_200.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>"></a>
<?php endif; ?>
