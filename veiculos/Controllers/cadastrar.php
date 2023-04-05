<?php

include_once "config.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['nome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
} elseif (empty($dados['marca'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Marca!</div>"];
} elseif (empty($dados['ano'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Ano!</div>"];
} elseif (empty($dados['Valor_venda'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Valor da Venda!</div>"];
} else {
    $query_veiculo = "INSERT INTO cadastro (nome, marca, ano, Valor_venda) VALUES (:nome, :marca, :ano, :Valor_venda)";
    $cad_veiculo = $conn->prepare($query_veiculo);
    $cad_veiculo->bindParam(':nome', $dados['nome']);
    $cad_veiculo->bindParam(':marca', $dados['marca']);
    $cad_veiculo->bindParam(':ano', $dados['ano']);
    $cad_veiculo->bindParam(':Valor_venda', $dados['Valor_venda']);
    $cad_veiculo->execute();

    if ($cad_veiculo->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Veiculo cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Veiculo não cadastrado com sucesso!</div>"];
    }
}

echo json_encode($retorna);
