<?php

require_once('../inc/settings.php');
require_once($home . 'inc/urls.php');
require_once($home . 'inc/main.php');
require_once($home . 'inc/data.php');

// $item_terms = array();
$all_records = $result['img_data'];

// if (isset ($_GET['p'])) {
//     $current_page = $_GET['p'];
// } else {
//     $current_page = $default_page;
// }

// $page_info = paginate($all_records, $current_page, $max_records_per_page);
// $page_items = $page_info['pages'];
// $pagination_code = $page_info['pagination_code'];

require_once($home . 'inc/header.php');
require_once($home . 'inc/nav.php');
// require('templates/image-properties.php');
require_once($home . 'inc/footer.php');

echo '<pre>';
print_r($all_records);
echo '</pre>';
