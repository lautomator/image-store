<?php if (! empty($item_terms)): ?>
    <?php $sorted_terms = sort_tags($result['terms'], $item_terms); ?>
    <?php foreach ($sorted_terms as $term_id): ?>
        <?php if (in_array($term_id, $t)): ?>
            <a href="<?php echo $home . '?t=' . $term_id; ?>"><span class="ist-tag ist-tag-queried"><?php echo get_term_name($result['terms'], $term_id); ?></span></a>
        <?php else: ?>
            <a href="<?php echo $home . '?t=' . $term_id; ?>"><span class="ist-tag"><?php echo get_term_name($result['terms'], $term_id); ?></span></a>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>