<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Fornecedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Cor de fundo aqua suave */
            margin: 0;
            padding: 0;
        }

        h1 { 
            text-align: center;
            color: #007b7f; /* Aqua escuro */
            margin-top: 30px;
        }

        .form-container {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #007b7f; /* Aqua escuro */
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f0f8ff; /* Fundo text input aqua */
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #007b7f; /* Aqua escuro para o botão */
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007b7f; /* Aqua escuro */
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Buscar Fornecedor</h1>

    <div class="form-container">
        <form method="post" action="resultadofornecedor2.php">
            <label for="listar">Código do Fornecedor:</label>
            <input name="listar" type="text" id="listar" required placeholder="Digite o código do fornecedor">

            <input type="submit" value="Listar">
        </form>

        <a href="menuPrincipal.php">Voltar para o Menu Principal</a>
    </div>

</body>

</html>
