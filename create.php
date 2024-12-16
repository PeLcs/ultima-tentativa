<?php
require_once 'Animal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalModel = new Animal();
    $animalModel->create($_POST['nome'], $_POST['descricao'], $_POST['especie'], (int)$_POST['idade']);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Animal</title>
</head>
<body>
    <h1>Cadastrar Animal</h1>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>
        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br>
        <label>Espécie:</label><br>
        <input type="text" name="especie" required><br>
        <label>Idade:</label><br>
        <input type="number" name="idade" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
