<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new PDO('sqlite:veterinaria.db');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initializeDatabase();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    private function initializeDatabase() {
        $this->connection->exec("
            CREATE TABLE IF NOT EXISTS animais (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                descricao TEXT,
                especie TEXT NOT NULL,
                idade INTEGER NOT NULL
            )
        ");
    }
}
?>