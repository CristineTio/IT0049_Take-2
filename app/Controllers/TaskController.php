<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    // Welcome Page (/) - Today's tasks only
    public function welcome()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodayTasks();
        return view('welcome', $data);
    }

    // Task List Page (/tasks) - All tasks
    public function list()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getAllTasks();
        return view('tasks', $data);
    }

    // Profile Page (/profile) - Demo user
    public function profile()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->getDemoUser();
        return view('profile', $data);
    }

    // About Page (/about) - Static info
    public function about()
    {
        return view('about');
    }
}