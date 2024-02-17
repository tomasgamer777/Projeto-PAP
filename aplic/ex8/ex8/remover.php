<?php
    $codigo = $_POST['CodProduto'];
    if (!$codigo) {
        echo 'Codigo em falta.
        Volte e preencha o codigo.';
        exit;
    }
    echo 'Dados recebidos: <br/>';
    echo 'Codigo: '.$codigo.'<br />';
    $mysqli =new mysqli('127.0.0.1','root','','Comercial');
    if ($mysqli -> connect_error) {
        echo 'Falha na ligação. </br>';
        echo $mysqli->connect_error;
        exit;
    }
    $remover = $mysqli->prepare('DELETE FROM produtos WHERE Codproduto = ?');
    $remover->bind_param('s', $codigo);
    $remover->execute();
    echo 'Produto Removido <p> </p>';
    $resultado = $mysqli -> query("select * from produtos");
        $n_registos = $resultado -> num_rows;
        echo $n_registos .' registo(s) encontrado(s) <p>';
        while ($registo = $resultado -> fetch_assoc()) {
            echo $registo ['CodProduto'] . " - " .
                 $registo ['NomeProduto'] . " - " .
                 $registo ['PrecoVenda'] . "" ; echo "</br>";
        }
    $mysqli -> close();
?>