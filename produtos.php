<?php
include("config/conexao.php");
ob_start();
?>

<h2>Produtos</h2>

<form id="formProduto">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>

    <select name="fornecedor" required>
        <?php
        $res = $conn->query("SELECT * FROM fornecedores");
        while($f = $res->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='{$f['id']}'>{$f['nome']}</option>";
        }
        ?>
    </select>

    <button>Salvar</button>
</form>

<hr>

<div id="listaProdutos"></div>

<script>
document.getElementById("formProduto").addEventListener("submit", function(e){
    e.preventDefault();

    fetch("ajax/salvar_produto.php", {
        method: "POST",
        body: new FormData(this)
    }).then(() => {
        carregar();
        this.reset();
    });
});

function carregar(){
    fetch("ajax/listar_produtos.php")
    .then(r => r.text())
    .then(html => document.getElementById("listaProdutos").innerHTML = html);
}

carregar();
</script>

<?php
$conteudo = ob_get_clean();
include("layout.php");
?>