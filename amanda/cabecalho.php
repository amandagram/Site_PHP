<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Produtos PHP 5</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .menu { background: #eee; padding: 10px; margin-bottom: 20px; }
        .grid-table { border-collapse: collapse; width: 100%; }
        .grid-table th, .grid-table td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="menu">
        <strong>Usuário:</strong> <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Visitante'; ?> | 
        <a href="index.php">Home (Grid)</a>
    </div>