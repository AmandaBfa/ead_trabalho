<?php
    include_once("config/bd.php");
    include_once("templates/header.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: index.php?msg=ID inválido");
        exit;
    }

    // Buscar dados do aluno
    $stmt = $conn->prepare("SELECT * FROM alunos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $aluno = $result->fetch_assoc();

    if (!$aluno) {
        header("Location: index.php?msg=Aluno não encontrado");
        exit;
    }
?>

<div class="container">
    <h1 class="mb-4">Editar Aluno</h1>

    <form action="config/process.php" method="POST">
        <input type="hidden" name="type" value="update">
        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome*</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="<?= htmlspecialchars($aluno['nome']) ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($aluno['email']) ?>">
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $aluno['data_nascimento'] ?>">
        </div>

        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <input type="text" class="form-control" id="curso" name="curso" value="<?= htmlspecialchars($aluno['curso']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="index.php" class="btn btn-secondary">Voltar ao Menu</a>
    </form>
</div>

<?php include_once("templates/footer.php"); ?>
