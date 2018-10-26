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
                <?php foreach($page_items as $row): ?>
                    <?php if (! empty($row)): ?>
                        <tr>
                            <td><?php require('view-img-thmb.php'); ?></td>
                            <td><?php require('view-img-title.php'); ?></td>
                            <td><?php require('view-img-tags.php'); ?></td>
                        <tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php require('view-img-page-nav.php'); ?>

    <?php endif; ?>
</div>