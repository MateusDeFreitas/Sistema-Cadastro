<html>
<head>
<title>Cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
    body {
        background-color: #fde6cc;
        color: #333333;
        font-family: Arial, Helvetica, sans-serif;
    }
    h1 {
        padding-top: 30px;
        color: #ff6f61;
        font-size: 3em;
        text-align: center;
    }
    h2 {
        color: #ff6f61;
        font-size: 2em;
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
    hr {
        border: 1px solid #ff6f61;
    }
    p {
        line-height: 25px;
        color: #ff6f61;
        font-size: 1.1em;
    }
    span {
        background-color: #ffcb52;
        border: 1px solid #ffd166;
        color: #ffffff;
        font-weight: 800;
        font-size: 1.1em;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        margin-top: 50px;
        max-width: 90vw;
        width: 470px;
        height: 50px;
        border: none;
        cursor: pointer;
    }
    span:hover {
        background-color: #ffb703;
    }
    a {
        text-decoration: none;
        color: white;
    }
</style>
<body>
   <h1>Enviando Dados</h1>
   <?php
        echo "<div>";

        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "db_cadastro";
        $_con = mysqli_connect($servidor, $usuario, $senha, $banco);
        error_reporting(E_ERROR | E_PARSE);

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $dataNasc = $_POST['dataNasc'];
        $cidade = $_POST['cidade'];
        $genero = $_POST['opcao'];
        $int1 = $_POST['opcb1'];
        $int2 = $_POST['opcb2'];
        $int3 = $_POST['opcb3'];
        $int4 = $_POST['opcb4'];
        $int5 = $_POST['opcb5'];
        $observacao = $_POST['obs'];

        $sql = 'INSERT INTO tb_usuario (nome, telefone, data_nascimento, cidade, genero, interesse, observacao) VALUES (\''.$nome.'\',\''.$telefone.'\',\''.$dataNasc.'\',\''.$cidade.'\',\''.$genero.'\',\''.$int1.$int2.$int3.$int4.$int5.'\',\''.$observacao.'\')';

        if (mysqli_query($_con, $sql)) {
            echo "<br><p>Novo registro criado com sucesso</p>";
        } else {
            echo "<br>Error: " . $sql . "<br>" . mysqli_error($_con);
        }
        mysqli_close($_con);
        echo "</div>";
   ?>
   <a href="index.html"><span id="voltar">Voltar</span></a>
</body>
</html>