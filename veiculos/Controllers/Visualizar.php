<?php
include_once "config.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_veiculo = "SELECT id, nome, marca, ano, Valor_venda FROM cadastro WHERE id =:id LIMIT 1";
    $result_veiculo = $conn->prepare($query_veiculo);
    $result_veiculo->bindParam(':id', $id);
    $result_veiculo->execute();

    $row_veiculo = $result_veiculo->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_veiculo];    
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}

echo json_encode($retorna);
