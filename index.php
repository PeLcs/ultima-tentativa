<?php
require_once 'Animal.php';

$animalModel = new Animal();
$animais = $animalModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinária - CRUD</title>
</head>
<body>
    <h1>Lista de Animais</h1>
    <a href="create.php">Cadastrar Novo Animal</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Espécie</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($animais as $animal): ?>
            <tr>
                <td><?= $animal['id'] ?></td>
                <td><?= htmlspecialchars($animal['nome']) ?></td>
                <td><?= htmlspecialchars($animal['descricao']) ?></td>
                <td><?= htmlspecialchars($animal['especie']) ?></td>
                <td><?= $animal['idade'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $animal['id'] ?>">Editar</a> |
                    <a href="delete.php?id=<?= $animal['id'] ?>" onclick="return confirm('Deseja excluir este registro?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>