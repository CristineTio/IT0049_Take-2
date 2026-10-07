<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Task System' ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f9; color: #333; }
        nav { margin-bottom: 20px; background: #fff; padding: 15px; border-radius: 8px; }
        nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { background: #fff; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f8f9fa; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; color: #fff; }
        .pending { background: #ffc107; color: #000; }
        .completed { background: #28a745; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Dashboard (Today)</a>
        <a href="<?= base_url('/tasks') ?>">All Tasks</a>
        <a href="<?= base_url('/profile') ?>">Profile</a>
        <a href="<?= base_url('/about') ?>">About</a>
    </nav>
    <div class="container">