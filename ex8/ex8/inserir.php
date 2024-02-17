<?php
    $nome = $_POST['NomeProduto'];
    $preco = $_POST['PrecoVenda'];
    echo 'Dados recebidos: <br />';
    echo 'Nome: '.$nome.'<br />';
    echo 'Preço: '.$preco.'<br />';
    $mysqli =new mysqli('127.0.0.1','root','','comercial');
    if ($mysqli -> connect_error) {
        echo 'Falha na ligação. </br>';
        echo $mysqli->connect_error;
        exit;
    }
    $insere = $mysqli -> query("insert into produtos values (null,'".$nome."','".$preco."')");
    if($insere == 1) {
        echo "<p> Produto inserido</p>";
    }
    else {
        echo "<p> Dados não inseridos </p>";
    }
    $mysqli -> close();
?>
<p> <a href="http://localhost/ex8/Entrada.html"> Voltar a entrada </a> </p>