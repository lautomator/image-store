<?php
    $item_terms = array();
    $start_item = 1;
    $item_no = 1;
    $record_count = $result['record_count'];

    if (isset ($_GET['index'])) {
        $start_item = $_GET['index'];
        $item_no = $start_item;
    }

?>

<div class="container">
    <?php if ($result['status'] == 1): ?>
        <p class="text-danger"><?php echo $result['err_msg']; ?></p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>Tags</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result['img_data'] as $row): ?>
                    <?php if ($item_no <= $max_records_per_page): ?>
                        <tr>
                            <td><?php require('view-img-thmb.php'); ?></td>
                            <td><?php require('view-img-title.php'); ?></td>
                            <td><?php require('view-img-tags.php'); ?></td>
                        <tr>
                        <?php $item_no += 1; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php require('view-img-page-nav.php'); ?>

    <?php endif; ?>
</div>