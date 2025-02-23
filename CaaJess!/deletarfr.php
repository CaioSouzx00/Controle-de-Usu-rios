<?php
include "sql.php";

$codigofornecedor = $_POST['codigo'];
$codigoconta = $_POST['codigo'];

$contasDevedorasCount = 0;
$mensagem = "";

$selbanco = mysqli_query($conexao, "SELECT status FROM tb_cad_contass WHERE codigo='$codigofornecedor'");

while ($conta = mysqli_fetch_array($selbanco)) 
{
    if ($conta['status'] == 'D') 
    { 
        $contasDevedorasCount++;
    }
}

if ($contasDevedorasCount > 0) 
{
    $mensagem = "Fornecedor <strong>NÃO pode ser excluído</strong>, pois possui contas pendentes.";
} 
if ($contasDevedorasCount == 0)
{
    mysqli_query($conexao, "DELETE FROM tb_cad_fornecedors WHERE codigo='$codigofornecedor'");
    
    if($codigofornecedor == $codigoconta)
    {
        $sql = mysqli_query($conexao, "DELETE FROM tb_cad_contass WHERE codigo='$codigoconta'");
        $mensagem = "Fornecedor <strong>excluído com sucesso</strong>.";
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Conta</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilizando o corpo da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contêiner centralizado para a mensagem */
        .container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        /* Estilo para a mensagem */
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .message.success {
            color: #28a745;
        }

        .message.error {
            color: #dc3545;
        }

        /* Estilo para o botão "Voltar" */
        .back-link {
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        .back-link:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="message <?php echo ($contasDevedorasCount > 0) ? 'error' : 'success'; ?>">
            <?php echo $mensagem; ?>
        </p>
        <a href="FuncFornecedor.php" class="back-link">Voltar</a>
    </div>
</body>
</html>
