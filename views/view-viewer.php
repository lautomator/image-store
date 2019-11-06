<div class="container-fluid cart-viewer">
    <div class="row">
        <?php if (count($all_cart_records) > 0): ?>
            <?php foreach ($all_cart_records as $row): ?>
                <!-- mobile only -->
                <div class="ist-mobile-only col-md-<?php echo $cart_grid; ?> ist-cart-item">
                    <img class="ist-cart-img-mobile" src="<?php echo '../' . $row['file_path'] . $row['file_name'] . '.' . $row['file_ext']; ?>" alt="<?php echo $row['file_name']; ?>">
                </div>

                <!-- desktop -->
                <div class="ist-desktop-only col-md-<?php echo $cart_grid; ?> ist-cart-item">
                    <div class="ist-cart-bg-img" style="background: url(<?php echo '\'' .'../' . $row['file_path'] . $row['file_name'] . '.' . $row['file_ext'] . '\''; ?>) 0px 0px / 100% no-repeat">
                        <div class="ist-zoom-ctrl">
                            <!-- increase -->
                            <div class="ist-zoom-btn ist-ctrl"><span class="ist-zoom-btn-txt">+</span></div>
                            <!-- reduce -->
                            <div class="ist-zoom-btn ist-ctrl"><span class="ist-zoom-btn-txt">–</span></div>
                            <!-- move x -->
                            <div class="ist-arrow-btn ist-ctrl"><span class="ist-arrow-btn-txt">&larr;</span></div>
                            <div class="ist-arrow-btn ist-ctrl"><span class="ist-arrow-btn-txt">&rarr;</span></div>
                            <!-- move y -->
                            <div class="ist-arrow-btn ist-ctrl"><span class="ist-arrow-btn-txt">&uarr;</span></div>
                            <div class="ist-arrow-btn ist-ctrl"><span class="ist-arrow-btn-txt">&darr;</span></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<pre>
    <?php //print_r($all_cart_records); ?>
    <?php //print_r($image_sequence); ?>
    <?php print_r($_POST); ?>
</pre>
