<div class="container-fluid">
    <div class="row">
        <?php if (count($all_cart_records) > 0): ?>
            <?php foreach ($all_cart_records as $row): ?>
                <div class="col-md-<?php echo $cart_grid; ?> ist-cart-item">
                    <img style="width: 100%;" src="<?php echo '../' . $row['file_path'] . $row['file_name'] . '.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php //echo $cart_grid; ?>
