<?= view('templates/header', ['title' => 'User Profile']) ?>

<h2>User Profile</h2>

<?php if ($user): ?>
    <ul>
        <li><strong>Username:</strong> <?= esc($user['username']) ?></li>
        <li><strong>Full Name:</strong> <?= esc($user['full_name']) ?></li>
        <li><strong>Email:</strong> <?= esc($user['email']) ?></li>
        <li><strong>Member Since:</strong> <?= esc($user['created_at']) ?></li>
    </ul>
<?php else: ?>
    <p>No profile record found.</p>
<?php endif; ?>

<?= view('templates/footer') ?>