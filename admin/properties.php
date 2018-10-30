<?php

$page = 'properties';
$render = false;

require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

if (isset($_GET['img_id'])) {
    $img_id = $_GET['img_id'];
    $record = get_records($result['img_data'], array($img_id))[0];

    if (empty($record)) {
        $msg = 'There is no record for id = ' . $img_id . '.';
    } else {
        $item_terms = get_terms($result['term_rels'], $_GET['img_id']);
        $img_path = $home . $record['file_path'] . $record['file_name'] . '.' . $record['file_ext'];
        $tag_names = get_all_term_names($result['terms']);
        $render = true;
    }
} else {
    $msg = 'There is no record for that entry.';
}

require('../views/view-properties.php');
require('../views/view-tags-add-form.php');
require_once('../inc/footer.php');

// add the tag names to javascript
if (isset($tag_names)) {
    // tags
    echo '<script>imageStoreApp.currentTags = "' . $tag_names . '".split(",").sort();</script>';
    // html targets
    echo '<script>imageStoreApp.targets = {"inputTag": document.getElementById("addTag"), "formSuggestions": document.getElementsByClassName("ist-form-suggestions")}</script>';
    // run listener function
    echo '<script>imageStoreApp.targets.inputTag.addEventListener("keypress", function(item){imageStoreApp.tagPrefill(imageStoreApp.targets, imageStoreApp.currentTags, item.key)});</script>';
}