<?php
require_once "banco.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $nacionalidade = $_POST['nacionalidade'];
    $descricao = $_POST['descricao'];
    inserirdiretor($nome, $descricao, $ano, $nacionalidade);
}
$diretores = listardiretor();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Diretores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gerenciar Diretores</h1>
        
        <!-- Formulário para adicionar diretores -->
        <form method="POST" class="mb-5">
            <div class="mb-3">
                <label for="nome" class="form-label"><i class="fas fa-user"></i> Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do diretor" required>
            </div>
            <div class="mb-3">
                <label for="ano" class="form-label"><i class="fas fa-calendar-alt"></i> Ano</label>
                <input type="date" class="form-control" id="ano" name="ano" placeholder="Digite o ano de nascimento" required>
            </div>
            <div class="mb-3">
                <label for="nacionalidade" class="form-label"><i class="fas fa-flag"></i> Nacionalidade</label>
                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Digite a nacionalidade" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label"><i class="fas fa-align-left"></i> Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Diretor</button>
        </form>

        <h2 class="mb-3">Lista de Diretores</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fas fa-user"></i> Nome</th>
                    <th><i class="fas fa-calendar-alt"></i> Ano</th>
                    <th><i class="fas fa-flag"></i> Nacionalidade</th>
                    <th><i class="fas fa-align-left"></i> Descrição</th>
                    <th><i class="fas fa-cogs"></i> Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($diretores)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum diretor cadastrado</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($diretores as $diretor): ?>
                        <tr>
                            <td><?php echo $diretor['id']; ?></td>
                            <td><?php echo $diretor['nome']; ?></td>
                            <td><?php echo $diretor['ano']; ?></td>
                            <td><?php echo $diretor['nacionalidade']; ?></td>
                            <td><?php echo $diretor['descricao']; ?></td>
                            <td><a class="btn btn-danger btn-sm" href="adm_diretor.php?id=<?php echo $diretor['id']; ?>">Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
