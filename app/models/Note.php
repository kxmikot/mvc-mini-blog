<?php
class Note {
    private $pdo;

    public function __construct($pdo) {
        $this -> pdo = $pdo;
    }

    public function allByUser($user_id) {
        $stmt = $this -> pdo -> prepare("SELECT * FROM notes WHERE user_id = :user_id ORDER BY id DESC");
        $stmt -> execute([':user_id' => $user_id]);
        return $stmt->FetchAll(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $title, $content) {
        $stmt = $this -> pdo -> prepare("INSERT INTO notes (user_id, title, content) values (:user_id, :title, :content)");
        return $stmt -> execute([
            ':user_id' => $user_id,
            ':title' => $title,
            ':content' => $content
        ]);
    }

    public function get($id) {
        $stmt = $this -> pdo -> prepare("SELECT * FROM notes WHERE id = :id");
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content) {
        $stmt = $this -> pdo -> prepare("UPDATE notes SET title = :title, content = :content WHERE id = :id");
        return $stmt -> execute([
            ':id' => $id,
            ':title' => $title,
            ':content' => $content
        ]);
    }

    public function delete($id) {
        $stmt = $this -> pdo -> prepare("DELETE FROM notes WHERE id = :id");
        return $stmt -> execute([
            ':id' => $id
        ]);
    }

}