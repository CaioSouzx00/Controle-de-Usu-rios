<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Fornecedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #0056b3;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
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

        .no-results {
            text-align: center;
            color: red;
            font-size: 18px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #0056b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Resultado da Consulta</h1>

    <div class="container">
        <?php
        include "sql.php";

        $buscar = $_POST['listar'];

        $sql = mysqli_query($conexao, "SELECT * FROM tb_cad_fornecedors WHERE codigo LIKE '%$buscar%'");
        $row = mysqli_num_rows($sql);

        if ($row > 0) 
        {
            while ($l = mysqli_fetch_array($sql)) {
                $codigo = $l['codigo'];
                $nome = $l['nome']; 
                $endereco = $l['enderenco'];
                $bairro = $l['bairro'];
                $cidade = $l['cidade'];
                $estado = $l['estado'];
                $cep = $l['cep']; 
                $email = $l['email'];
                $telefone = $l['telefone'];

                $contasDevedorasCount = 0;
                $contasPagasCount = 0;

                $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_contass WHERE codigo = '$codigo'");
                while ($conta = mysqli_fetch_array($selbanco))
                {
            
                    if ($conta['status'] == 'D') 
                    {
                        $contasDevedorasCount++;
                    } 
                    if ($conta['status'] == 'P') 
                    {
                        $contasPagasCount++;
                    }
                }

                echo "<div class='fornecedor'>";
                echo "<strong>Código:</strong> $codigo <br />";
                echo "<strong>Nome:</strong> $nome <br />";
                echo "<strong>Endereço:</strong> $endereco <br />";
                echo "<strong>Bairro:</strong> $bairro <br />";
                echo "<strong>Cidade:</strong> $cidade <br />";
                echo "<strong>Estado:</strong> $estado <br />";
                echo "<strong>Cep:</strong> $cep <br />";
                echo "<strong>Email:</strong> $email<br />";
                echo "<strong>Telefone:</strong> $telefone <br />";
                echo "<strong>Contas Devedoras:</strong> $contasDevedorasCount <br />";
                echo "<strong>Contas Pagas:</strong> $contasPagasCount <br />";
                echo "<hr />";
                echo "</div>";
            }
        } else {
            echo "<div class='no-results'>Código não encontrado...</div>";
        }
        ?>
    </div>

    <a href="menuPrincipal.php">Voltar para o Menu Principal</a>

</body>
</html>
