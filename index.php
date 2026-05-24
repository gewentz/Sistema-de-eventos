<?php

require_once __DIR__ . '/App/Core/Database.php';
require_once __DIR__ . '/App/Models/UserDAO.php';
require_once __DIR__ . '/App/Models/EventDAO.php';
require_once __DIR__ . '/App/Controllers/AuthController.php';
require_once __DIR__ . '/App/Controllers/EventController.php';

use App\Controllers\AuthController;
use App\Controllers\EventController;


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriParts = explode('/', trim($requestUri, '/'));

$controllerName = $uriParts[0] ?? '';
$actionName     = $uriParts[1] ?? '';
$id             = $uriParts[2] ?? null;


switch ($controllerName) {
    case '':
    case 'login':
        $auth = new AuthController();
        $auth->login();
        break;

    case 'register':
        $auth = new AuthController();
        $auth->register();
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    case 'dashboard':
        $event = new EventController();
        $event->index();
        break;

    case 'events':
        $event = new EventController();
        if ($actionName === 'create') {
            $event->create();
        } elseif ($actionName === 'edit' && $id) {
            $event->edit($id);
        } elseif ($actionName === 'delete' && $id) {
            $event->delete($id);
        } else {
            $event->index();
        }
        break;

    default:
        http_response_code(404);
        echo "Página 404 - A rota acessada não foi encontrada!";
        break;
}