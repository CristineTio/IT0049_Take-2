<?= view('templates/header', ['title' => 'New Task']) ?>

<h2>Create New Task</h2>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/tasks/create') ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label>Title</label>
        <input type="text" name="title" value="<?= set_value('title') ?>">
    </div>
    <div>
        <label>Task Date</label>
        <input type="date" name="task_date" value="<?= set_value('task_date', date('Y-m-d')) ?>">
    </div>
    <div>
        <label>Status</label>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Save Task</button>
    <a href="<?= base_url('/tasks') ?>" class="btn">Cancel</a>
</form>

<?= view('templates/footer') ?>