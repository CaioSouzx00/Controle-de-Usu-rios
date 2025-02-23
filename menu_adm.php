<?php 
ini_set('default_charset', 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha Do ADM</title>
    <style>
        body {
            background: linear-gradient(to right, white, aqua);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        form {
            background-color: rgba(0, 0, 0, 0.7); /* Fundo translúcido */
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

        input[type="password"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
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
            background-color: #444;
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
                <td>Senha do Adm:</td>
                <td><input name="senhaadm" size="6" type="password"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="confirmar">Confirmar</button>
        <button type="submit" name="voltar">Voltar</button>
    </form>

    <?php 
    // Senha do administrador fixa
    $senha_admin_fixa = '@adm123'; // Defina sua senha aqui.

    if (isset($_POST['confirmar'])):
        $senha = filter_input(INPUT_POST, 'senhaadm', FILTER_DEFAULT);
    
        // Verificando a senha
        if ($senha === $senha_admin_fixa) {
            echo "Acesso permitido!";
            // Redireciona para a página do gerente
            header("location: gerente.php");
            exit();
        } else {
            echo "Senha não confere!";  
        }
    endif;

    if (isset($_POST['voltar'])):
        header("location: menuPrincipal.php");
    endif;
    ?>

</body>
</html>
