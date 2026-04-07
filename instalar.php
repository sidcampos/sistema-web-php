<?php
$host = "localhost";
$user = "root";
$pass = "";

try {
    // conexão sem banco
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // criar banco
    $conn->exec("CREATE DATABASE IF NOT EXISTS sistema");
    $conn->exec("USE sistema");

    // tabela fornecedores
    $conn->exec("
        CREATE TABLE IF NOT EXISTS fornecedores (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100),
            cnpj VARCHAR(20)
        )
    ");

    // tabela produtos
    $conn->exec("
        CREATE TABLE IF NOT EXISTS produtos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100),
            preco DECIMAL(10,2),
            fornecedor_id INT,
            FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
        )
    ");

    echo "<h2>✅ Instalação concluída com sucesso!</h2>";
    echo "<p>Banco e tabelas criados.</p>";
    echo "<a href='index.php'>Ir para o sistema</a>";

} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>