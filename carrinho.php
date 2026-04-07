<?php
session_start();
ob_start();

$cesta = $_SESSION['cesta'] ?? [];
$total = 0;

// AGRUPAR PRODUTOS
$produtosAgrupados = [];

foreach ($cesta as $p) {
    $id = $p['id'];

    if (!isset($produtosAgrupados[$id])) {
        $produtosAgrupados[$id] = [
            'nome' => $p['nome'],
            'preco' => $p['preco'],
            'qtd' => 1
        ];
    } else {
        $produtosAgrupados[$id]['qtd']++;
    }
}
?>

<h2>Carrinho</h2>

<table class="table table-bordered">
<tr><th>Produto</th><th>Qtd</th><th>Preço</th><th>Total</th></tr>

<?php foreach($produtosAgrupados as $p): 
$subtotal = $p['preco'] * $p['qtd'];
$total += $subtotal;
?>
<tr>
    <td><?= $p['nome'] ?></td>
    <td><?= $p['qtd'] ?></td>
    <td>R$ <?= $p['preco'] ?></td>
    <td>R$ <?= $subtotal ?></td>
</tr>
<?php endforeach; ?>

</table>

<div class="alert alert-info">
    Total de itens: <?= count($cesta) ?><br>
    Valor total: R$ <?= $total ?>
</div>
<script>
function limparCarrinho(){
    fetch("ajax/limpar_carrinho.php")
    .then(() => location.reload());
}
</script>
<button onclick="limparCarrinho()" class="btn btn-danger mb-3">
    Limpar Carrinho
</button>
<?php
$conteudo = ob_get_clean();
include("layout.php");
?>