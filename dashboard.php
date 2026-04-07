<?php
include("config/conexao.php");

// pegar dados do banco (CORRIGIDO PDO)
$totalProdutos = $conn->query("SELECT COUNT(*) as total FROM produtos")
                      ->fetch(PDO::FETCH_ASSOC)['total'];

$totalFornecedores = $conn->query("SELECT COUNT(*) as total FROM fornecedores")
                          ->fetch(PDO::FETCH_ASSOC)['total'];

ob_start();
?>

<h2 class="mb-4">📊 Dashboard</h2>

<div class="row">

    <!-- PRODUTOS -->
    <div class="col-md-4">
        <div class="card shadow border-0 text-white bg-primary">
            <div class="card-body">
                <h5>Produtos</h5>
                <h2><?= $totalProdutos ?></h2>
            </div>
        </div>
    </div>

    <!-- FORNECEDORES -->
    <div class="col-md-4">
        <div class="card shadow border-0 text-white bg-success">
            <div class="card-body">
                <h5>Fornecedores</h5>
                <h2><?= $totalFornecedores ?></h2>
            </div>
        </div>
    </div>

    <!-- CARRINHO -->
    <div class="col-md-4">
        <div class="card shadow border-0 text-white bg-dark">
            <div class="card-body">
                <h5>Carrinho</h5>
                <h2>🛒</h2>
            </div>
        </div>
    </div>

</div>

<hr>

<h4 class="mt-4">📌 Últimos produtos</h4>

<table class="table table-hover shadow-sm bg-white">
<tr><th>Nome</th><th>Preço</th></tr>

<?php
$res = $conn->query("SELECT * FROM produtos ORDER BY id DESC LIMIT 5");

while($p = $res->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
            <td>{$p['nome']}</td>
            <td>R$ {$p['preco']}</td>
          </tr>";
}
?>

</table>

<?php
$conteudo = ob_get_clean();
include("layout.php");
?>