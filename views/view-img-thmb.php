<?php if ($page == 'home'): ?>
    <a href="<?php echo $urls['properties'] . '?img_id=' . $row['file_id']; ?>" title="<?php echo $row['file_name']; ?>"><img class="ist-thumb-img" src="<?php echo $row['file_path'] . $row['file_name'] . '.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>"></a>
<?php else: ?>
    <a href="<?php echo $urls['properties'] . '?img_id=' . $row['file_id']; ?>" title="<?php echo $row['file_name']; ?>"><img class="ist-thumb-img" src="<?php echo '../' . $row['file_path'] . $row['file_name'] . '.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>"></a>
<?php endif; ?>
