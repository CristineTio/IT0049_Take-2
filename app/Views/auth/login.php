<?= view('templates/header', ['title' => 'Login']) ?>

<h2>Login</h2>
<form action="<?= base_url('/login') ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label>Username</label>
        <input type="text" name="username" required placeholder="Enter username">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" required placeholder="Enter password">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?= view('templates/footer') ?>