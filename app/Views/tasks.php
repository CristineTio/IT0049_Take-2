<?= view('templates/header', ['title' => 'All Tasks']) ?>

<h2>All Tasks</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><span class="badge <?= $task['status'] ?>"><?= ucfirst($task['status']) ?></span></td>
                <td><?= $task['task_date'] ?></td>
                <td><?= $task['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>