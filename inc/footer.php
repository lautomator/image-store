    <script src="<?php echo $static_dir . 'vendor/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo $static_dir . 'vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <?php if (in_array($page, $script_pages)): ?>
        <script src="<?php echo $static_dir . 'main.js?v=' . $cache; ?>"></script>

        <!-- properties page -->
        <?php if ($page == 'properties' && isset($tag_names)): ?>
            <script>
                // tags and targets
                imageStoreApp.currentTags = "<?php echo $tag_names; ?>".split(",").sort();
                imageStoreApp.targets = {
                    "inputTag": document.getElementById("addTag"),
                    "formSuggestions": document.getElementsByClassName("ist-form-suggestions"),
                    "formSuggestionsPanel": document.getElementsByClassName("ist-form-suggestions-panel"),
                    "tagSuggestion": document.getElementsByClassName("ist-tag-suggestion")
                };
                // listen for input
                imageStoreApp.inputListener(imageStoreApp.targets);
            </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>