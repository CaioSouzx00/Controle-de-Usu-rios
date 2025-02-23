<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport">
<title>Cadastro de Usuario</title>
</head>
<body>

<style>
        body{
            background: linear-gradient(to right, black, purple);
        }
        button {
			background-color: purple;
			color: white;
			margin: 5px;
			padding: 5px 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
    </style>

<h2  style="color: green" >Cadastro do Usuario</h2>
<form action="0710.php" method="POST">
<label for="nome" style="color: green">Nome:</label><br>
<input type="text" id="nome" name="nome" ><br><br>

<label for="senha"  style="color: green">codigo:</label><br>
<input type="text" id="senha" name="senha" ><br><br>

<button type="submit" name="Cadastrar">Enviar</button>

<button type="submit" name="apagar">Apagar Dados</button>
</form>

</body>
</html>

<?php
include 'sql.php';

if (isset($_POST['Cadastrar'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    $sql = mysqli_query($conexao, "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')");
    
    if ($sql) {
        echo "Usuario cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuario: " . mysqli_error($conexao);
    }
}

if (isset($_POST['apagar'])) {
    $sql = mysqli_query($conexao, "DELETE FROM usuarios");
    if ($sql) {
        echo "Todos os senhas foram apagados com sucesso!";
    } else {
        echo "Erro ao apagar os dados: " . mysqli_error($conexao);
    }
}
?>
