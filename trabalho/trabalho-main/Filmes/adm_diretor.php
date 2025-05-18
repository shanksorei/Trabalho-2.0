<?php
require_once 'banco.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    if ($acao === 'inserir') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $ano = $_POST['txt_ano'];
            $nacionalidade = $_POST['txt_nacionalidade']; 
            if ($nome && $descricao && $ano && $nacionalidade ) {
                inserirdiretor($nome, $descricao, $ano, $nacionalidade);
                header('Location: diretor.php');
                exit;
            }
        }
        header('Location: diretor.php');
        exit;
    }
    if ($acao === 'deletar') {
        $id = $_GET['id']; 
        if ($id) {
            excluirdiretor($id);
            header('Location: diretor.php');
            exit;
        }
        header('Location: diretor.php');
        exit;
    }
}
header('Location: diretor.php');
exit;
