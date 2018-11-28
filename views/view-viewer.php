<div class="container-fluid">
    <div class="row">
        <?php if (count($all_cart_records) > 0): ?>
            <?php foreach ($all_cart_records as $row): ?>
                <div class="col-md-<?php echo $cart_grid; ?> ist-cart-item">
                    <div class="ist-cart-bg-img" style="background: url(<?php echo '\'' .'../' . $row['file_path'] . $row['file_name'] . '.' . $row['file_ext'] . '\''; ?>) no-repeat top left/100%">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>