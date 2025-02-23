<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Contas</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, rgb(247, 247, 247), rgb(255, 255, 255)); /* Gradiente suave de roxo para azul */
        }

        /* Estilo do formulário */
        form {
            background-color: rgba(240, 240, 240, 0.9); /* Fundo mais claro e levemente transparente */
            padding: 30px;
            border-radius: 12px; /* Bordas mais suaves */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Sombra mais suave */
            width: 320px;  /* Aumenta a largura */
            text-align: center;
            backdrop-filter: blur(8px); /* Adiciona efeito de desfoque no fundo */
        }

        /* Estilo do título h1 */
        h1 {
            font-size: 28px;
            color: #333;  /* Cor do título em cinza escuro para maior contraste */
            margin-bottom: 20px;  /* Ajustando o espaçamento entre o título e o formulário */
            font-weight: 600;
            text-align: center; /* Centraliza o título */
        }

        /* Estilo dos labels */
        label {
            display: block;
            font-size: 16px;
            color: #333;  /* Cor do texto mais escuro */
            margin-bottom: 5px;
            text-align: left;
        }

        /* Estilo dos inputs de texto */
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            font-size: 16px;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
            box-sizing: border-box; /* Para incluir o padding dentro da largura */
            background-color: #f9f9f9; /* Cor de fundo mais clara para os inputs */
        }

        /* Estilo do botão de submit */
        input[type="submit"], .cancel-button {
            background-color: rgba(0, 0, 0, 0.9);
            color: white;
            margin: 10px 0;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        /* Alteração no foco dos campos de texto */
        input[type="text"]:focus {
            border-color: #4c4cff;
            box-shadow: 0 0 5px rgba(76, 76, 255, 0.5); /* Adiciona um destaque suave ao foco */
        }

        /* Efeito de hover nos botões */
        input[type="submit"]:hover, .cancel-button:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }

        /* Estilo para tornar os botões mais acessíveis ao usuário */
        input[type="submit"]:active, .cancel-button:active {
            transform: scale(0.98); /* Leve redução ao clicar */
        }

        /* Estilo para o link de cancelamento */
        .cancel-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0056b3;
            font-size: 14px;
        }

        .cancel-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Exclusão de Contas</h1>
    <?php
    include "sql.php";

    $codigo = $_GET['codigo'];

    $sql = mysqli_query($conexao, "SELECT * FROM tb_cad_contass WHERE codigo='$codigo'");
    while ($l = mysqli_fetch_array($sql)) {
        $codigo = $l['codigo'];
        $Descrição = $l['descricao'];
        $Data_compra = $l['data_compra'];
        $Data_vencimento = $l['data_vencimento'];
        $Data_pagamento = $l['data_pagamento'];
        $Valor = $l['valor'];
        $Status = $l['status'];
    }
    ?>

    <form method="post" action="deletarContas.php">
        <label>Código: </label>
        <input name="codigo" type="text" readonly="readonly" value="<?php echo $codigo; ?>">
        <br>
        <label>Descrição: </label>
        <input name="descricao" type="text" value="<?php echo $Descrição; ?>">
        <br>
        <label>Data Compra: </label>
        <input name="data_compra" type="text" readonly="readonly" value="<?php echo $Data_compra; ?>">
        <br>
        <label>Data Vencimento: </label>
        <input name="data_vencimento" type="text" value="<?php echo $Data_vencimento; ?>">
        <br>
        <label>Data Pagamento: </label>
        <input name="data_pagamento" type="text" value="<?php echo $Data_pagamento; ?>">
        <br>
        <label>Valor: </label>
        <input name="valor" type="text" readonly="readonly" value="<?php echo $Valor; ?>">
        <br>
        <label>Status: </label>
        <input name="status" type="text" value="<?php echo $Status; ?>">
        <br>

        <input type="submit" value="Confirmar Excluir">
        
        <!-- Botão Cancelar -->
        <button type="button" class="cancel-button" onclick="window.location.href='excluircontas.php'">Cancelar</button>
    </form>
</body>

</html>
