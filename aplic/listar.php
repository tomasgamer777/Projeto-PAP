<?php
echo '<h3>listar contactos</h3>';
$mysqli = new mysqli("localhost", "root", "", "Comercial");

if ($mysqli->connect_error) {
    echo 'Falha na ligação. </br>';
    echo $mysqli->connect_error;
    exit;
} else {
    $mysqli->select_db("Comercial");

    $resultado = $mysqli->query("SELECT * FROM Contactos");

    if (!$resultado) {
        echo 'Erro na consulta SQL: ' . $mysqli->error;
        exit;
    }

    $n_registos = $resultado->num_rows;
    echo $n_registos . ' registo(s) encontrado(s) <p>';

    while ($registo = $resultado->fetch_assoc()) {
        echo $registo['Nome'] . " - " .
             $registo['Telef'] . " - " .
             $registo['Email'] . "<br/>";
    }

    $mysqli->close();
}
?>
<p></p>
<a href="http://localhost/aplic/Entrada.html">Voltar à entrada</a