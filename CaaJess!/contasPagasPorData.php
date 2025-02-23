<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Contas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #0056b3;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="date"], select, button {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #0056b3;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #003d80;
        }

        .fornecedor {
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .fornecedor strong {
            color: #0056b3;
        }

        .fornecedor hr {
            border: 0;
            border-top: 1px solid #e0e0e0;
            margin: 15px 0;
        }
                /* Estilo do quadrado (botão) de status */
                .status-botao {
            width: 120px;
            height: 40px;
            display: inline-block;
            text-align: center;
            line-height: 40px;
            border-radius: 8px;
            font-weight: bold;
            color: white;
            font-size: 16px;
            margin-left: 10px;
        }

        .atrasado {
            background-color: red;
        }

        .no-prazo {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relatório de Contas Devedoras</h1>

        <!-- Formulário para selecionar o intervalo e tipo de relatório -->
        <form method="GET">
            <label for="data_inicio">Data Início:</label>
            <input type="date" id="data_inicio" name="data_inicio" required>
            
            <label for="data_fim">Data Fim:</label>
            <input type="date" id="data_fim" name="data_fim" required>
            
            <label for="tipo_relatorio">Tipo:</label>
            <select id="tipo_relatorio" name="tipo_relatorio" required>
                <option value="devedores">Conta Devedora</option>
            </select>

            <button type="submit">Gerar Relatório</button>
        </form>

        <?php
        include "sql.php";

        if (isset($_GET['data_inicio'], $_GET['data_fim'], $_GET['tipo_relatorio'])) {
            $data_inicio = $_GET['data_inicio'];
            $data_fim = $_GET['data_fim'];
            $tipo_relatorio = $_GET['tipo_relatorio'];

            if ($tipo_relatorio === 'devedores') 
            {
                $query = "
                    SELECT * 
                    FROM tb_cad_contass 
                    WHERE status != 'P' 
                    AND data_vencimento BETWEEN '$data_inicio' AND '$data_fim'
                    ORDER BY data_vencimento DESC
                ";

            } 
            $result = mysqli_query($conexao, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            
                    $codigo = $row['codigo'];
                    $query_fornecedor = "SELECT nome FROM tb_cad_fornecedors WHERE codigo = '$codigo'";
                    $result_fornecedor = mysqli_query($conexao, $query_fornecedor);
                    $fornecedor = mysqli_fetch_assoc($result_fornecedor);
                    $nomefornecedor = $fornecedor['nome'];
            
                    $data_vencimento = $row['data_vencimento'];
                    $pagamento = date('Y-m-d');
            
                    $data_vencimento_timestamp = strtotime($data_vencimento);
                    $data_atual_timestamp = strtotime($pagamento);
            
                    if ($data_atual_timestamp > $data_vencimento_timestamp) {
                        $status_vencimento = "Atrasado";
                        $status_class = "atrasado"; // Classe para estilizar o botão
                    } else {
                        $status_vencimento = "No Prazo";
                        $status_class = "no-prazo"; // Classe para estilizar o botão
                    }
            
                    // Exibindo as informações com o status do vencimento
                    echo "<div class='fornecedor'>";
                    echo "<strong>Fornecedor:</strong> $nomefornecedor <br />";
                    echo "<strong>Código:</strong> {$row['codigo']}<br />";
                    echo "<strong>Descrição:</strong> {$row['descricao']}<br />";
                    echo "<strong>Data da Compra:</strong> {$row['data_compra']}<br />";
                    echo "<strong>Data do Pagamento:</strong> {$row['data_pagamento']}<br />";
                    echo "<strong>Data do Vencimento:</strong> {$row['data_vencimento']}<br />";
                    
                    // Aqui é onde o status do vencimento deve ser exibido
                    echo "<strong>Status do Vencimento:</strong> <span class='status-botao $status_class'>$status_vencimento</span><br />";
            
                    echo "<strong>Valor:</strong> R$ " . number_format($row['valor'], 2, ',', '.') . "<br />";
                    echo "<strong>Status:</strong> " . ($row['status'] === 'D' ? 'D' : '') . "<br />";
                    echo "<strong>Numero do Documento:</strong> {$row['documento']}<br />";
                    echo "<hr />";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhuma conta encontrada no intervalo selecionado.</p>";
            }
            
        }
        ?>
    </div>
</body>
</html>
 