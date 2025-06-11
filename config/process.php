<?php
include_once("bd.php");

// Detecta o tipo da requisição
$type = $_REQUEST["type"] ?? null;

if ($type === "create" && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $data_nascimento = $_POST["data_nascimento"];
    $curso = $_POST["curso"];

    if (empty($nome) || empty($email)) {
        header("Location: ../create.php?msg=" . urlencode("Nome e email são obrigatórios."));
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../create.php?msg=" . urlencode("Formato de e-mail inválido."));
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO alunos (nome, email, data_nascimento, curso) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $data_nascimento, $curso);

    if ($stmt->execute()) {
        header("Location: ../index.php?msg=" . urlencode("Aluno cadastrado com sucesso!"));
    } else {
        header("Location: ../index.php?msg=" . urlencode("Erro ao cadastrar aluno: " . $stmt->error));
    }
    exit;
}

if ($type === "edit" && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $data_nascimento = $_POST["data_nascimento"];
    $curso = $_POST["curso"];

    if (empty($nome) || empty($email)) {
        header("Location: ../edit.php?id=$id&msg=" . urlencode("Nome e email são obrigatórios."));
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../edit.php?id=$id&msg=" . urlencode("Formato de e-mail inválido."));
        exit;
    }

    $stmt = $conn->prepare("UPDATE alunos SET nome = ?, email = ?, data_nascimento = ?, curso = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nome, $email, $data_nascimento, $curso, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?msg=" . urlencode("Aluno atualizado com sucesso!"));
    } else {
        header("Location: ../index.php?msg=" . urlencode("Erro ao atualizar aluno: " . $stmt->error));
    }
    exit;
}

if ($type === "delete") {
    // Aceita tanto GET quanto POST
    $id = $_GET["id"] ?? $_POST["id"] ?? null;

    if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
        header("Location: ../index.php?msg=" . urlencode("ID inválido para exclusão."));
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?msg=" . urlencode("Aluno excluído com sucesso!"));
    } else {
        header("Location: ../index.php?msg=" . urlencode("Erro ao excluir aluno: " . $stmt->error));
    }
    exit;
}

// Se nenhum type reconhecido:
header("Location: ../index.php?msg=" . urlencode("Ação inválida."));
exit;
