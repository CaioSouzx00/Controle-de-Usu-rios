<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Fornecedores</title>
    <style>
        /* Estilo do corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0; 
            padding: 0;
        }

        /* Cabeçalho principal */
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #007BFF;
        }

        /* Container principal */
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo dos itens de fornecedor */
        .fornecedor {
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f4f4f4;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        /* Estilo dos títulos */
        .fornecedor strong {
            color: #007BFF;
        }

        /* Estilo dos textos */
        .fornecedor p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* Linha separadora */
        .fornecedor hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 15px 0;
        }

        /* Links estilizados */
        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Listagem de Fornecedores</h1>

    <div class="container">
        <?php
        include "sql.php";
        $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_fornecedors ORDER BY codigo");
        while ($l = mysqli_fetch_array($selbanco)) {

            $codigo = $l['codigo'];
            $nome = $l['nome'];
            $endereco = $l['enderenco'];
            $bairro = $l['bairro'];
            $cidade = $l['cidade'];
            $estado = $l['estado'];
            $cep = $l['cep'];
            $email = $l['email'];
            $telefone = $l['telefone'];

            echo "<div class='fornecedor'>";
            echo "<strong>Código:</strong> $codigo <br />";
            echo "<strong>Nome:</strong> $nome <br />";
            echo "<strong>Endereço:</strong> $endereco <br />";
            echo "<strong>Bairro:</strong> $bairro <br />";
            echo "<strong>Cidade:</strong> $cidade <br />";
            echo "<strong>Estado:</strong> $estado <br />";
            echo "<strong>CEP:</strong> $cep <br />";
            echo "<strong>Email:</strong> <a href='mailto:$email'>$email</a> <br />";
            echo "<strong>Telefone:</strong> $telefone <br />";
            echo "<hr />";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>
