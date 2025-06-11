<?php include('../config/db.php');

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
