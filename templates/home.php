<div class="container">
    <?php if ($result['status'] == 1): ?>
        <p class="text-danger"><?php echo $result['err_msg']; ?></p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>img</th>
                    <th>name</th>
                    <th>tags</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $item_terms = array();
                    $term_names = array();
                ?>
                <?php foreach($result['img_data'] as $row): ?>
                    <tr>
                        <td><img class="thumb-img" src="<?php echo $row['file_path'] . $row['file_name']; ?>"></td>
                        <td><?php echo $row['file_name']; ?></td>
                        <td>
                            <?php
                                $item_terms = get_terms($result['term_rels'], $row['file_id']);

                                if (! empty($item_terms)) {
                                    foreach ($item_terms as $term_id) {
                                        echo '/' . get_term_name($result['terms'], $term_id);
                                    }
                                }
                                $item_terms = '';
                            ?>
                        </td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>