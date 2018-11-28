<div class="container">
    <?php if (! $cart_empty): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>Tags</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart_items as $row): ?>
                    <?php $item_terms = get_terms($result['term_rels'], $row['file_id']); ?>
                    <tr>
                        <td><?php require('view-img-thmb.php'); ?></td>
                        <td><?php require('view-img-title.php'); ?></td>
                        <td><?php require('view-img-tags.php'); ?></td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-3">
                <form method="post" action="../inc/clear-cart.php">
                    <div class="form-group">
                        <input class="btn-default" type="submit" name="clearCart" value="Clear Cart">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form method="post" action="<?php echo $urls['viewer']; ?>">
                    <div class="form-group">
                        <?php foreach ($cart_items as $item): ?>
                            <input type="hidden" name="item-<?php echo $item['file_id']; ?>" value="<?php echo $item['file_id']; ?>">
                        <?php endforeach; ?>
                        <input class="btn-success" type="submit" name="viewer" value="View">
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                <?php require('view-properties-page-nav.php'); ?>
            </div>
        </div>

    <?php else: ?>
        <p class="text-warning">There are no items in your cart.</p>
    <?php endif; ?>
</div>
