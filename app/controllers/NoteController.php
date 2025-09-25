<?php
session_start();
require_once __DIR__ ."/../../config/database.php";
require_once __DIR__ ."/../models/Note.php";

$noteModel = new Note($pdo);

class NoteController {
    private $noteModel;

    public function __construct($noteModel) {
        $this-> noteModel = $noteModel;
    }

    public function index() {
        $notes = $this -> noteModel -> allByUser($_SESSION['user_id']);
        require __DIR__ .'/../views/notes/list.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $this -> noteModel -> create($_SESSION['user_id'], $title, $content);
            header('Location: index.php?action=notes');
            exit;
        }
        require __DIR__ .'/../views/notes/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        $note = $this -> noteModel -> get($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ??'';
            $content = $_POST['content'] ??'';
            $this -> noteModel -> update($id, $title, $content);
            header('Location: index.php?action=notes');
            exit;
        }
        require __DIR__ .'/../views/notes/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        $this -> noteModel -> delete($id);
        header('Location: index.php?action=notes');
        exit;
    }

}