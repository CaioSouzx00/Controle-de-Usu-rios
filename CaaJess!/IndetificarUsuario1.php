<?php 
ini_set('default_charset', 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha Do Usuario</title>
    <style>
        body {
            background: linear-gradient(to bottom, purple, black, white, );
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        form {
            background-color: rgba(0, 0, 0, 0.9); /* Fundo translúcido */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        table {
            margin: 0 auto;
            color: white;
        }

        td {
            padding: 8px;
        }

        input[type="text"], input[type="password"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
            margin: 10px 0;
            background-color: #fff;
        }

        button {
            background-color: black;
            color: white;
            margin: 10px 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }

        h1 {
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>

    <form method="post" action="">
        <table>
            <tr>
                <td>Senha do Usuario:</td>
                <td><input name="senha" type="password" required></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="confirmar">Confirmar</button>
        <button type="submit" name="voltar">Voltar</button>
    </form>

    <?php
    include "sql.php";

    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
    $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_usuarioss");
    while ($l=mysqli_fetch_array($selbanco))
    {
        $xsenha = $l['senha'];
        //echo $xsenha;
        
        if(password_verify($senha, $xsenha))
        {
            header("location: FuncFornecedor.php");
        }
    }
    
    if (isset($_POST['voltar'])):
        header("Location:menuPrincipal.php");
    endif;
    
    ?>

</body>
</html>
