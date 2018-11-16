<div class="container">
    <?php if (! $cart_empty): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart_items as $row): ?>
                    <tr>
                        <td><?php require('view-img-thmb.php'); ?></td>
                        <td><?php require('view-img-title.php'); ?></td>
                        <td><input type="checkbox" name="<?php echo $row['file_id']; ?>"></td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6">
                <form method="post" action="../inc/clear-cart.php">
                    <div class="form-group">
                        <input class="btn-default" type="submit" name="clearCart" value="Clear Cart">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form method="post" action="../inc/select-cart-images.php">
                    <div class="form-group">
                        <input class="btn-success" type="submit" name="selectCartImages" value="See Selected">
                    </div>
                </form>
            </div>
        </div>

    <?php else: ?>
        <p class="text-warning">There are no items in your cart.</p>
    <?php endif; ?>
</div>
