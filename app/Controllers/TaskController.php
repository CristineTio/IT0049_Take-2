<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    // Today's tasks dashboard
    public function welcome()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodayTasks();
        return view('welcome', $data);
    }

    // List all tasks
    public function list()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getAllTasks();
        return view('tasks', $data);
    }

    // GET: Show New Task Form
    public function new()
    {
        helper('form');
        return view('tasks/create');
    }

    // POST: Store New Task with Validation
    public function create()
    {
        helper('form');
        
        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return view('tasks/create', ['validation' => $this->validator]);
        }

        $taskModel = new TaskModel();
        $taskModel->save([
            'title'      => $this->request->getPost('title'),
            'task_date'  => $this->request->getPost('task_date'),
            'status'     => $this->request->getPost('status'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created successfully!');
    }

    // GET: Show Edit Form
    public function edit($id)
    {
        helper('form');

        $taskModel = new TaskModel();
        $data['task'] = $taskModel->find($id);

        if (!$data['task']) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/edit', $data);
    }

    // POST: Update Task with Validation
    public function update($id)
    {
        helper('form');

        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            $taskModel = new TaskModel();
            return view('tasks/edit', [
                'validation' => $this->validator,
                'task'       => $taskModel->find($id)
            ]);
        }

        $taskModel = new TaskModel();
        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status'    => $this->request->getPost('status'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully!');
    }

    // GET: Soft Delete (Archive Task)
    public function archive($id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived successfully!');
    }

    // Profile page
    public function profile()
    {
        $userModel = new \App\Models\UserModel();
        $data['user'] = $userModel->getDemoUser();
        return view('profile', $data);
    }

    // About page
    public function about()
    {
        return view('about');
    }
}