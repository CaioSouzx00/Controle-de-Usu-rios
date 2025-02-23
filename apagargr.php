<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <style>
        /* Estilo de fundo com gradiente */
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
            margin-bottom: 30px;
            font-weight: 600;
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

        /* Estilo do botão */
        input[type="submit"] {
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
        input[type="submit"]:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }

        /* Estilo para tornar os botões mais acessíveis ao usuário */
        input[type="submit"]:active {
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

<?php
 
include "sql.php"; // Inclusão do arquivo de conexão com o banco

$senha = $_GET['senha']; // Recebendo a senha para exibir os dados

$sql = mysqli_query($conexao, "SELECT * FROM tb_cad_usuarios WHERE senha='$senha'");

while ($linha = mysqli_fetch_array($sql)) {
    $xnome = $linha['nome'];
    $xsenha = $linha['senha'];
}
?>

<div class="container">
    
    <h1>Excluir Gerente</h1> 

    <form method="post" action="deletargr.php">
        <!-- Exibe os dados do cliente com o campo nome como readonly -->
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input name="nome" type="text" class="readonly-input" readonly="readonly" value="<?php echo $xnome; ?>">
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input name="senha" type="text" value="<?php echo $xsenha; ?>">
        </div>

        <input type="submit" value="Confirmar Exclusão">
        <a href="excluirgr.php" class="cancel-link">Cancelar</a>
    </form>
</div>

</body>
</html>
