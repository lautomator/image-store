    <script src="<?php echo $static_dir . 'vendor/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo $static_dir . 'vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <?php if (in_array($page, $script_pages)): ?>
        <script src="<?php echo $static_dir . 'main.js?v=' . $cache; ?>"></script>

        <?php if ($page == 'properties' && isset($tag_names)): ?>
            <script>
                // tags and targets
                imageStoreApp.currentTags = "<?php echo $tag_names; ?>".split(",").sort();
                imageStoreApp.targets = {
                    "inputTag": document.getElementById("addTag"),
                    "formSuggestions": document.getElementsByClassName("ist-form-suggestions")
                }

                // run the listener function
                imageStoreApp.inputListener(imageStoreApp.targets);
            </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>