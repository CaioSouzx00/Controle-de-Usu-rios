<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
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
    <h1>Excluir Usuarios</h1>
</head>
<body>
<?php
include "sql.php"; 

$selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_usuarioss ORDER BY senha");

while ($l=mysqli_fetch_array($selbanco)) {
    $nome = $l['nome'];
    $senha = $l['senha'];

    echo "<div class='container'>";
    echo "<div class='fornecedor'>";
    echo "<strong>Nome:</strong> $nome <br />";
    echo "<strong>Senha:</strong> $senha <br />";
    echo "<a href='apagargr.php?senha=$senha'>Deletar</a>";
    echo "</div>";
    echo "</div>";
}
?>
</body>
</html>
