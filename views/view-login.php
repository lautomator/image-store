<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form action="../inc/authenticate.php" method="post">
                <input type="text" name="username" required placeholder="username">
                <input type="password" name="password" required placeholder="password">
                <input type="submit" name="login" value="Login">
                <?php if (isset($login_err)): ?>
                    <p class="text-danger"><?php echo $login_err; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
