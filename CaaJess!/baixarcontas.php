<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Contas</title>
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

        /* Contêiner geral */
        .container {
            text-align: center;
        }

        /* Título centralizado */
        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px; /* Ajusta a distância entre o título e os botões */
        }

        /* Alinhando os botões horizontalmente */
        .custom-buttons {
            display: flex; /* Utiliza Flexbox para colocar os botões lado a lado */
            justify-content: center; /* Centraliza os botões horizontalmente */
            gap: 1rem; /* Espaço entre os botões */
        }

        /* Estilo dos botões */
        button {
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
            max-width: 300px; /* Limita a largura dos botões */
            width: auto; /* Ajusta a largura ao conteúdo do botão */
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

    <div class="container">
        <h1>Painel de Contas</h1>
        <form method="POST">
            <div class="custom-buttons">
                <button type="submit" name="contaspagas">Contas a Pagas</button>
                <button type="submit" name="devedores">Listar contas pagas</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['contaspagas'])):
        header("Location:ContasHAPagas.php");

    endif;

    if (isset($_POST['devedores'])):
        header("Location:listagemPagas.php");

    endif;
    ?>

</body>
</html>
