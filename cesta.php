<?php
include("config/conexao.php");
ob_start();
?>

<h2>Selecionar Produtos</h2>

<form id="formCesta">

<?php
$res = $conn->query("SELECT * FROM produtos");

while($p = $res->fetch(PDO::FETCH_ASSOC)){
    echo "
    <div>
        <input type='checkbox' name='produtos[]' value='{$p['id']}'>
        {$p['nome']} - R$ {$p['preco']}
    </div>";
}
?>

<button>Adicionar à cesta</button>
</form>

<script>
document.getElementById("formCesta").addEventListener("submit", function(e){
    e.preventDefault();

    fetch("ajax/adicionar_cesta.php", {
        method: "POST",
        body: new FormData(this)
    }).then(() => alert("Adicionado!"));
});
</script>

<?php
$conteudo = ob_get_clean();
include("layout.php");
?>