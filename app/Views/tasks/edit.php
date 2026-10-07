<?= view('templates/header', ['title' => 'Edit Task']) ?>

<h2>Edit Task</h2>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/tasks/update/' . $task['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label>Title</label>
        <input type="text" name="title" value="<?= set_value('title', $task['title']) ?>">
    </div>
    <div>
        <label>Task Date</label>
        <input type="date" name="task_date" value="<?= set_value('task_date', $task['task_date']) ?>">
    </div>
    <div>
        <label>Status</label>
        <select name="status">
            <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update Task</button>
    <a href="<?= base_url('/tasks') ?>" class="btn">Cancel</a>
</form>

<?= view('templates/footer') ?>