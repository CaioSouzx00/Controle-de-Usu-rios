]<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadrastro Fornecedores</title>
    <style>
        body {
            background-color: white; /* Fundo branco da página */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: black; /* Caixa preta de fundo */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        h1 {
            color: aqua;
            margin-bottom: 20px;
        }

        /* Novo cabeçalho */
        .header {
            background-color: purple;
            color: white;
            padding: 10px 0;
            font-size: 24px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #fff; /* Cor do texto do label */
            text-align: left; /* Alinha o texto do label à esquerda */
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
            color: white; /* Letras brancas */
            background-color: #333; /* Cor de fundo escura */
        }

        button {
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }

        .form-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 20px;
        }

        .form-actions button {
            width: 100%;
            padding: 12px 20px; /* Ajusta o padding para dar mais espaço */
        }

        .form-actions .voltar {
            grid-column: span 2; /* Faz com que o botão "Voltar" ocupe duas colunas */
        }

    </style>
</head>
<body>

<div class="container">
    <!-- Cabeçalho "Fornecedores" -->
    <div class="header">
        Fornecedores
    </div>

    <br><br><br><br><br><br><br><br><br>
    <h1>Cadrastrar Fornecedores</h1>

    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input name="nome" id="nome" type="text" placeholder="Digite o nome">

        <label for="codigo">Código:</label>
        <input name="codigo" id="codigo" type="text" placeholder="Digite o código">

        <label for="endereco">Endereço:</label>
        <input name="endereco" id="endereco" type="text" placeholder="Digite o endereço">

        <label for="bairro">Bairro:</label>
        <input name="bairro" id="bairro" type="text" placeholder="Digite o bairro">

        <label for="cidade">Cidade:</label>
        <input name="cidade" id="cidade" type="text" placeholder="Digite a cidade">

        <label for="estado">Estado:</label>
        <input name="estado" id="estado" type="text" placeholder="Digite o estado">

        <label for="cep">CEP:</label>
        <input name="cep" id="cep" type="text" placeholder="Digite o CEP">

        <label for="email">Email:</label>
        <input name="email" id="email" type="text" placeholder="Digite o email">

        <label for="telefone">Telefone:</label>
        <input name="telefone" id="telefone" type="text" placeholder="Digite o telefone">

        <!-- Agrupamento dos botões -->
        <div class="form-actions">
            <button type="submit" name="enviar">Cadastrar</button>
            <button type="submit" formaction="menuPrincipal.php" name="xvoltar">Voltar</button>
        </div>
    </form>

</div>

<?php
include "sql.php";

if (isset($_POST['enviar'])): 
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sql = mysqli_query($conexao, "INSERT INTO tb_cad_fornecedors(nome, codigo, enderenco, bairro, cidade, estado, cep, email, telefone) 
    VALUES('$nome', '$codigo','$endereco', '$bairro', '$cidade', '$estado', '$cep', '$email', '$telefone')");
endif;
?>

</body>
</html>
