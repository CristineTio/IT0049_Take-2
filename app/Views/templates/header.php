<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Task System' ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f9; color: #333; }
        nav { margin-bottom: 20px; background: #fff; padding: 15px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; }
        nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { background: #fff; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f8f9fa; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; color: #fff; }
        .pending { background: #ffc107; color: #000; }
        .completed { background: #28a745; }
        .btn { display: inline-block; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-danger { background: #dc3545; color: white; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-danger { background: #f8d7da; color: #721c24; }
        .alert-success { background: #d4edda; color: #155724; }
        form label { display: block; margin-top: 10px; font-weight: bold; }
        form input, form select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="<?= base_url('/') ?>">Dashboard (Today)</a>
            <a href="<?= base_url('/tasks') ?>">All Tasks</a>
            <a href="<?= base_url('/profile') ?>">Profile</a>
            <a href="<?= base_url('/about') ?>">About</a>
        </div>
        <div>
            <?php if (session()->get('isLoggedIn')): ?>
                <span>Welcome, <strong><?= esc(session()->get('full_name')) ?></strong></span>
                <a href="<?= base_url('/logout') ?>" style="margin-left: 15px; color: red;">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('/login') ?>">Login</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>