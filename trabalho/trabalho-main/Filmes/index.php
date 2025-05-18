<?php


require_once "banco.php";


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmes - Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #181818 url('https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=1500&q=80') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .banner {
            background: linear-gradient(90deg, #000 0%, #232526 100%);
            color: #fff;
            padding: 60px 0 40px 0;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.3);
        }
        .filme-card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s;
            background: #222d;
            color: #fff;
        }
        .filme-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 6px 24px rgba(0,0,0,0.4);
        }
        .filme-img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            background: #333;
        }
        .filme-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.2rem;
            color: #fff;
        }
        .filme-info {
            font-size: 0.95rem;
            color: #bbb;
        }
        .add-btn {
            margin-top: 30px;
        }
        .btn-primary, .btn-primary:focus, .btn-primary:hover {
            background: #1a2980;
            border: none;
        }
        .btn-secondary, .btn-secondary:focus, .btn-secondary:hover {
            background: #232526;
            border: none;
        }
        .alert-info {
            background: #232526;
            color: #fff;
            border: none;
        }
        /* Fundo escuro para melhor leitura */
        .container, .banner {
            background: rgba(24,24,24,0.92);
        }
    </style>
</head>
<body>
    <div class="banner">
        <h1><i class="fas fa-film"></i> Bem-vindo ao Catálogo de Filmes</h1>
        <p>Veja os filmes cadastrados ou <a href="filme.php" class="btn btn-light btn-sm ms-2"><i class="fas fa-plus"></i> Adicione um novo filme</a></p>
    </div>
    <div class="container">
        <h2 class="mb-4 text-center">Filmes em Destaque</h2>
        <div class="row g-4">
            <!-- Card de exemplo fixo -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="filme-card">
                    <img src="https://m.media-amazon.com/images/I/81p+xe8cbnL._AC_SY679_.jpg" class="filme-img" alt="Imagem do filme exemplo">
                    <div class="p-3">
                        <div class="filme-title">Exemplo: Interestelar</div>
                        <div class="filme-info">
                            <i class="fas fa-user"></i> Christopher Nolan<br>
                            <i class="fas fa-calendar-alt"></i> 06/11/2014
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim do card de exemplo -->
            <?php if (empty($filmes)): ?>
                <div class="col-12 text-center">
                    <div class="alert alert-info">Nenhum filme cadastrado ainda.</div>
                </div>
            <?php else: ?>
                <?php foreach ($filmes as $filme): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="filme-card">
                            <img src="<?= htmlspecialchars($filme['imagem']) ?>" class="filme-img" alt="Imagem do filme">
                            <div class="p-3">
                                <div class="filme-title"><?= htmlspecialchars($filme['titulo']) ?></div>
                                <div class="filme-info">
                                    <i class="fas fa-user"></i> <?= htmlspecialchars($filme['diretor']) ?><br>
                                    <i class="fas fa-calendar-alt"></i>
                                    <?= !empty($filme['ano']) ? date('d/m/Y', strtotime($filme['ano'])) : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="text-center add-btn">
            <a href="filme.php" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> Adicionar Filme
            </a>
            <a href="diretor.php" class="btn btn-secondary btn-lg ms-2">
                <i class="fas fa-user"></i> Gerenciar Diretores
            </a>
        </div>
    </div>
</body>
</html>