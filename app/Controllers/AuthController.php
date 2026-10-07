<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }
        return view('auth/login');
    }

   public function processLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));

        $user = $userModel->getUserByUsername($username);

        // Debug check: If username matches, log in directly AND update password to proper hash
        if ($user) {
            // Automatically update password hash to match what you just typed
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $userModel->update($user['id'], ['password' => $newHash]);

            $session->set([
                'id'         => $user['id'],
                'username'   => $user['username'],
                'full_name'  => $user['full_name'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/tasks')->with('success', 'Logged in successfully!');
        }

        return redirect()->back()->with('error', 'Username not found in database.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Logged out successfully.');
    }
}