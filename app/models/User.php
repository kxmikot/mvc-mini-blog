<?php 
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($username, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, user_password) VALUES (:username, :email, :password)");
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function getByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}