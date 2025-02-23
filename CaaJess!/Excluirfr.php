<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Fornecedor</title>
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

        /* Estilo para os links */
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
        <h1>Excluir Fornecedor</h1>

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
            echo "<strong>Nome:</strong> $nome <br />";
            echo "<strong>Codigo:</strong> $codigo <br />";
            echo "<strong>Endereco:</strong> $endereco <br />";
            echo "<strong>Bairro:</strong> $bairro <br />";
            echo "<strong>Cidade:</strong> $cidade <br />";
            echo "<strong>Estado:</strong> $estado <br />";
            echo "<strong>Cep:</strong> $cep <br />";
            echo "<strong>Email:</strong> $email <br />";
            echo "<strong>Telefone:</strong> $telefone <br />";
            echo "<hr />";
            echo "<a href='apagarfr.php?codigo=$codigo'>Deletar</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
