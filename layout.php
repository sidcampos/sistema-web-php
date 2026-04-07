<?php
// layout.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f5f6fa;
}
.card {
    border-radius: 15px;
}

.card h2 {
    font-weight: bold;
}

table {
    border-radius: 10px;
    overflow: hidden;
}
.sidebar {
    height: 100vh;
    background: #343a40;
    color: white;
    padding: 15px;
}
.sidebar a {
    color: white;
    display: block;
    margin: 10px 0;
    text-decoration: none;
}
.sidebar a:hover {
    background: #495057;
    padding-left: 10px;
    transition: 0.3s;
}
</style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- MENU -->
        <div class="col-md-2 sidebar">
    <h4 class="text-center">🛒 Sistema</h4>
    <hr>

    <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="produtos.php"><i class="bi bi-box"></i> Produtos</a>
    <a href="fornecedores.php"><i class="bi bi-truck"></i> Fornecedores</a>
    <a href="cesta.php"><i class="bi bi-cart-plus"></i> Cesta</a>
    <a href="carrinho.php"><i class="bi bi-cart"></i> Carrinho</a>

    <hr>
    <a href="index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

        <!-- CONTEÚDO -->
        <div class="col-md-10 p-4">
            <?php echo $conteudo; ?>
        </div>

    </div>
</div>

</body>
</html>