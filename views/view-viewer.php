<div class="container-fluid">
    <div class="row">
        <?php if (count($all_cart_records) > 0): ?>
            <?php foreach ($all_cart_records as $row): ?>
                <div class="col-md-4" style="margin: 0; padding: 0;">
                    <img style="width: 100%;" src="<?php echo '../' . $row['file_path'] . $row['file_name'] . '.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
