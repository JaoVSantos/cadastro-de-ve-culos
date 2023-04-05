<?php

include_once "config.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
} elseif (empty($dados['nome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['marca'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Modelo!</div>"];
} elseif (empty($dados['ano'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Ano!</div>"];
} elseif (empty($dados['Valor_venda'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Valor de Venda!</div>"];
} else {
    $query_veiculo= "UPDATE cadastro SET nome=:nome, marca=:marca, ano=:ano, Valor_venda=:Valor_venda WHERE id=:id";
    
    $edit_veiculo = $conn->prepare($query_veiculo);
    $edit_veiculo->bindParam(':nome', $dados['nome']);
    $edit_veiculo->bindParam(':marca', $dados['marca']);
    $edit_veiculo->bindParam(':ano', $dados['ano']);
    $edit_veiculo->bindParam(':Valor_venda', $dados['Valor_venda']);
    $edit_veiculo->bindParam(':id', $dados['id']);

    if ($edit_veiculo->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Veiculo editado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Veiculo não editado com sucesso!</div>"];
    }
}

echo json_encode($retorna);
