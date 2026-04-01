<?php 
require 'config.php'; 
include 'cabecalho.php'; 
?>

<h2>Cadastrar Novo Produto</h2>

<form action="inserir_produto.php" method="POST">
    <label>Nome do Produto:</label><br>
    <input type="text" name="nome" required style="width: 300px;"><br><br>

    <label>Preço (Ex: 150.50):</label><br>
    <input type="number" step="0.01" name="preco" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="true">Ativo</option>
        <option value="false">Desativado</option>
    </select><br><br>

    <button type="submit" style="padding: 10px 20px; cursor: pointer;">Salvar Produto</button>
    <a href="index.php">Voltar</a>
</form>

<?php include 'rodape.php'; ?>