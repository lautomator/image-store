<div class="container">
    <div class="ist-properties">
        <?php if ($render): ?>
            <?php require_once('view-img-tags.php'); ?>
        <?php else: ?>
            <p class="danger"><?php echo $msg; ?></p>
        <?php endif; ?>
    </div>
</div>