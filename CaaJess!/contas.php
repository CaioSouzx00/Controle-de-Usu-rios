<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
    <style>
        body {
            background: linear-gradient(to left, white, white);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;                                                                                            
            font-family: Arial, sans-serif; 
        }

        .container {
            background: linear-gradient(to top right, black, black);
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h1 {
            color: rgba(31, 215, 232, 0.873);
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
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #fff; /* Cor do texto do label */
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
            transition: background-color 1s;
        }

        button:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }

        /* Organiza os botões em um grid */
        .form-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 20px;
        }

        .form-actions button {
            width: 100%;
        }

        /* Ajusta os botões de voltar para ocupar toda a largura */
        .form-actions .voltar {
            grid-column: span 2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contas</h1>
        <form method="post" action="">
            <label>Código: </label>
            <input name="codigo" size="30" type="text">
            <br>
            <label>Código do Documento: </label>
            <input name="documento" size="30" type="text">
            <br>
            <label>Descrição: </label>
            <input name="descricao" size="40" type="text">
            <br>
            <label>Data da compra: </label>
            <input name="data_compra" size="40" type="date">
            <br>
            <label>Data de vencimento: </label>
            <input name="data_vencimento" size="40" type="date">
            <br>
            <label>Valor: </label>
            <input name="valor" size="40" type="text">
            <br>

            <div class="form-actions">
                <button type="submit" name="enviar">Cadastrar</button>
            </div>
        </form>
    </div>

    <?php
    include "sql.php";

    if (isset($_POST['enviar'])):

        $digitado = $_POST['codigo'];
        
        $fornecedor = 0;
    
        $selbanco = mysqli_query($conexao, "SELECT * FROM tb_cad_fornecedors WHERE codigo='$digitado'");
        while ($l = mysqli_fetch_array($selbanco)) {
        $fornecedor = $l['codigo'];
        }
      
        if($fornecedor == 0)
        {
            echo"Nenhum fornecedor contem o codigo digitado";
            return 0;
        }
        else
        {
            $codigo = $_POST['codigo'];
            $Descrição = $_POST['descricao'];
            $Data_compra = $_POST['data_compra'];
            $Data_vencimento = $_POST['data_vencimento'];
            //$Data_pagamento = $_POST['data_pagamento'];
            $Valor = $_POST['valor'];
            $Documento = $_POST['documento'];
            //$Status = $_POST['status'];
            $sql = mysqli_query($conexao, "INSERT INTO tb_cad_contass(codigo, documento, descricao, data_compra, data_vencimento, data_pagamento, valor, status) 
            VALUES('$codigo', '$Documento','$Descrição','$Data_compra', '$Data_vencimento','0000/00/00' ,'$Valor', 'D')");
        }
        
    endif;

    if (isset($_POST['voltar'])):
        header("Location:menuPrincipal.php");

    endif;
    
    ?>
</body>
</html>
