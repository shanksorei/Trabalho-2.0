<?php
require_once "banco.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $link = $_POST['link'];
    $titulo = $_POST['titulo'];
    $ano = $_POST['ano'];
    $diretor = $_POST['diretor'];
    inserirfilme($link, $titulo, $ano, $diretor);
}
$filmes = listarfilme();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gerenciar Filmes</h1>
        
        <!-- Formulário para adicionar filmes -->
        <form method="POST" class="mb-5">
            <div class="mb-3">
                <label for="link" class="form-label"><i class="fas fa-link"></i> Link</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Digite o link do filme" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label"><i class="fas fa-film"></i> Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do filme" required>
            </div>
            <div class="mb-3">
                <label for="ano" class="form-label"><i class="fas fa-calendar-alt"></i> Ano</label>
                <input type="number" class="form-control" id="ano" name="ano" placeholder="Digite o ano de lançamento" required>
            </div>
            <div class="mb-3">
                <label for="diretor" class="form-label"><i class="fas fa-user"></i> Diretor</label>
                <input type="text" class="form-control" id="diretor" name="diretor" placeholder="Digite o nome do diretor" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Filme</button>
        </form>

        <h2 class="mb-3">Lista de Filmes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fas fa-link"></i> Link</th>
                    <th><i class="fas fa-film"></i> Título</th>
                    <th><i class="fas fa-calendar-alt"></i> Ano</th>
                    <th><i class="fas fa-user"></i> Diretor</th>
                    <th><i class="fas fa-cogs"></i> Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($filmes)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum filme cadastrado</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($filmes as $filme): ?>
                        <tr>
                            <td><?php echo $filme['id']; ?></td>
                            <td><a href="<?php echo $filme['link']; ?>" target="_blank"><?php echo $filme['link']; ?></a></td>
                            <td><?php echo $filme['titulo']; ?></td>
                            <td><?php echo $filme['ano']; ?></td>
                            <td><?php echo $filme['diretor']; ?></td>
                            <td><a class="btn btn-danger btn-sm" href="adm_filme.php?id=<?php echo $filme['id']; ?>">Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>