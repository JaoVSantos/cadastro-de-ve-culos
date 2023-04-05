<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Listagem de Carros</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#cadcarrosModal">
                        Cadastrar
                    </button>
                </div>
            </div>
        </div>
        <hr>

        <span id="msgAlerta"></span>

        <div class="row">
            <div class="col-lg-12">
                <span class="listar-carros"></span>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadcarrosModal" tabindex="-1" aria-labelledby="cadcarrosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadcarrosModalLabel">Cadastrar Carro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cad-carros-form">
                        <span id="msgAlertaErroCad"></span>
                        <div class="mb-3">
                            <label for="nome" class="col-form-label">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do veiculo">
                        </div>
                        <div class="mb-3">
                            <label for="marca" class="col-form-label">Modelo:</label>
                            <input type="marca" name="marca" class="form-control" id="marca" placeholder="Digite o Modelo do veiculo">
                        </div>
                        <div class="mb-3">
                            <label for="ano" class="col-form-label">Ano:</label>
                            <input type="ano" name="ano" class="form-control" id="ano" placeholder="Digite o Ano do Veiculo">
                        </div>
                        <div class="mb-3">
                            <label for="Valor_venda" class="col-form-label">Valor de venda:</label>
                            <input type="Valor_venda" name="Valor_venda" class="form-control" id="Valor_venda" placeholder="Digite o Valor de Venda do veiculo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-outline-success btn-sm" id="cad-carros-btn" value="Cadastrar" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="visCarrosModal" tabindex="-1" aria-labelledby="visCarrosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visCarrosModalLabel">Detalhes do Veiculo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span>
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="idCarro"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="nomeCarro"></span></dd>

                        <dt class="col-sm-3">Modelo</dt>
                        <dd class="col-sm-9"><span id="marcaCarro"></span></dd>

                        <dt class="col-sm-3">Ano</dt>
                        <dd class="col-sm-9"><span id="anoCarro"></span></dd>

                        <dt class="col-sm-3">Valor de venda</dt>
                        <dd class="col-sm-9"><span id="valorCarro"></span></dd>

                    </dl>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editCarrosModal" tabindex="-1" aria-labelledby="editCarrosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCarrosModalLabel">Editar Veiculo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-carros-form">
                        <span id="msgAlertaErroEdit"></span>

                        <input type="hidden" name="id" id="editid">

                        <div class="mb-3">
                            <label for="nome" class="col-form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="editnome" placeholder="Digite o nome ">
                        </div>
                        <div class="mb-3">
                            <label for="marca" class="col-form-label">Modelo</label>
                            <input type="text" name="marca" class="form-control" id="editmarca" placeholder="Digite o Modelo">
                        </div>
                        <div class="mb-3">
                            <label for="ano" class="col-form-label">Ano</label>
                            <input type="text" name="ano" class="form-control" id="editano" placeholder="Digite o Ano">
                        </div>
                        <div class="mb-3">
                            <label for="Valor_venda" class="col-form-label">Valor da venda</label>
                            <input type="text" name="Valor_venda" class="form-control" id="editvalor_venda" placeholder="Digite o Valor">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-outline-warning btn-sm" id="edit-carros-btn" value="Salvar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../Script/CRUD.js"></script>
</body>

</html>