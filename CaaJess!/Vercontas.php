<?php 
ini_set('default_charset', 'UTF-8');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver contas!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA"
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        /* Corpo da página com fundo desejado */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centraliza a barra na horizontal */
            align-items: center;     /* Centraliza a barra na vertical */
            height: 100vh;           /* Ocupa a tela inteira */
            background-color: rgb(255, 255, 255); /* Cor de fundo da página inteira */
        }

        /* Alinhando o formulário verticalmente */
        form {
            display: flex;
            flex-direction: column; /* Alinha os botões verticalmente */
            align-items: center;    /* Centraliza os botões */
        }

        /* Estilo dos botões */
        button {
            margin: 2rem;
            font-size: 1.1rem;
            padding: .6rem 1.5rem; 
            border: none;
            outline: none;
            border-radius: 0.5rem;
            cursor: pointer;
            text-transform: uppercase;
            background-color: rgba(14, 14, 26, 0.9); /* Cor de fundo dos botões */
            color: rgb(234, 234, 234);
            font-weight: 700;
            transition: 0.6s;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.6); 
            -webkit-box-reflect: below 15px linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.4));
            width: 100%; /* Faz o botão ocupar toda a largura disponível */
            max-width: 300px; /* Limita a largura dos botões */
        }

        button:active {
            transform: scale(0.99);
        }

        button:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }
    </style>
</head>

<body>

<form method="post" action="">
    <?php
    $buttons = [
        'contas_a_pagar' => 'Contas a Pagar',
        'contas_a_pagar_por_fornecedor' => 'Contas a Pagar por Fornecedor',
        'contas_a_pagar_por_data' => 'Contas a Pagar por Data',
        'contas_pagar' => 'Contas Pagar',
        'contas_pagar_por_fornecedor' => 'Contas Pagar por Fornecedor',
        'contas_pagas_por_data' => 'Contas Pagas por Data',
    ];

    // Gerando botões de forma dinâmica
    foreach ($buttons as $name => $label) {
        echo "<button type='submit' name='$name'>$label</button>";
    }
    ?>
</form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pages = [
        'contas_a_pagar' => 'contasAPagar.php',
        'contas_a_pagar_por_fornecedor' => 'contasAPagarPorFornecedor.php',
        'contas_a_pagar_por_data' => 'contasPagasPorData.php', 
        'contas_pagar' => 'contasPagar.php',
        'contas_pagar_por_fornecedor' => 'contasPagarPorFornecedor.php',
        'contas_pagas_por_data' => 'contasAPagarPorData.php',
    ];

    // Verifica qual botão foi pressionado e redireciona
    foreach ($pages as $key => $page) {
        if (isset($_POST[$key])) {
            header("Location: $page");
            exit;
        }
    }
}
?>
