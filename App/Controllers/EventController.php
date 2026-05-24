<?php
namespace App\Controllers;

use App\Models\EventDAO;

class EventController {
    
    public function __construct() {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    public function index() {
        $eventDAO = new EventDAO();
        $myEvents = $eventDAO->getAllByUser($_SESSION['user_id']);
        $allEvents = $eventDAO->getAll();

        require __DIR__ . '/../Views/dashboard/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $eventDate = $_POST['event_date'];

            $eventDAO = new EventDAO();
            $eventDAO->create($_SESSION['user_id'], $title, $description, $eventDate);
            header('Location: /dashboard');
            exit;
        }
        require __DIR__ . '/../Views/events/create.php';
    }

    public function edit($id) {
        $eventDAO = new EventDAO();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $eventDate = $_POST['event_date'];

            $eventDAO->update($id, $_SESSION['user_id'], $title, $description, $eventDate);
            header('Location: /dashboard');
            exit;
        }

        $event = $eventDAO->getById($id, $_SESSION['user_id']);
        if (!$event) {
            header('Location: /dashboard');
            exit;
        }
        require __DIR__ . '/../Views/events/edit.php';
    }

    public function delete($id) {
        $eventDAO = new EventDAO();
        $eventDAO->delete($id, $_SESSION['user_id']);
        header('Location: /dashboard');
        exit;
    }
}