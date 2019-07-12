<div class="container">
    <p>Choose a tag.</p>
    <?php if ($render): ?>
        <div class="ist-properties">
            <?php require_once('view-img-tags.php'); ?>
        </div>
    <?php else: ?>
        <p class="text-warning"><?php echo $msg; ?></p>
    <?php endif; ?>
</div>
