<?php 
// 1. Inclui a configuração de conexão e inicia a sessão
require 'config.php'; 

// 2. Inclui o cabeçalho (HTML inicial e CSS)
include 'cabecalho.php'; 

// Simulação de segurança: se não houver usuário na sessão, define um padrão
if(!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "Admin";
}
?>

<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>Listagem de Produtos</h2>
    <a href="cadastro_produto.php" style="background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold;">
        + Adicionar Novo Produto
    </a>
</div>

<?php
// Exibe mensagem de confirmação caso venha do inserir_produto.php
if(isset($_GET['msg']) && $_GET['msg'] == 'sucesso'){
    echo "<div style='background: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 20px; border-radius: 4px;'>
            ✅ Produto cadastrado com sucesso!
          </div>";
}
?>

<table border="1" align="center" width="100%" style="border-collapse: collapse; text-align: left;">
    <thead>
        <tr>
            <th bgcolor="#CCCCCC" style="padding: 10px;"><input type="checkbox" name="todos"></th>
            <th bgcolor="#CCCCCC" style="padding: 10px;">ID</th>
            <th bgcolor="#CCCCCC" style="padding: 10px;">Nome do Produto</th>
            <th bgcolor="#CCCCCC" style="padding: 10px;">Preço</th>
            <th bgcolor="#CCCCCC" style="padding: 10px;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Consulta ao Banco de Dados
        $query = "SELECT * FROM produto ORDER BY idproduto DESC"; // DESC para mostrar o mais novo primeiro
        $resultado = pg_query($conn, $query);

        if (!$resultado) {
            echo "<tr><td colspan='5' style='padding: 20px; text-align: center; color: red;'>Erro ao carregar produtos do banco de dados.</td></tr>";
        } else {
            // Loop para percorrer os registros do PostgreSQL
            while ($linha = pg_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td style="padding: 10px;"><input type="checkbox" name="selecionar[]" value="<?php echo $linha['idproduto']; ?>"></td>
                    <td style="padding: 10px;"><?php echo $linha["idproduto"]; ?></td>
                    <td style="padding: 10px;"><?php echo $linha["produtonome"]; ?></td>
                    <td style="padding: 10px;">
                        <?php 
                        // Formatação de moeda brasileira
                        echo "R$ " . number_format($linha["produtopreco"], 2, ',', '.'); 
                        ?>
                    </td>
                    <td style="padding: 10px;">
                        <?php
                        // Tratamento do booleano do PostgreSQL ('t' ou 'f')
                        if($linha["produtostatus"] == "t") {
                            echo "<span style='color: green; font-weight: bold;'>Ativo</span>";
                        } else {
                            echo "<span style='color: gray;'>Desativado</span>";
                        }
                        ?>
                    </td>
                </tr>    
                <?php
            }
        }
        ?>
    </tbody>
</table>

<?php 
// 3. Inclui o rodapé e fecha a conexão
include 'rodape.php'; 
?>