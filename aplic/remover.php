<?php
echo '<h3>Remover contacto</h3>';
$mysqli = new mysqli("localhost", "root", "", "Pessoal");

if ($mysqli->connect_error) {
    echo 'Falha na ligação. </br>';
    echo $mysqli->connect_error;
    exit;
} else {
    if (isset($_POST['remove'])) {
        $nome = $_POST['nome'];

        $remover = $mysqli->query("DELETE FROM Contactos WHERE nome = '$nome'");

        if (!$remover) {
            echo 'Erro na consulta SQL: ' . $mysqli->error;
            exit;
        } else {
            echo 'Remoção realizada com sucesso.';
        }
    }
    $mysqli->close();
}
?>

<form method="post" action="">
    Nome: <input type="text" name="nome"><br><br>

    <input type="submit" name="remove" value="Remover">
</form>

<p></p>
<a href="http://localhost/aplic/entrada.html">Voltar à entrada</a>
