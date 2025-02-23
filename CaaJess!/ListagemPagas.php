<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Contas Pagas</title>
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

        /* Estilo para os links (caso haja) */
        a {
            color: #0056b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listagem de Contas Pagas</h1>
        
        <?php
            include "sql.php"; 
            $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_contass ORDER BY status");
            while ($l = mysqli_fetch_array($selbanco)) {

                $codigo = $l['codigo'];
                $documento = $l['documento'];
                $descricao = $l['descricao'];
                $data_compra = $l['data_compra'];
                $data_vencimento = $l['data_vencimento']; 
                $data_pagamento = $l['data_pagamento'];
                $valor = $l['valor'];
                $status = $l['status'];

                $selbanco_fornecedor = mysqli_query($conexao, "SELECT nome FROM tb_cad_fornecedors WHERE codigo = '$codigo'");
                if ($l_fornecedor = mysqli_fetch_array($selbanco_fornecedor)) 
                {
                    $nomefornecedor = $l_fornecedor['nome'];
                }

                if($status === 'P')
                {
                echo "<div class='fornecedor'>";
                echo "<strong>Fornecedor:</strong> $nomefornecedor <br />";
                echo "<strong>Código do Fornecedor:</strong> $codigo <br />";
                echo "<strong>Código do Documento:</strong> $documento <br />";
                echo "<strong>Descrição:</strong> $descricao <br />";
                echo "<strong>Data da Compra:</strong> $data_compra <br />";
                echo "<strong>Data do Pagamento:</strong> $data_pagamento <br />";
                echo "<strong>Data do Vencimento:</strong> $data_vencimento <br />";
                echo "<strong>Valor:</strong> $valor <br />";
                echo "<strong>Status:</strong> $status <br />";
                echo "<hr />";
                echo "</div>";
                }
            }
        ?>
    </div>
</body>
</html>
