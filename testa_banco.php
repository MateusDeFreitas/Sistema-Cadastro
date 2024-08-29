<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Testando Conexão</title>
<style>
    body {
        background-color: #fde6cc;
        color: #333333;
        font-family: Arial, Helvetica, sans-serif;
    }
    h1 {
        color: #ff6f61;
        font-size: 3em;
        text-align: center;
    }
    div {
        padding: 20px;
        max-width: 90vw;
        width: 470px;
        margin: auto;
        border-radius: 15px;
        background-color: #fff8e7;
        border: 1px solid #ff6f61;
        box-shadow: 5px 5px 5px #ff6e617a;
    }
    p {
        text-align: center;
        color: #ff6f61;
        font-size: 1.1em;
    }
</style>
</head>
<body>
    <h1>Testando Conexão</h1>
    <?php
        error_reporting(E_ERROR | E_PARSE);

        echo "<div>";
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "db_cadastro";
        try {
            $_con = mysqli_connect($servidor, $usuario, $senha, $banco);
            if($_con===false) {
                echo "Não foi possível conectar ao MySQL ";
                exit;
            } else { 
                echo "<p>Conexão Estabelecida</p>";
            }
        } catch (Exception $e) { 
            echo "<p>Erro na conexão com o servidor.</p></div>";
        }
    ?>
</body>
</html>
