<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Fornecedor</title>
    <style>
        /* Estilo simplificado */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #0056b3;
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }

        .fornecedor {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .no-results {
            text-align: center;
            color: red;
            font-size: 18px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Conta Devedora do Fornecedor</h1>
    <div class="container">
        <?php
        include "sql.php";

        $buscar = mysqli_real_escape_string($conexao, $_POST['listar']);

        $sqlFornecedor = "SELECT * FROM tb_cad_fornecedors WHERE codigo = '$buscar'";
        $resultFornecedor = mysqli_query($conexao, $sqlFornecedor);

        if (mysqli_num_rows($resultFornecedor) > 0) {
            $fornecedor = mysqli_fetch_assoc($resultFornecedor);

            echo "<div class='fornecedor'>";
            echo "<strong>Código:</strong> {$fornecedor['codigo']}<br>";
            echo "<strong>Nome:</strong> {$fornecedor['nome']}<br>";
            echo "<strong>Endereço:</strong> {$fornecedor['enderenco']}<br>";
            echo "<strong>Bairro:</strong> {$fornecedor['bairro']}<br>";
            echo "<strong>Cidade:</strong> {$fornecedor['cidade']}<br>";
            echo "<strong>Estado:</strong> {$fornecedor['estado']}<br>";
            echo "<strong>Cep:</strong> {$fornecedor['cep']}<br>";
            echo "<strong>Email:</strong> {$fornecedor['email']}<br>";
            echo "<strong>Telefone:</strong> {$fornecedor['telefone']}<br>";
            echo "</div>";

            // Busca contas associadas ao fornecedor com status = 'D'
            $sqlContas = "SELECT * FROM tb_cad_contass WHERE codigo = '{$fornecedor['codigo']}' AND status = 'D' ORDER BY data_vencimento";
            $resultContas = mysqli_query($conexao, $sqlContas);

            if (mysqli_num_rows($resultContas) > 0) 
            {
                while ($conta = mysqli_fetch_assoc($resultContas)) 
                {
                    echo "<div class='fornecedor'>";
                    echo "<strong>Código:</strong> {$conta['codigo']}<br>";
                    echo "<strong>Descrição:</strong> {$conta['descricao']}<br>";
                    echo "<strong>Data da Compra:</strong> {$conta['data_compra']}<br>";
                    echo "<strong>Data do Vencimento:</strong> {$conta['data_vencimento']}<br>";
                    echo "<strong>Data do Pagamento:</strong> {$conta['data_pagamento']}<br>";
                    echo "<strong>Valor:</strong> R$ {$conta['valor']}<br>";
                    echo "<strong>Status:</strong> {$conta['status']}<br>";
                    echo "<strong>Numero do Documento:</strong> {$conta['documento']}<br>";
                    echo "</div>";
                }
            } 
            else 
            {
                echo "<div class='no-results'>Nenhuma conta encontrada com status 'D' para este fornecedor.</div>";
            }
            } 
            else 
            {
            echo "<div class='no-results'>Código não encontrado...</div>";
            }
        ?>
    </div>
    <a href="menuPrincipal.php">Voltar para o Menu Principal</a>
</body>

</html>
