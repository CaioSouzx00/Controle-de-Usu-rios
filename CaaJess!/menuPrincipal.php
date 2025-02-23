<?php 
ini_set('default_charset', 'UTF-8');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaaJess!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA"
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <style>
        
       body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centraliza a barra na horizontal */
            align-items: center;     /* Centraliza a barra na vertical */
            height: 100vh;           /* Ocupa a tela inteira */
            background-color: rgb(255, 255, 255); /* Cor de fundo da página inteira */
        }

        /* Barra de navegação transparente */
        .div {
            justify-content: space-around;
            display: flex;
            height: 4rem;
            width: 100%;
            background-color: rgb(255, 255, 255);
        }

        i {
            font-size: 2rem;
            color: aliceblue;
        }

        .btn {
            margin: 1rem;
            font-size: 1.1rem;
            padding: .6rem 1.5rem;
            border: none;
            outline: none;
            border-radius: 0.5rem;
            cursor: pointer;
            text-transform: uppercase;
            background-color: rgba(14, 14, 26, 0.9); 
            color: rgb(234, 234, 234);
            font-weight: 700;
            transition: 0.6s;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.6); 
            -webkit-box-reflect: below 25px linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.4));
        }

        .btn:active {
            transform: scale(0.99);
        }

        .btn:hover {
            background: rgb(2, 29, 78);
            background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 80%);
            color: rgb(4, 4, 38);
        }
    </style>
</head>
<body>  
    <form method="POST">  
        <div class="div">
            <?php
            
            $buttons = [
                'Usuarios' => 'Usuários',
                'Fornecedor' => 'Fornecedor',
                'Contas' => 'Contas',
                'ver_contas' => 'Ver Contas',
            ];

            // Exibir os botões
            foreach ($buttons as $name => $label) {
                echo "<button class='btn' type='submit' name='$name'>$label</button>";
            }
            ?>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mapear páginas
        $pages = [
            'Fornecedor' => 'indetificarUsuario1.php',
            'Usuarios' => 'verificarGerente.php',
            'Contas' => 'indetificarUsuario2.php',
            'ver_contas' => 'indetificarUsuario3.php',
        ];

        foreach ($pages as $key => $page) {
            if (isset($_POST[$key])) {
                header("Location: $page");
                exit;
            }
        }
    }
    ?>

</body>
</html>