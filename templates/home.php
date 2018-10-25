<div class="container">
    <?php if ($result['status'] == 1): ?>
        <p class="text-danger"><?php echo $result['err_msg']; ?></p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>name</th>
                    <th>tags</th>
                </tr>
            </thead>
            <tbody>
                <?php $item_terms = array(); ?>
                <?php foreach($result['img_data'] as $row): ?>
                    <tr>
                        <td><a href="<?php echo $home . $urls['properties']; ?>" title="<?php echo $row['file_name']; ?>"><img class="ist-thumb-img" src="<?php echo $row['file_path'] . $row['file_name']; ?>"></a></td>
                        <td><a href="<?php echo $home . $urls['properties']; ?>"><span class="ist-file-names"><?php echo $row['file_name']; ?></span></a></td>
                        <td>
                            <?php $item_terms = get_terms($result['term_rels'], $row['file_id']); ?>
                            <?php if (! empty($item_terms)): ?>
                                <?php foreach ($item_terms as $term_id): ?>
                                    <a href="<?php echo $home . $urls['view_cart'] . '?t=' . $term_id; ?>"><span class="ist-tag"><?php echo get_term_name($result['terms'], $term_id); ?></span></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php $item_terms = ''; ?>
                        </td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>