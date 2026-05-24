<?php
namespace App\Models;

use App\Core\Database;

class EventDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    
    public function create($userId, $title, $description, $eventDate) {
        $sql = "INSERT INTO events (user_id, title, description, event_date) VALUES (:user_id, :title, :description, :event_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':event_date', $eventDate);
        
        return $stmt->execute();
    }

    
    public function getAllByUser($userId) {
        $sql = "SELECT * FROM events WHERE user_id = :user_id ORDER BY event_date ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    
    public function getById($eventId, $userId) {
        $sql = "SELECT * FROM events WHERE id = :id AND user_id = :user_id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $eventId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    
    public function update($eventId, $userId, $title, $description, $eventDate) {
        $sql = "UPDATE events SET title = :title, description = :description, event_date = :event_date WHERE id = :id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title' => $title, ':description' => $description, 
            ':event_date' => $eventDate, ':id' => $eventId, ':user_id' => $userId
        ]);
    }

    
    public function getAll() {
        $sql = "SELECT events.*, users.name as owner_name FROM events 
                JOIN users ON events.user_id = users.id 
                ORDER BY events.event_date ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function delete($eventId, $userId) {
        $sql = "DELETE FROM events WHERE id = :id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $eventId, ':user_id' => $userId]);
    }
}