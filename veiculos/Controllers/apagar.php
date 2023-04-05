<?php
include_once "config.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_veiculo = "DELETE FROM cadastro WHERE id=:id";
    $result_veiculo = $conn->prepare($query_veiculo);
    $result_veiculo->bindParam(':id', $id);

    if($result_veiculo->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Veiculo apagado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Veiculo não apagado com sucesso!</div>"];
    }    
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum Veiculo encontrado!</div>"];
}

echo json_encode($retorna);