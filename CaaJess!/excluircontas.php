<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
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
        <h1>Excluir Contas</h1>

        <?php
        include "sql.php";

        $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_contass ORDER BY codigo");
        while ($l = mysqli_fetch_array($selbanco)) {
            $codigo = $l['codigo'];
            $Descrição = $l['descricao'];
            $Data_compra = $l['data_compra'];
            $Data_vencimento = $l['data_vencimento'];
            $Data_pagamento = $l['data_pagamento'];
            $Valor = $l['valor'];
            $Status = $l['status'];

            $selbanco_fornecedor = mysqli_query($conexao, "SELECT nome FROM tb_cad_fornecedors WHERE codigo = '$codigo'");
            if ($l_fornecedor = mysqli_fetch_array($selbanco_fornecedor)) 
            {
                $nomefornecedor = $l_fornecedor['nome'];
            }

            echo "<div class='fornecedor'>";
            echo "<strong>Fornecedor:</strong> $nomefornecedor <br />";
            echo "<strong>Codigo:</strong> $codigo <br />";
            echo "<strong>Descrição:</strong> $Descrição <br />";
            echo "<strong>Data Compra:</strong> $Data_compra <br />";
            echo "<strong>Data Vencimento:</strong> $Data_vencimento <br />";
            echo "<strong>Data Pagamento:</strong> $Data_pagamento <br />";
            echo "<strong>Valor:</strong> $Valor <br />";
            echo "<strong>Status:</strong> $Status <br />";
            echo "<hr>";
            echo "<a href='apagarContas.php?codigo=$codigo'>Excluir</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>
