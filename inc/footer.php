    <script src="<?php echo $static_dir . 'vendor/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo $static_dir . 'vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <?php if (in_array($page, $script_pages)): ?>
        <script src="<?php echo $static_dir . 'main.js?v=' . $cache; ?>"></script>

        <!-- scroll compensation -->
        <?php if (isset($has_returned)): ?>
            <?php if ($has_returned): ?>
                <script>window.onload = imageStoreApp.returnScroll;</script>
            <?php endif; ?>
        <?php endif; ?>

        <!-- properties page -->
        <?php if ($page == 'properties' && isset($tag_names)): ?>
            <script>
                // tags and targets
                imageStoreApp.currentTags = "<?php echo $tag_names; ?>".split(",").sort();
                imageStoreApp.targets["inputTag"] = document.getElementById("addTag");
                imageStoreApp.targets["formSuggestions"] = document.getElementsByClassName("ist-form-suggestions");
                imageStoreApp.targets["formSuggestionsPanel"] = document.getElementsByClassName("ist-form-suggestions-panel");
                imageStoreApp.targets["tagSuggestion"] = document.getElementsByClassName("ist-tag-suggestion");

                // listen for input
                imageStoreApp.inputListener(imageStoreApp.targets);
            </script>
        <?php endif; ?>

        <!-- home page -->
        <?php if ($page == 'home'): ?>
            <?php if (isset($max_page_no)): ?>
                <?php if ($max_page_no > 1): ?>
                    <script>
                        // targets
                        imageStoreApp.targets["pageNo"] = document.getElementById("pageNo");
                        // listen for page changes
                        imageStoreApp.pageNoListener(imageStoreApp.targets, <?php echo $max_page_no; ?>, "<?php echo $urls['home']; ?>", "<?php echo $item_queries; ?>");
                    </script>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>


        <!-- viewer page -->
        <?php if ($page == 'viewer'): ?>
            <script>
                imageStoreApp.targets["imgCtrl"] = document.getElementsByClassName("ist-ctrl");
                imageStoreApp.imgCtrls(imageStoreApp.targets["imgCtrl"]);
            </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>