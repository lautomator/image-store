<div class="container">
    <?php if ($result['status'] == 1): ?>
        <p class="text-danger"><?php echo $result['err_msg']; ?></p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>path</th>
                    <th>name</th>
                    <th>tags</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result['data'] as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['path']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>*</td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php //print_r($result['data']); ?>
    <?php endif; ?>
</div>