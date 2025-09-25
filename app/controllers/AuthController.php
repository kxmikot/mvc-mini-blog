<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ .'/../models/User.php';

$userModel = new User($pdo);

class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username && $email && $password) { 
                $this->userModel->create($username, $email, $password);
                header('Location: index.php?action=login');
                exit;
            } else {
                $error = "Please fill all fields";
            }
        }
        require __DIR__ ."/../views/auth/register.php";
    }

    public function login () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->getByEmail($email);

            if ($user && password_verify($password, $user['user_password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: index.php?action=notes');
                exit;
            } else {
                $error = 'Incorrect email or password';
            }
        }
        require __DIR__ .'/../views/auth/login.php';
    }

    public function logout () {
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}