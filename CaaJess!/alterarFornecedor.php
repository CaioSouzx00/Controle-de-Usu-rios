<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Fornecedor</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Fundo branco */
            color: #000000; /* Texto preto */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
        }

        .container {
            background-color: #f4f4f4; /* Cor de fundo clara para o container */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 380px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        h1 {
            color: #333333; /* Cor escura para o título */
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .form-group {
            margin: 15px 0;
            text-align: left;
        }

        label {
            font-weight: bold;
            color: #333333; /* Cor de texto escura para labels */
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #ffffff; /* Fundo branco para os campos */
            color: #333333; /* Texto escuro nos campos */
            font-size: 16px;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            border-color: #4CAF50; /* Cor verde ao focar */
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #4CAF50; /* Cor verde para o botão de confirmação */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Tom mais escuro de verde ao passar o mouse */
        }

        .cancel-link {
            display: inline-block;
            margin-top: 15px;
            color: #f44336; /* Cor vermelha para o link de cancelar */
            text-decoration: none;
            font-weight: bold;
        }

        .cancel-link:hover {
            text-decoration: underline;
        }

        .readonly-input {
            background-color: #f0f0f0; /* Cor de fundo mais clara para campos readonly */
            cursor: not-allowed;
        }
    </style>
</head>
<body>

<?php
include "sql.php";

$codigo = $_GET['codigo'];

$sql = mysqli_query($conexao, "SELECT * FROM tb_cad_fornecedors WHERE codigo='$codigo'");
while ($linha=mysqli_fetch_array($sql))
{
    $xnome = $linha['nome'];
    $xcodigo = $linha['codigo'];
    $xendereco = $linha['enderenco'];
    $xbairro = $linha['bairro'];
    $xcidade = $linha['cidade'];
    $xestado = $linha['estado'];
    $xcep = $linha['cep'];
    $xemail = $linha['email'];
    $xtelefone = $linha['telefone'];
}
?>

    <div class="container">
        <h1>Alterar Fornecedor</h1>

        <form method="post" action="validarFornecedor.php">
            <!-- Exibe os dados do fornecedor com o campo código e outros como readonly -->
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input name="codigo" type="text" class="readonly-input" readonly="readonly" value="<?php echo $xcodigo; ?>">
            </div>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input name="nome" type="text" value="<?php echo $xnome; ?>">
            </div>

            <div class="form-group">
                <label for="enderenco">Endereço:</label>
                <input name="enderenco" type="text" value="<?php echo $xendereco; ?>">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input name="bairro" type="text" value="<?php echo $xbairro; ?>">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input name="cidade" type="text" value="<?php echo $xcidade; ?>">
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input name="estado" type="text" value="<?php echo $xestado; ?>">
            </div>

            <div class="form-group">
                <label for="cep">Cep:</label>
                <input name="cep" type="text" value="<?php echo $xcep; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="text" value="<?php echo $xemail; ?>">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input name="telefone" type="text" value="<?php echo $xtelefone; ?>">
            </div>

            <input type="submit" value="Confirmar Alteração">
            <a href="editarFornecedor.php" class="cancel-link">Cancelar</a>
        </form>
    </div>
</body>
</html>
