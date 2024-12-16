<?php

require_once 'Database.php';

class Animal {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM animais");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM animais WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $descricao, $especie, $idade) {
        $stmt = $this->db->prepare("INSERT INTO animais (nome, descricao, especie, idade) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $especie, $idade]);
    }

    public function update($id, $nome, $descricao, $especie, $idade) {
        $stmt = $this->db->prepare("UPDATE animais SET nome = ?, descricao = ?, especie = ?, idade = ? WHERE id = ?");
        $stmt->execute([$nome, $descricao, $especie, $idade, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM animais WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>