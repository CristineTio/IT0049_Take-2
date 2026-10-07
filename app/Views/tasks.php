<?= view('templates/header', ['title' => 'All Tasks']) ?>

<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>All Tasks</h2>
    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('/tasks/new') ?>" class="btn btn-primary">+ Add New Task</a>
    <?php endif; ?>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <?php if (session()->get('isLoggedIn')): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><span class="badge <?= $task['status'] ?>"><?= ucfirst($task['status']) ?></span></td>
                <td><?= $task['task_date'] ?></td>
                <?php if (session()->get('isLoggedIn')): ?>
                    <td>
                        <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('/tasks/archive/' . $task['id']) ?>" class="btn btn-danger" onclick="return confirm('Archive this task?')">Archive</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>