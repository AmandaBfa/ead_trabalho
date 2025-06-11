<?php 
    include_once("config/url.php");
    include_once("config/bd.php");
    include_once("templates/header.php");
?>

<div class="container">
    <h1 class="mb-5">Cadastrar Novo Aluno</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-warning"><?= $_GET['msg'] ?></div>
    <?php endif; ?>

    <form action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome*</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
        </div>

        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <input type="text" class="form-control" name="curso" id="curso">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php include_once("templates/backbtn.html"); ?>
</div>

<?php include_once("templates/footer.php"); ?>
