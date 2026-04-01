<?php
require 'config.php';

// Capturando os dados do formulário via POST
$nome   = $_POST['nome'];
$preco  = $_POST['preco'];
$status = $_POST['status'];

// Sanitização básica para evitar erros de aspas (SQL Injection simples)
$nome = pg_escape_string($nome);

// Montando a query SQL
$query = "INSERT INTO produto (produtonome, produtopreco, produtostatus) 
          VALUES ('$nome', $preco, $status)";

$resultado = pg_query($conn, $query);

if ($resultado) {
    // Redireciona de volta para a grid com uma mensagem de sucesso
    header("Location: index.php?msg=sucesso");
} else {
    echo "Erro ao inserir registro: " . pg_last_error($conn);
    echo "<br><a href='cadastro_produto.php'>Tentar novamente</a>";
}

pg_close($conn);
?>