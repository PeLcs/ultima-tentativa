<?php
require_once 'Animal.php';

$animalModel = new Animal();
$animal = $animalModel->getById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalModel->update($_GET['id'], $_POST['nome'], $_POST['descricao'], $_POST['especie'], (int)$_POST['idade']);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
</head>
<body>
    <h1>Editar Animal</h1>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($animal['nome']) ?>" required><br>
        <label>Descrição:</label><br>
        <textarea name="descricao"><?= htmlspecialchars($animal['descricao']) ?></textarea><br>
        <label>Espécie:</label><br>
        <input type="text" name="especie" value="<?= htmlspecialchars($animal['especie']) ?>" required><br>
        <label>Idade:</label><br>
        <input type="number" name="idade" value="<?= $animal['idade'] ?>" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
