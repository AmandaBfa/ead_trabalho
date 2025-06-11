<?php
    include_once("templates/header.php");
    include_once("config/bd.php");

    // Mensagem de operação (opcionalmente passada por GET)
    $printMsg = isset($_GET['msg']) ? $_GET['msg'] : '';

    // Busca todos os alunos
    $sql = "SELECT * FROM alunos ORDER BY id DESC";
    $result = $conn->query($sql);
    $alunos = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $alunos[] = $row;
        }
    }
?>

<div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
           <p id="msg"><?= $printMsg ?></p> 
    <?php endif; ?>

    <h1 id="main-title">Minha Agenda de Alunos</h1>

    <?php if(count($alunos) > 0): ?>
        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alunos as $aluno): ?>
                    <tr>
                        <td scope="row"><?= $aluno["id"] ?></td>
                        <td><?= $aluno["nome"] ?></td>
                        <td><?= $aluno["email"] ?></td>
                        <td><?= $aluno["curso"] ?></td>
                    </tr>
                    <td>
                        <a href="edit.php?id=<?= $aluno['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="config/process.php?type=delete&id=<?= $aluno['id'] ?>" onclick="return confirm('Tem certeza?');" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p id="empty-list-text">Ainda não há alunos cadastrados, <a href="<?= $BASE_URL ?>cadastro.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>
</div>

<?php
    include_once("templates/footer.php");
?>
