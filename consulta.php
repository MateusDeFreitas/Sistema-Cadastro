<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consulta de dados</title>
<link rel="stylesheet">
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
    h2 {
        color: #ff6f61;
        font-size: 2em;
        text-align: center;
    }
    a {
        text-decoration: none;
        color: white;
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
        line-height: 15px;
        color: #ff6f61;
        font-size: 1.1em;
    }
    #pobs {
        line-height: 25px;
    }
    li {
        line-height: 20px;
        color: #ff6f61;
    }
    #semMargem {
        margin-bottom: 0px;
    }
    #voltar {
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
        margin-top: 40px;
        max-width: 90vw;
        width: 470px;
        height: 50px;
        border: none;
        cursor: pointer;
    }
    #voltar:hover {
        background-color: #ffb703;
    }
    span {
        display: block;
        padding: 10px;
        width: 95%;
        border: 1px solid #ff6f61;
        border-radius: 10px;
        background-color: #ffeedb;
        margin: 0px 4px 0px 4px;
    }
    section {
        margin: 0px 4px 0px 4px;
        padding: 0px 10px;
    }
</style>
</head>
<body>
    <h1> Consultas</h1>
    <br>
    <?php
        echo "<div>";
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "db_cadastro";
        $_con = mysqli_connect($servidor, $usuario, $senha, $banco);
        $res = mysqli_query($_con, "SELECT * FROM tb_usuario");
        $num_linhas = mysqli_num_rows($res);
        for($ii=0 ; $ii<$num_linhas; $ii++) {
            $dados = mysqli_fetch_row ($res);
            $id = $dados[0];
            $nome = $dados[1];
            $telefone = $dados[2];
            $dataNasc = substr($dados[3],8,2)."/".substr($dados[3],5,2)."/".substr($dados[3],0,4);
            $cidade = $dados[4];
            if($dados[5]=="M") {
                $genero = "Masculino";
            } else if($dados[5]=="F") {
                $genero = "Feminino";
            } else {
                $genero = "Prefiriu não informar";
            }
            $interesses = $dados[6];
            $tamanho = strlen($interesses);
            $int1 = 0;
            $int2 = 0;
            $int3 = 0;
            $int4 = 0;
            $int5 = 0;
            for($i = 0 ; $i <= $tamanho ; $i++) {
                if(substr($interesses, $i, 3)=="ESP") {
                    $int1 = "Esportes";
                } else if(substr($interesses, $i, 3)=="JOG") {
                    $int2 = "Jogos";
                } else if(substr($interesses, $i, 3)=="FIL") {
                    $int3 = "Filmes";
                } else if(substr($interesses, $i, 3)=="GAS") {
                    $int4 = "Gastronomia";
                } else if(substr($interesses, $i, 3)=="TEC") {
                    $int5 = "Tecnologia";
                }
            }
            $observacao = $dados[7];
            echo "<h2>Dados do ". $nome ."</h2>";
            echo "<br><p id=\"semMargem\">";
            echo "<span>Identificador: $id</span>
            <br><span>Telefone: $telefone</span>
            <br><span>Data de nascimento: $dataNasc</span>
            <br><span>Cidade: $cidade</span>
            <br><span>Genero: $genero</span></p>";
            echo "<section>";
            echo "<br><p>Interesses:</p>";
            if($int1 != 0) {
                echo "<li>$int1</li>";
            }
            if($int2 != 0) {
                echo "<li>$int2</li>";
            }
            if($int3 != 0) {
                echo "<li>$int3</li>";
            }
            if($int4 != 0) {
                echo "<li>$int4</li>";
            }
            if($int5 != 0) {
                echo "<li>$int5</li>";
            }
            echo "</section>";
            echo "<br><p id=\"pobs\"><span>Observação: $observacao</span></p><hr>";
        }
        mysqli_close($_con);
        echo "</div>";
    ?>
    <a href="index.html"><span id="voltar">Voltar</span></a>
</body>
</html>