<?php
    $codigo = $_POST["CodProduto"];
    echo 'Código procurado = '.$codigo.'<br />';
    $mysqli =new mysqli('127.0.0.1','root','','comercial');
    if ($mysqli -> connect_error) {
        echo 'Falha na ligação. </br>';
        echo $mysqli->connect_error;
        exit;
    }
    $resultado = $mysqli -> query("select * from produtos where CodProduto ='$codigo'");
    if ($resultado->num_rows == 0) {
        echo "<h3> Produto não encontrado </h3>";
    }   
    else {
        echo "<h3> Dados deste produto </h3>";
        while ($registo = $resultado -> fetch_assoc()) {
            echo $registo ['CodProduto'] . " - " .
                 $registo ['NomeProduto'] . " - " .
                 $registo ['PrecoVenda'] . "" ; echo "</br>";
        }
    }
    $mysqli->close();
?>
<p> </p>
<a href="http://localhost/ex8/Entrada.html"> Voltar a entrada </a>