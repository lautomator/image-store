<?php if (! $in_cart && ! $cart_full): ?>
    <form method="post" action="../inc/add-to-cart.php">
        <div class="form-group">
            <input name="cartImgId" value="<?php echo $img_id; ?>" type="hidden">
            <?php if (isset($page_no)): ?>
                <input name="returnPage" value="<?php echo $page_no; ?>" type="hidden">
            <?php else: ?>
                <input name="returnPage" value="1" type="hidden">
            <?php endif; ?>
            <input class="btn-success" type="submit" value="Add to cart">
        </div>
    </form>
<?php endif; ?>
