<div class="container">
    <p>Check all the tags that apply to your search.</p>
    <?php if (isset($err_msg)): ?>
        <p class="text-danger"><?php echo $err_msg; ?></p>
    <?php endif; ?>
    <?php require_once('view-tags-select-form.php'); ?>
</div>
