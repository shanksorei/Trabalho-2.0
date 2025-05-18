<?php
function conectar() {
    //$mysqli = new mysqli("localhost", "root", "", "lojaindustrial");    
    $mysqli = new mysqli("localhost", "root", "", "trabalho");    
    if ($mysqli->connect_error) {
        die("Falha: ".$mysqli->connect_error);
    }    
    return $mysqli;
}
function inserirdiretor($nome, $descricao,  $ano, $nacionalidade) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
        INSERT INTO tb_diretor
        (nome, descricao, ano, nacionalidade) 
        VALUES (?, ?, ?, ? )
    ");
    $stmt->bind_param("ssss", $nome, $descricao,  $ano, $nacionalidade);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}
function excluirdiretor($id) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
    DELETE FROM tb_diretor WHERE id = ?");
    $stmt->bind_param("i", $id);    
    $stmt->execute();   
    $stmt->close();
    $mysqli->close();
}
function listardiretor() {
    $mysqli = conectar();
    $sql = "SELECT id, nome, descricao, ano, nacionalidade
    FROM tb_diretor";
    $result = $mysqli->query($sql);
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $mysqli->close();
    return $categorias;
}

