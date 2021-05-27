<div class="container">
    <?php if (! $cart_empty): ?>
        <div class="row">
            <?php foreach($cart_items as $row): ?>
            <?php $item_terms = get_terms($result['term_rels'], $row['file_id']); ?>
            
            <div class="col-md-4">
                <?php require('view-img-thmb.php'); ?>
                <?php if (count($cart_items) == $cart_size): ?>
                    <p><input class="cart_sequence_options" value="<?php echo key($cart_items) + 1; ?>" type="number" name="<?php echo key($cart_items); ?>" max="<?php echo $cart_size; ?>" min="1"></p>
                    <?php require('view-img-tags.php'); ?>
                <?php endif; ?>
            </div>
            <?php next($cart_items); ?>
            <?php endforeach; ?>

        </div>
                
        <div class="row">
            <div class="col-md-3">
                <form method="post" action="../inc/clear-cart.php">
                    <div class="form-group">
                        <input class="btn-default" type="submit" name="clearCart" value="Clear Cart">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <?php if (count($cart_items) == $cart_size): ?>
                    <form method="post" action="<?php echo $urls['viewer']; ?>">
                        <div class="form-group">
                            <?php foreach ($cart_items as $item): ?>
                                <input type="hidden" name="item_<?php echo $item['file_id']; ?>" value="<?php echo $item['file_id']; ?>">
                                <input class="cart_final_sequence" name="final_seq_option_<?php echo $item['file_id']; ?>" type="hidden" value="<?php echo key($cart_items) + 1; ?>">
                                <?php next($cart_items); ?>
                            <?php endforeach; ?>

                            <input class="btn-success" type="submit" name="viewer" value="View">
                        </div>
                    </form>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </div>

            <div class="col-md-3">
                <?php require('view-properties-page-nav.php'); ?>
            </div>
        </div>

    <?php else: ?>
        <p class="text-warning">There are no items in your cart.</p>
    <?php endif; ?>
</div>
