<?php
session_start();

// Подключаем базу
require_once __DIR__ . '/../config/database.php';

// Подключаем AuthController
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/models/User.php';

// Создаём объект модели и контроллера
$userModel = new User($pdo);
$authController = new AuthController($userModel);

// Получаем action из URL
$action = $_GET['action'] ?? 'login';

// Роутинг
switch ($action) {
    case 'register':
        $authController->register();
        break;

    case 'login':
        $authController->login();
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'notes':
        // страница заметок, защищённая
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        require __DIR__ . '/../app/views/notes/list.php';
        break;

    default:
        echo "Page not found";
        break;
}
