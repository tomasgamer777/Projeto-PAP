<?php
    echo '<h3> Listar Utilizadores </h3>';
    $servername = "plesk2.server.highcloudservices.eu";
    $username = "tomas";
    $password = "Pv~i23i20";
    $dbname = "banda";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
     die("conexão falada: " . $conn->connect_error);
    }
    else {
        $resultado = $mysqli -> query("select * from users");
        $n_registos = $resultado -> num_rows;
        echo $n_registos .' utilizador(es) encontrado(s) <p>';
        while ($registo = $resultado -> fetch_assoc()) {
            echo $registo ['user_id'] . " - " .
                 $registo ['nome'] . " - " .
                 $registo ['sobrenome'] . " - " ; echo "</br>";
        }
        $mysqli->close();
    }
?>
<p> </p>
<a href="admin.html"> Voltar a entrada </a>