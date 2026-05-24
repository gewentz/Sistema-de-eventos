<?php
namespace App\Controllers;

use App\Models\UserDAO;

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $userDAO = new UserDAO();
            $user = $userDAO->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: /dashboard');
                exit;
            } else {
                $error = "E-mail ou senha inválidos.";
                require __DIR__ . '/../Views/auth/login.php';
            }
        } else {
            require __DIR__ . '/../Views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $userDAO = new UserDAO();
            if ($userDAO->register($name, $email, $password)) {
                header('Location: /login');
                exit;
            } else {
                $error = "Erro ao registrar usuário.";
                require __DIR__ . '/../Views/auth/register.php';
            }
        } else {
            require __DIR__ . '/../Views/auth/register.php';
        }
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
