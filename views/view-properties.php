<div class="container">
    <div class="ist-properties">
        <?php if ($render): ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td rowspan="4"  class="ist-cell-40">
                            <img class="ist-review-img" src="<?php echo $img_path; ?>">
                        </td>
                        <td class="ist-cell-60">
                            <code>id: </code><?php echo $record['file_id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td  class="ist-cell-60">
                            <code>name: </code><span class="ist-file-names"><?php echo $record['file_name']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td  class="ist-cell-60">
                            <code>path: </code><a href="<?php echo $img_path; ?>" target="_blank"><span class="ist-file-names"><?php echo $img_path; ?></span></a>
                        </td>
                    </tr>
                    <tr>
                        <td  class="ist-cell-60">
                            <code>tags: </code><?php require_once('view-img-tags.php'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="danger"><?php echo $msg; ?></p>
        <?php endif; ?>
    </div>
</div>
