<?php if (! $in_cart && ! $cart_full): ?>
    <form method="post" action="../inc/add-to-cart.php">
        <div class="form-group">
            <input name="cartImgId" value=<?php echo $img_id; ?> type="hidden">
            <input class="btn-success" type="submit" value="Add to cart">
        </div>
    </form>
<?php endif; ?>
