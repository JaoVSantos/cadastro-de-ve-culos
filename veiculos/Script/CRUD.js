const tbody = document.querySelector(".listar-carros");
const cadForm = document.getElementById("cad-carros-form");
const editForm = document.getElementById("edit-carros-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadcarrosModal"));

const listarCarros = async (pagina) => {
    const dados = await fetch("./lista.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarCarros(1);

cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    document.getElementById("cad-carros-btn").value = "Salvando...";

    if (document.getElementById("nome").value === "") {
        msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>";
    } else if (document.getElementById("marca").value === "") {
        msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Marca!</div>";
    } else if (document.getElementById("ano").value === "") {
        msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Ano!</div>";
    } else if (document.getElementById("Valor_venda").value === "") {
        msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Valor da Venda!</div>";
    } else {
        const dadosForm = new FormData(cadForm);
        dadosForm.append("add", 1);

        const dados = await fetch("./cadastrar.php", {
            method: "POST",
            body: dadosForm,
        });

        const resposta = await dados.json();

        if (resposta['erro']) {
            msgAlertaErroCad.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            cadForm.reset();
            cadModal.hide();
            listarCarros(1);
        }
    }

    document.getElementById("cad-carros-btn").value = "Cadastrar";
});

async function visCarros(id) {
    //console.log("Acessou: " + id);
    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const visModal = new bootstrap.Modal(document.getElementById("visCarrosModal"));
        visModal.show();

        document.getElementById("idCarro").innerHTML = resposta['dados'].id;
        document.getElementById("nomeCarro").innerHTML = resposta['dados'].nome;
        document.getElementById("marcaCarro").innerHTML = resposta['dados'].marca;
        document.getElementById("anoCarro").innerHTML = resposta['dados'].ano;
        document.getElementById("valorCarro").innerHTML = resposta['dados'].Valor_venda;
    }

}

async function editCarrosDados(id) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('Visualizar.php?id=' + id);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editModal = new bootstrap.Modal(document.getElementById("editCarrosModal"));
        editModal.show();
        document.getElementById("editid").value = resposta['dados'].id;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("editmarca").value = resposta['dados'].marca;
        document.getElementById("editano").value = resposta['dados'].ano;
        document.getElementById("editvalor_venda").value = resposta['dados'].Valor_venda;
    }
}

editForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    document.getElementById("edit-carros-btn").value = "Salvando...";

    const dadosForm = new FormData(editForm);
    //console.log(dadosForm);
    /*for (var dadosFormEdit of dadosForm.entries()){
        console.log(dadosFormEdit[0] + " - " + dadosFormEdit[1]);
    }*/

    const dados = await fetch("editar.php", {
        method: "POST",
        body: dadosForm
    });

    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlertaErroEdit.innerHTML = resposta['msg'];
    } else {
        msgAlertaErroEdit.innerHTML = resposta['msg'];
        listarCarros(1);
    }

    document.getElementById("edit-carros-btn").value = "Salvar";
});

async function apagarCarrosDados(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if(confirmar == true){
        const dados = await fetch('apagar.php?id=' + id);

        const resposta = await dados.json();
        if (resposta['erro']) {
            msgAlerta.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            listarCarros(1);
        }
    }    

}