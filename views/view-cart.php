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

        <form method="post" action="../inc/clear-cart.php">
            <div class="form-group">
                <input class="btn-success" type="submit" name="clearCart" value="Clear Cart">
            </div>
        </form>

    <?php else: ?>
        <p class="text-warning">There are no items in your cart.</p>
    <?php endif; ?>
</div>
