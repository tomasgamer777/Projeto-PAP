<?php
    echo '<h3> Listar Produtos </h3>';
    $mysqli =new mysqli('127.0.0.1','root','','Comercial');
    if ($mysqli -> connect_error) {
        echo 'Falha na ligação. </br>';
        echo $mysqli->connect_error;
        exit;
    }
    else {
        $resultado = $mysqli -> query("select * from produtos");
        $n_registos = $resultado -> num_rows;
        echo $n_registos .' registo(s) encontrado(s) <p>';
        while ($registo = $resultado -> fetch_assoc()) {
            echo $registo ['CodProduto'] . " - " .
                 $registo ['NomeProduto'] . " - " .
                 $registo ['PrecoVenda'] . "" ; echo "</br>";
        }
        $mysqli->close();
    }
?>
<p> </p>
<a href="http://localhost/ex8/Entrada.html"> Voltar a entrada </a>