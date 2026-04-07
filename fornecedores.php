<?php
ob_start();
?>

<h2>Fornecedores</h2>

<div class="card p-3 shadow-sm mb-3">
<form id="formFornecedor">
    <input class="form-control mb-2" name="nome" placeholder="Nome">
    <input class="form-control mb-2" name="cnpj" placeholder="CNPJ">
    <button class="btn btn-primary">Salvar</button>
</form>
</div>

<div class="card p-3 shadow-sm">
    <div id="listaFornecedores"></div>
</div>

<script>
document.getElementById("formFornecedor").addEventListener("submit", function(e){
    e.preventDefault();

    fetch("ajax/salvar_fornecedor.php", {
        method: "POST",
        body: new FormData(this)
    }).then(() => carregar());
});

function carregar(){
    fetch("ajax/listar_fornecedores.php")
    .then(r => r.text())
    .then(html => document.getElementById("listaFornecedores").innerHTML = html);
}

carregar();
</script>

<?php
$conteudo = ob_get_clean();
include("layout.php");
?>