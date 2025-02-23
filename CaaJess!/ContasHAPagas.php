<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de contas para Pagar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #0056b3;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .fornecedor {
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .fornecedor strong {
            color: #0056b3;
        }

        .fornecedor p {
            margin: 5px 0;
            font-size: 14px;
        }

        .fornecedor hr {
            border: 0;
            border-top: 1px solid #e0e0e0;
            margin: 15px 0;
        }

        a {
            color: #0056b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilo do quadrado (botão) de status */
        .status-botao {
            width: 120px;
            height: 40px;
            display: inline-block;
            text-align: center;
            line-height: 40px;
            border-radius: 8px;
            font-weight: bold;
            color: white;
            font-size: 16px;
            margin-left: 10px;
        }

        .atrasado {
            background-color: red;
        }

        .no-prazo {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contas Para Pagar</h1>
        
        <?php
            include "sql.php";

            $selbanco_contas = mysqli_query($conexao, "SELECT * FROM tb_cad_contass ORDER BY status");
            while ($l_conta = mysqli_fetch_array($selbanco_contas)) 
            {
                $codigocontas = $l_conta['codigo'];
                $Documento = $l_conta['documento'];
                $descricao = $l_conta['descricao'];
                $data_compra = $l_conta['data_compra'];
                $data_vencimento = $l_conta['data_vencimento'];
                $valor = $l_conta['valor'];
                $status = $l_conta['status']; 
                $pagamento = date("Y/m/d");

                $selbanco_fornecedor = mysqli_query($conexao, "SELECT nome FROM tb_cad_fornecedors WHERE codigo = '$codigocontas'");
                if ($l_fornecedor = mysqli_fetch_array($selbanco_fornecedor)) 
                {
                    $nomefornecedor = $l_fornecedor['nome'];
                }

                // Convertendo data de vencimento e data atual para o formato timestamp
                $data_vencimento_timestamp = strtotime($data_vencimento);
                $data_atual_timestamp = strtotime($pagamento); // Pagamento é a data atual

                // Verificando se a data está atrasada ou no prazo
                if ($data_atual_timestamp > $data_vencimento_timestamp) 
                {
                    $status_vencimento = "Atrasado";
                    $status_class = "atrasado";
                } 
                else 
                {
                    $status_vencimento = "No Prazo";
                    $status_class = "no-prazo"; 
                }

                if ($status === 'D') {
                    echo "<div class='fornecedor'>";
                    echo "<strong>Fornecedor:</strong> $nomefornecedor <br />";
                    echo "<strong>Código:</strong> $codigocontas <br />";
                    echo "<strong>Numero do Documento:</strong> $Documento <br />";
                    echo "<strong>Descrição:</strong> $descricao <br />";
                    echo "<strong>Data da Compra:</strong> $data_compra <br />";
                    echo "<strong>Data do Vencimento:</strong> $data_vencimento <br />";
                    echo "<strong>Status do Vencimento:</strong> <span class='status-botao $status_class'>$status_vencimento</span><br />";
                    echo "<strong>Valor:</strong> $valor <br />";
                    echo "<strong>Status:</strong> $status <br />";
                    echo "<hr />";
                    echo "<strong><a href='UpdatePagas.php?documento=$Documento'>Pagar Conta</a></strong> <br />";
                    echo "</div>";
                }
            }
        ?>
    </div>
</body>
</html>
