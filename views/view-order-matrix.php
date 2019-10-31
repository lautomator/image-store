<table class="table">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($sequence_matrix as $seq): ?>
            <tr>
                <td><input type="radio" <?php echo (key($sequence_matrix) == 1) ? 'checked' : ''; ?> name="imgSequence" value="<?php echo $seq[0] . ',' . $seq[1] . ',' .$seq[2]; ?>"></td>
                <td><img class="ist-seq-thmb" src="<?php echo '../' . $cart_items[$seq[0]]['file_path'] . $cart_items[$seq[0]]['file_name'] . '.' . $cart_items[$seq[0]]['file_ext']; ?>" alt="<?php echo $cart_items[$seq[0]]['file_name']; ?>"></td>
                <td><img class="ist-seq-thmb" src="<?php echo '../' . $cart_items[$seq[1]]['file_path'] . $cart_items[$seq[1]]['file_name'] . '.' . $cart_items[$seq[1]]['file_ext']; ?>" alt="<?php echo $cart_items[$seq[1]]['file_name']; ?>"></td>
                <td><img class="ist-seq-thmb" src="<?php echo '../' . $cart_items[$seq[2]]['file_path'] . $cart_items[$seq[2]]['file_name'] . '.' . $cart_items[$seq[2]]['file_ext']; ?>" alt="<?php echo $cart_items[$seq[2]]['file_name']; ?>"></td>
            </tr>
            <?php next($sequence_matrix); ?>
        <?php endforeach; ?>
    </tbody>
</table>