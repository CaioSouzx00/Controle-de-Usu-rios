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
            background: linear-gradient(to right, white, white);
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
                <td>Digite Codigo do fornecedor:</td>
                <td><input name="codigo" type="text" ></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="cadrastro">Cadastro</button>
        <button type="submit" name="baixar">Baixar</button>
        <button type="submit" name="excluir">Excluir</button>
        <button type="submit" name="voltar">Voltar</button>
    </form>

    <?php
    include "sql.php";

    // Verificação para o botão "Cadastro"
    if (isset($_POST['cadrastro'])):
        $digitado = $_POST['codigo'];
        $fornecedor = 0;

        $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_fornecedors WHERE codigo='$digitado'");
        while ($l = mysqli_fetch_array($selbanco)) {
            $fornecedor = $l['codigo'];
        }

        if ($fornecedor == 0) {
            echo '<span style="color: black;">O código digitado não tem nenhum fornecedor cadastrado</span>';
        } else {
            header("Location: contas.php");
            exit;
        }
    endif;

    if (isset($_POST['baixar'])):
        header("Location:baixarcontas.php");
    endif;

    if (isset($_POST['excluir'])):
        header("Location:excluircontas.php");
    endif;

    if (isset($_POST['voltar'])):
        header("Location:menuPrincipal.php");
    endif;
    ?>
</body>
</html>
