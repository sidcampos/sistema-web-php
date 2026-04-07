<?php
include("../config/conexao.php");

$res = $conn->query("SELECT * FROM fornecedores");

echo "<table class='table table-striped'>";
echo "<tr><th>Nome</th><th>CNPJ</th></tr>";

while($f = $res->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
            <td>{$f['nome']}</td>
            <td>{$f['cnpj']}</td>
          </tr>";
}

echo "</table>";
?>