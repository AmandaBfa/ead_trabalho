<?php
    include_once(__DIR__ . "/../config/url.php"); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Alunos</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
</head>
<body>
    <header> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
            <div class="container">
                <a class="navbar-brand" href="<?= $BASE_URL ?>index.php">Escola X</a>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" id="home-link" href="<?= $BASE_URL ?>index.php">Escola</a>
                        <a class="nav-link" href="<?= $BASE_URL ?>create.php">Cadastrar Aluno</a>
                    </div>
                </div>
            </div>
        </nav>
    </header> 
