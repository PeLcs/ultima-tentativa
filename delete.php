<?php
require_once 'Animal.php';

$animalModel = new Animal();
$animalModel->delete($_GET['id']);

header('Location: index.php');
exit;
?>
