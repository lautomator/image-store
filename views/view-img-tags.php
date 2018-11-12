<?php if (! empty($item_terms)): ?>
    <?php $sorted_terms = sort_tags($result['terms'], $item_terms); ?>
    <?php foreach ($sorted_terms as $term_id): ?>
        <a href="<?php echo $home . '?t=' . $term_id; ?>"><span class="ist-tag"><?php echo get_term_name($result['terms'], $term_id); ?></span></a>
    <?php endforeach; ?>
<?php endif; ?>