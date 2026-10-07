<?= view('templates/header', ['title' => 'Today\'s Tasks']) ?>

<h2>Today's Tasks Dashboard</h2>
<p>Date: <strong><?= date('Y-m-d') ?></strong></p>

<?php if (empty($tasks)): ?>
    <p>No tasks scheduled for today.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['id'] ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td><span class="badge <?= $task['status'] ?>"><?= ucfirst($task['status']) ?></span></td>
                    <td><?= $task['task_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= view('templates/footer') ?>