<?php
include "sql.php";

$codigo = $_POST['codigo'];
$Descrição = $_POST['descricao'];
$Data_compra = $_POST['data_compra'];
$Data_vencimento = $_POST['data_vencimento'];
$Data_pagamento = $_POST['data_pagamento'];
$Valor = $_POST['valor'];
$Status = $_POST['status'];

$mensagem = "";

if($Status == "P")
{
    $sql = mysqli_query($conexao, "DELETE FROM tb_cad_contass WHERE codigo='$codigo'");
    $mensagem = "A conta <strong>FOI excluída</strong>, com sucess!.";
}

if($Status == "D")
{
    $mensagem = "A conta <strong>NÃO pode ser excluída</strong>, pois esta pendente.";
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Conta</title>
    <style>
        /* Resetando margens e padding para garantir que o layout não seja afetado */
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
            width: 300px;
        }

        /* Estilo para a mensagem de sucesso */
        .message {
            font-size: 18px;
            color: #28a745;
            margin-bottom: 20px;
        }

        /* Estilo para o link "Voltar" */
        .back-link {
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
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
        <a href="excluircontas.php" class="back-link">Voltar</a>
    </div>
</body>
</html>
